<?php

namespace App\Http\Controllers\MoneyLog;

use Illuminate\Http\Request;
use App\Http\Controllers\MoneyLog\MoneyCalculator;
use App\Model\LogFund;

class FundController extends MoneyCalculator {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $self = LogFund::orderBy('id', 'desc')->get();
        $all_record = array();
        foreach ($self as $element){
            $element->users = format_json_to_string($element->users);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->all();
        $rules = [
            'checkedNames' => 'required',
            'fundName'     => 'required|min:1',
            'fundValue'    => 'required|numeric|min:100',
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
        // Add money to account
        $amount = htmlentities($request->input('fundValue'));
        $list_user = json_decode($request->input('checkedNames'));
        foreach ($list_user as $user_id){
            $this->addAccountBalance($user_id, $amount);
        }
        // Save fund to log
        $log_fund = new LogFund();
        $log_fund->name = $request->input('fundName');
        $log_fund->users = $request->input('checkedNames');
        $log_fund->value = $request->input('fundValue');
        $log_fund->save();
        $option = new Options();
        $total_add_to_fund = count($list_user) * $amount;
        $update_fund_balance = $option->change_fund_total($total_add_to_fund);

        $options = new Options();
        $total_fund = $options->get_option('fund_value');
        return response()->json(
            [
                'success' => true,
                'data'    => array(
                    'total_fund' => $total_fund,
                    'curent_user' =>auth()->user()
                )
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
