<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustInfo extends Model
{
    protected $table = 'cust_info';
    public $timestamps = false;
    protected $primaryKey = 'cust_id';
    protected $guarded = [];


}
