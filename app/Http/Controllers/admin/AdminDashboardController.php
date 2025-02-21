<?php

use App\Http\Controllers\Controller;
use Illuminate\Console\Scheduling\Schedule;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalKonseling = Schedule::count();
        $jadwalMendatang = Schedule::where('date', '>=', now())->count();
        $upcomingSchedules = Schedule::with('student')
            ->where('date', '>=', now())
            ->orderBy('date')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalKonseling',
            'jadwalMendatang',
            'upcomingSchedules'
        ));
    }
}