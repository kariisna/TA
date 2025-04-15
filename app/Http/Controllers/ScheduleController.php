<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Jadwal::with('student')->latest()->get();
        $students = User::where('role', 'student')->get();
        
        return view('admin.jadwal', compact('schedules', 'students'));
    }

    public function today()
    {
        $today = Carbon::today()->toDateString();
        $schedules = Jadwal::with('student')
            ->whereDate('counseling_date', $today)
            ->latest()
            ->get();
        $students = User::where('role', 'student')->get();
        
        return view('admin.jadwal', compact('schedules', 'students'));
    }

    public function thisWeek()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
        $endOfWeek = Carbon::now()->endOfWeek()->toDateString();
        
        $schedules = Jadwal::with('student')
            ->whereBetween('counseling_date', [$startOfWeek, $endOfWeek])
            ->latest()
            ->get();
        $students = User::where('role', 'student')->get();
        
        return view('admin.jadwal', compact('schedules', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'counseling_date' => 'required|date',
            'counseling_time' => 'required',
            'duration' => 'required|in:30,45,60',
            'notes' => 'nullable|string',
        ]);

        Jadwal::create([
            'student_id' => $request->student_id,
            'counseling_date' => $request->counseling_date,
            'counseling_time' => $request->counseling_time,
            'duration' => $request->duration,
            'notes' => $request->notes ?? '',
            'status' => 'scheduled',
        ]);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal konseling berhasil ditambahkan.');
    }

    public function getStudentClass($id)
    {
        $student = User::findOrFail($id);
        return response()->json(['kelas' => $student->kelas]);
    }

    public function edit($id)
    {
        $schedule = Jadwal::with('student')->findOrFail($id);
        $students = User::where('role', 'student')->get();
        
        return view('counseling_schedules.edit', compact('schedule', 'students'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'counseling_date' => 'required|date',
            'counseling_time' => 'required',
            'duration' => 'required|in:30,45,60',
            'notes' => 'nullable|string',
            'status' => 'required|in:scheduled,completed,canceled',
        ]);

        $schedule = Jadwal::findOrFail($id);
        $schedule->update([
            'student_id' => $request->student_id,
            'counseling_date' => $request->counseling_date,
            'counseling_time' => $request->counseling_time,
            'duration' => $request->duration,
            'notes' => $request->notes ?? '',
            'status' => $request->status,
        ]);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal konseling berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $schedule = Jadwal::findOrFail($id);
        $schedule->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal konseling berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:scheduled,completed,canceled',
        ]);

        $schedule = Jadwal::findOrFail($id);
        $schedule->update([
            'status' => $request->status,
        ]);

        return redirect()->back()
            ->with('success', 'Status jadwal berhasil diperbarui.');
    }
}