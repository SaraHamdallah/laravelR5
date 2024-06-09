<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Course;


class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'studentName',
        'age',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
