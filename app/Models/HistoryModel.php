<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    protected $primaryKey = 'his_id'; //ตัวชี้ column
    protected $table = 'history_db';     //ตัวชี้table
    protected $guarded = ['his_id'];  //post
    public $timestamps = false;
    use HasFactory;

   /*  public function car_where(){
        return $this->belongsTo('App\Models\WhereModel','car_where')
                    ->select(['where_id','car_where']); 
    }
    public function car_status(){
        return $this->belongsTo('App\Models\StatusModel','car_status')
                    ->select(['status_id','car_status']); 
    } */

    public function car_id()
    {
        return $this->belongsTo('App\Models\CarDBModel', 'car_id',)
            ->select([
                'car_id',
                'car_chassis',
                'posit_id',
                
                

            ]);
    }
    public function posit_id(){
        return $this->belongsTo('App\Models\PositDBModel','posit_id')
                    ->select([
                        'posit_id',
                        'line',
                        'posit',
                        'sort',
                    ]); 
                    
                 
    }
    
    public function car_where(){
        return $this->belongsTo('App\Models\WhereModel','car_where')
                    ->select(['where_id','car_where']); 
    }
    public function car_status(){
        return $this->belongsTo('App\Models\StatusModel','car_status')
                    ->select(['status_id','car_status']); 
    }

    public function person(){
        return $this->belongsTo('App\Models\User','person')
                    ->select(['id','fullname','lastname']); 
    }
    
}