<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   protected $fillable = [
        'leader_id',
        'student_id',
        'title',
        'description',
        'deadline',
        'status',
        'progress'
        ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
