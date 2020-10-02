<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class RoomClass extends Model
{
    public $timestamps = false;
    protected $table = 'room_class';
    protected $primaryKey = 'class_id';


}
