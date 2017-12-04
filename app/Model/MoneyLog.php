<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MoneyLog extends Model {
    protected $table='money_log';
    protected $fillable = [
        'name', 'list_user', 'users_pay','amount', 'created_at', 'detail','is_cooking'
    ];
}
