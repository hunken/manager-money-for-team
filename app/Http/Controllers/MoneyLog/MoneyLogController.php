<?php

namespace App\Http\Controllers\MoneyLog;

use App\Model\MoneyLog;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Http\Controllers\MoneyLog\MoneyCalculator;
use App\Model\MoneyLog as MoneyLogModel;
use Illuminate\Support\Facades\Auth;

class MoneyLogController extends MoneyCalculator {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $self = MoneyLog::orderBy('id', 'desc')->get();
        $all_record = array();
        foreach ($self as $element) {
            $element->users_pay = format_json_to_string($element->users_pay);
            array_push($all_record, $element);
        }
        return response()->json($all_record);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //$current_user = \Auth::user()->name;
        //if ($current_user !== htmlentities($request->current_user)) {
        //    return_http_code(403);
        //}
        $input = $request->all();
        $rules = [
            'current_user' => 'required|max:50',
            'checkedNames' => 'required',
            'amount'       => 'required|min:1|numeric',
            'datePay'      => 'required|date',
            'detailData'   => 'required|min:8|max:100',
            'cooking'      => 'required|boolean',
            'is_fund'      => 'required|boolean'
        ];

        $validator = \Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'error'   => $validator->messages(),
                    'data'    => 'Nhập thiếu dữ liệu'
                ]
            );
        }
        $current_user = Auth::user()->name;
        $users_pay = json_decode($request->checkedNames);
        $amount = htmlentities($request->amount);
        $date_pay = htmlentities($request->datePay);
        $date_pay = strtotime($date_pay);
        $date_pay = date('Y-m-d', $date_pay);
        $detail = $request->detailData;
        $cooking = (int)($request->cooking);
        $is_fund = (int)($request->is_fund);
        // Number user need pay
        $number_payer = count($users_pay);
        if ($amount == 0 || $number_payer == 0) {
            return response()->json([
                'success' => false,
                'data'    => "Chưa nhập liệu đủ.",
            ]);
        }

        /**
         * 1. Process data money
         */
        // Money pay for each user
        $money_pay = 0;
        if ($amount != 0) {
            $money_pay = $amount / $number_payer;
        }

        $pay = $money_pay;
        $chef_pay = 0;
        if ($cooking) {
            $total_people = count($users_pay);
            $chef_pay = 0.8 * $money_pay;
            $chef_price = 0.2 * $money_pay;
            $pay = $chef_price;
            if ($total_people > 1) {
                $pay = $money_pay + $chef_price / ($total_people - 1);
            }
            foreach ($users_pay as $user) {
                if ($user == $current_user) {
                    $this->reduceAccountTotal($user, $chef_pay);
                } else {
                    $this->reduceAccountTotal($user, $pay);
                }
            }
        } else {
            foreach ($users_pay as $user) {
                $this->reduceAccountTotal($user, $pay);
            }
        }

        // $number_female = 0;
        //if ($cooking) {
        //    foreach ($users_pay as $user) {
        //        $user = User::where('name', $user)->first();
        //        if ($user->is_female) {
        //            $number_female++;
        //        }
        //    }
        //    $total_people = count($users_pay);
        //    $number_male = $total_people - $number_female;
        //
        //    $total_male_pay = $amount / (0.8 * $number_female + $number_male);
        //    $total_female_pay = $amount / ($number_female + $number_male / 0.8);
        //
        //    $price_chef = 0;
        //    foreach ($users_pay as $user_id) {
        //        $user = User::where('name', $user_id)->first();
        //        $pay = $total_male_pay;
        //        if ($user->is_female) {
        //            $pay = $total_female_pay;
        //        }
        //        if ($user->name == $current_user) {
        //            $pay = 0.8 * $pay;
        //            $price_chef = 0.2 * $pay;
        //        }
        //        $this->reduceAccountTotal($user_id, $pay);
        //    }
        //    $total_cheft = $price_chef;
        //    if ($total_people > 1) {
        //        $total_cheft = $price_chef / ($total_people - 1);
        //    }
        //    foreach ($users_pay as $user_id) {
        //        $user = User::where('name', $user_id)->first();
        //        if ($user->name != $current_user) {
        //            $this->reduceAccountTotal($user_id, $total_cheft);
        //        }
        //    }
        //} else {
        //    foreach ($users_pay as $user) {
        //        $this->reduceAccountTotal($user, $money_pay);
        //    }
        //}

        /**
         * 1. Ghi log
         */
        $submit_log_id = $this->addMoneyLog($users_pay, $amount, $date_pay, $detail, $cooking, $is_fund, $chef_pay, $pay);

        /*
         * 2. Add money to current account
         */
        if (!$is_fund) {
            $this->addAccountBalance($current_user, $amount); // Chỉ thêm tài khoản khi không lấy từ quỹ
        } else {
            $this->payWithFundBalance($amount, $submit_log_id, $request->checkedNames); // Chỉ thêm tài khoản khi
        }

        /*
        * 3. Lấy dữ liệu
        *
        */
        $current_user_model = User::where('name', $current_user)->first();
        $balance = intval($current_user_model->money_added) - intval($current_user_model->amount_to_pay);

        $options = new Options();
        $total_fund = $options->get_option('fund_value');

        return response()->json([
            'success' => true,
            'data'    => array(
                'current_user' => $current_user,
                'balance'      => $balance,
                'fund_balance' => $total_fund
            )
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($name) {
        $self = MoneyLog::where('name', $name)->orderBy('id', 'desc')->get();
        $current_account = array();
        foreach ($self as $element) {
            $element->users_pay = format_json_to_string($element->users_pay);
            array_push($current_account, $element);
        }
        return response()->json($current_account);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id) {
        //
    }
}
