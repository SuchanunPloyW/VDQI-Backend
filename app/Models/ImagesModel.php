<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesModel extends Model
{
    protected $primaryKey = 'id'; //ตัวชี้ column
    protected $table = 'images_db';     //ตัวชี้table
    protected $guarded = ['id'];
    use HasFactory;
}