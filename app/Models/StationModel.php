<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationModel extends Model
{
    protected $primaryKey = 'station_id'; //ตัวชี้ column
    protected $table = 'car_station';     //ตัวชี้table
    protected $guarded = ['station_id'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
