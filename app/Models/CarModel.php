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

    public function car_where(){
        return $this->belongsTo('App\Models\WhereModel','car_where')
                    ->select(['where_id','car_where']); 
    }
    public function car_status(){
        return $this->belongsTo('App\Models\StatusModel','car_status')
                    ->select(['status_id','car_status']); 
    }
    
}
