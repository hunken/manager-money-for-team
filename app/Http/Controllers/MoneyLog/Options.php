<?php

namespace App\Http\Controllers\MoneyLog;

use App\Http\Controllers\Controller;
use App\Model\Options as OptionModel;

class Options extends Controller {
    public function __construct() {
        $options = OptionModel::where('name', 'fund_value')->first();
        if (empty($options)) {
            $this->create_option('fund_value', 0);
        }
    }

    public function get_option($name) {
        $options = OptionModel::where('name', $name)->first();
        return $options->value;
    }

    public function create_option($name, $value) {
        $options = new OptionModel();
        $options->name = $name;
        $options->value = $value;
        return $options->save();
    }

    public function change_fund_total($value) {
        $options = OptionModel::where('name', 'fund_value')->first();
        $options->value = intval($options->value) + $value;
        return $options->save();
    }
}