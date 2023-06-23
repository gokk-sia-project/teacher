<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class UserGrader extends Model{

    protected $table = 'grades';
    protected $fillable = [
        'teacher_subject_details_id', 'student_subject_details_id', 'grade',
    ];

    public $timestamps = false;
    protected $primaryKey = 'grade_id';

}