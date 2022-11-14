<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFormModel extends Model
{
    protected $primaryKey = 'form_id'; //ตัวชี้ column
    protected $table = 'carform_db';     //ตัวชี้table
    protected $guarded = ['form_id'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}