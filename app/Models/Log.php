<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;



class Log extends Model
{
    protected $table = 'log';
    public $timestamps = false;
    protected $primaryKey = 'log_id';

}
