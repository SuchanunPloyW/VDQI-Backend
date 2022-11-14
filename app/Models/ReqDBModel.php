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

    public function car_status(){
        return $this->belongsTo('App\Models\StatusModel','car_status')
                    ->select(['status_id','car_status']); 
    }
    
    public function car_id()
    {
        return $this->belongsTo('App\Models\CarDBModel', 'car_id',)
            ->select([
                'car_id',
                'car_chassis',
                'car_status',
                'posit_id',
                'car_where',
               
                

            ]);
    }
    public function posit_id(){
        return $this->belongsTo('App\Models\PositDBModel','posit_id')
                    ->select([
                        'posit_id',
                        'line',
                        'posit',
                        'car_where',
                        'sort',
                    ]); 
                    
                 
    }
    public function car_where(){
        return $this->belongsTo('App\Models\WhereModel','car_id')
                    ->select(['where_id','car_where']); 
    }

    public function person(){
        return $this->belongsTo('App\Models\User','person')
                    ->select(['id','fullname','lastname']); 
    }
    

    /*
    public function car_where(){
        return $this->belongsTo('App\Models\WhereModel','car_id')
                    ->select(['where_id','car_where']); 
    }
    public function car_status(){
        return $this->belongsTo('App\Models\StatusModel','status_id')
                    ->select(['status_id','car_status']); 
    } */
    /* public function car_chassis(){
        return $this->belongsTo('App\Models\CarModel','car_id')
                    ->select(['car_chassis'])
                    ->where('car_chassis'); 
    }
     */
}