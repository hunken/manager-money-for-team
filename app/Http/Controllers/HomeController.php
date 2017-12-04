<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MoneyLog\Options;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $options = new Options();
        $total_fund = $options->get_option('fund_value');
        $current_user = Auth::user()->name;
        return view("backend.app", ['total_fund' => $total_fund, 'current_user' => $current_user]);
        //return view("backend.app");
    }
}
