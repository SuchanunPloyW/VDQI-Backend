<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class CarModel extends Model
{
    protected $primaryKey = 'car_id'; //ตัวชี้ column
    protected $table = 'car';     //ตัวชี้table
    protected $guarded = ['car_id'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
