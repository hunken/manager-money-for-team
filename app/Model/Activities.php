<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model {
    protected $table = 'activities';
    protected $fillable = [
        'name', 'activity'
    ];
}
