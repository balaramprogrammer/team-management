<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   protected $fillable = [
'leader_id',
'student_name',
'father_name',
'email',
'mobile',
'dob',
'gender',
'address',
'course',
'batch',
'admission_date',
'fees',
'status'
];

    public function leader()
    {
       return $this->belongsTo(User::class,'user_id');
    }
}
