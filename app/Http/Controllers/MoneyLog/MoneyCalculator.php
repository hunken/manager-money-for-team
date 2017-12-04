<?php
/**
 * Created by PhpStorm.
 * User: trung
 * Date: 08/10/2017
 * Time: 3:06 CH
 */

namespace App\Http\Controllers\MoneyLog;

use App\Model\User;
use App\Model\MoneyLog as MoneyLog;
use App\Http\Controllers\Controller;
use App\Model\LogFund;
use App\Http\Controllers\MoneyLog\Options;
use Illuminate\Support\Facades\Auth;


class MoneyCalculator extends Controller {
    protected function addAccountBalance($user_id, $amount) {
        $user_model = User::where('name', $user_id)->first();
        $user_model->money_added = $user_model->money_added + $amount;
        return $user_model->save();
    }

    protected function payWithFundBalance($amount, $log_id, $users) {
        $option = new Options();
        // Reduce total fund
        $option->change_fund_total(-$amount);
        // Save to log fund
        $log_fund = new LogFund();
        $log_fund->name = $log_id;
        $log_fund->is_pay = 1;
        $log_fund->users = $users;
        $log_fund->value = $amount;
        return $log_fund->save();
    }

    protected function reduceAccountTotal($user_id, $amount) {
        $user_model = User::where('name', $user_id)->first();
        $user_model->amount_to_pay = $user_model->amount_to_pay + $amount;
        return $user_model->save();
    }


    protected function reduceAccountBalance($user_id, $amount, $cooking, $curent_user) {
        $user_model = User::where('name', $user_id)->first();
        // Discount 20% for chef
        if ($cooking && ($user_id == $curent_user)) {
            $amount = $amount * 0.8;
        }

        // Discount 20% for female
        if ($user_model->is_female && $cooking) {
            // Discount 20% for female
            $amount = $amount * 0.8;
        }
        $user_model->amount_to_pay = $user_model->amount_to_pay + $amount;
        return $user_model->save();
    }

    protected function addMoneyLog($list_user, $amount, $payment_date, $detail, $cooking, $fund, $chef_pay, $user_pay) {
        $current_user = Auth::user()->name;
        $money_log = new MoneyLog();
        $money_log->name = $current_user;
        $money_log->users_pay = json_encode($list_user);
        $money_log->amount = $amount;
        $money_log->detail = $detail;
        $money_log->date_pay = $payment_date;
        $money_log->is_cooking = $cooking;
        $money_log->pay_chef = $chef_pay;
        $money_log->pay_member = $user_pay;
        $money_log->save();
        return $money_log->id;
    }
}