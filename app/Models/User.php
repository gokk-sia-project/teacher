<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model{

    protected $table = 'teachers';
    protected $fillable = [
            'course_id', 'firstname', 'lastname', 'middlename', 'contact_number', 'email_address',
    ];
    
    public $timestamps = false;
    protected $primaryKey = 'teacher_id';
    
}