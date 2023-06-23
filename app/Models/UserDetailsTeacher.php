<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class UserDetailsTeacher extends Model{

    protected $table = 'teacher_subject_details';
    protected $fillable = [
        'subject_id', 'teacher_id',
    ];

    public $timestamps = false;
    protected $primaryKey = 'teacher_subject_details_id';

}