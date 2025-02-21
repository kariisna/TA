<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'counseling_date',
        'counseling_time',
        'status',
    ];

    public function counselingSchedules()
{
    return $this->hasMany(CounselingSchedule::class, 'student_id');
}

}
