<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function create(){
        return view('jadwal.index');
    }
    public function list(){
        return view('admin.jadwal');
    }
}
