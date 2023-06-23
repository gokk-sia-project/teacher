<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class UserSubjects extends Model{

    protected $table = 'subjects';
    protected $fillable = [
        'subjectname',
    ];

    public $timestamps = false;
    protected $primaryKey = 'subject_id';

}