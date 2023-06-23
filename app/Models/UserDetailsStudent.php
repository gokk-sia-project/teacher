<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class UserDetailsStudent extends Model{

    protected $table = 'student_subject_details';
    protected $fillable = [
        'subject_id', 'student_id',
    ];

    public $timestamps = false;
    protected $primaryKey = 'student_subject_details_id';

}