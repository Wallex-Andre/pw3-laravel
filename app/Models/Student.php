<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    protected $fillable = ['name'];
    public function studentCard()
    {
        return $this->hasOne(StudentCard::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)
        ->withPivot('grade')
        ->withTimestamps();
    }
}
