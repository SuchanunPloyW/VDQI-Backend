<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationModel extends Model
{
    protected $primaryKey = 'evaluation_id'; //ตัวชี้ column
    protected $table = 'evaluation_db';     //ตัวชี้table
    protected $guarded = ['evaluation_id'];
    use HasFactory;

    public function images()
    {
        return $this->hasMany(ImagesModel::class);
    }
}