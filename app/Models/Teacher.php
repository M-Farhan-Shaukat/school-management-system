<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //

    public function user() { return $this->belongsTo(User::class); }
    public function classes() { return $this->hasMany(SchoolClass::class,'teacher_id'); }
    public function courses() { return $this->hasMany(Course::class,'teacher_id'); }
}
