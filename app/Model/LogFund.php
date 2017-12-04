<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogFund extends Model {
    protected $table='log_fund';
    protected $fillable = [
        'name', 'value','users'
    ];
}
