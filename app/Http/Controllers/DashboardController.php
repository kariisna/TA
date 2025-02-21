<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CounselingSchedule;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Menghitung jumlah total sesi konseling
        $totalCounseling = CounselingSchedule::where('student_id', $user->id)->count();

        // Mengambil jadwal konseling mendatang (yang masih berstatus 'scheduled')
        $upcomingCounseling = CounselingSchedule::where('student_id', $user->id)
            ->where('status', 'scheduled')
            ->orderBy('counseling_date', 'asc')
            ->take(5)
            ->get();

        return view('dashboard', compact('user', 'totalCounseling', 'upcomingCounseling'));
    }

    public function quickAction()
    {
        $user = Auth::user();

        // Mengambil 5 jadwal terbaru yang telah dibuat
        $latestSchedules = CounselingSchedule::where('student_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('quick-action', compact('latestSchedules'));
    }
}
