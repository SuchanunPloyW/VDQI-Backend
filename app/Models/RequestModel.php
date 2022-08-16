<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{

    protected $primaryKey = 'req_id'; //ตัวชี้ column
    protected $table = 'car_request';     //ตัวชี้table
    protected $guarded = ['req_id'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;


    public function car_where(){
        return $this->belongsTo('App\Models\WhereModel','car_where')
                    ->select(['where_id','car_where']); 
    }
    public function car_station(){
        return $this->belongsTo('App\Models\StationModel','car_station')
                    ->select(['station_id','car_station']); 
    }
    public function car_status(){
        return $this->belongsTo('App\Models\StatusModel','car_status')
                    ->select(['status_id','car_status']); 
    }


}




