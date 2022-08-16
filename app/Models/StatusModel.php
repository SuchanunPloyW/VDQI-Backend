<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    protected $primaryKey = 'status_id'; //ตัวชี้ column
    protected $table = 'car_status';     //ตัวชี้table
    protected $guarded = ['status_id'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
