<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HabitController extends Controller
{
    public function index(): View
    {
        $habits = Auth::user()->habits;

        return view('dashboard', compact('habits'));
    }
}