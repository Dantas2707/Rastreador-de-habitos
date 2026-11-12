<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Habit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    // Um hábito pertence a um usuário
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Um hábito tem muitos registros (logs)
    public function habitLogs(): HasMany
    {
        return $this->hasMany(HabitLog::class);
    }

    // Verifica se o hábito foi concluído em uma data específica
    public function wasCompletedOn(?Carbon $date = null): bool
    {
        $targetDate = ($date ?? Carbon::today())->toDateString();

        return $this->habitLogs
            ->contains(fn(HabitLog $log) => Carbon::parse($log->completed_at)->toDateString() === $targetDate);
    }
}