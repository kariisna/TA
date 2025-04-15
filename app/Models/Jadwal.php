<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'counseling_schedules';

    use HasFactory;

    protected $fillable = [
        'student_id',
        'notes',
        'counseling_date',
        'counseling_time',
        'status',
        'duration',
    ];

    /**
     * Get the student associated with the schedule.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
