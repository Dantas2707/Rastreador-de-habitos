<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Models\HabitLog;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HabitController extends Controller
{
    public function index(): View
    {
        $habits = Auth::user()->habits;

        return view('dashboard', compact('habits'));
    }

    public function toggleHabit(Habit $habit): RedirectResponse
    {
        // Segurança: garante que o hábito pertence ao usuário logado
        if ($habit->user_id !== Auth::id()) {
            abort(403, 'Esse hábito não é seu.');
        }

        $today = Carbon::today()->toDateString();

        $log = HabitLog::query()
            ->where('habit_id', $habit->id)
            ->where('completed_at', $today)
            ->first();

        if ($log) {
            $log->delete();
        } else {
            HabitLog::create([
                'user_id' => Auth::id(),
                'habit_id' => $habit->id,
                'completed_at' => $today,
            ]);
        }

        return redirect()->route('habits.index');
    }
}