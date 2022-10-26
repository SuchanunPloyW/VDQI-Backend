<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReqDBModel extends Model
{
    protected $primaryKey = 'req_id'; //ตัวชี้ column
    protected $table = 'req_db';     //ตัวชี้table
    protected $guarded = ['req_id'];  //post
    public $timestamps = false;
    use HasFactory;

    public function car_id()
    {
        return $this->belongsTo('App\Models\CarModel', 'car_id', )
            ->select([
                'car_id',
                'car_chassis',
                'fullname',
                'lastname',
                'date',
                'time',
                'car_status',
                'car_where',
                'car_line',
                'car_position',

            ]);
    }
    public function car_where(){
        return $this->belongsTo('App\Models\WhereModel','car_id')
                    ->select(['where_id','car_where']); 
    }
    public function car_status(){
        return $this->belongsTo('App\Models\StatusModel','status_id')
                    ->select(['status_id','car_status']); 
    }
    /* public function car_chassis(){
        return $this->belongsTo('App\Models\CarModel','car_id')
                    ->select(['car_chassis'])
                    ->where('car_chassis'); 
    }
     */
}