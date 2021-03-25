<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meeting extends Model
{
    protected $fillable = [
        'meeting_id',
        'topic',
        'agenda',
        'start_time',
        'start_url',
        'join_url',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function findByMeetingId(int $meetingId): ?Meeting
    {
        return Meeting::where('meeting_id', $meetingId)->first() ?? null;
    }
}
