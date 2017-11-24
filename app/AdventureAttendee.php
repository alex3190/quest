<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class AdventureAttendee extends Model
{
    const APPLICATION_STATUS_NOT_REVIEWED = 'not_reviewed';
    const APPLICATION_STATUS_ACCEPTED = 'accepted';
    const APPLICATION_STATUS_REJECTED = 'rejected';

    const APPLICATION_STATUSES = [
        self::APPLICATION_STATUS_ACCEPTED,
        self::APPLICATION_STATUS_REJECTED,
        self::APPLICATION_STATUS_NOT_REVIEWED
    ];
    const AVAIL_ANYTIME = 'anytime';
    const AVAIL_WEEKEND = 'weekend';
    const AVAIL_WEEKDAY = 'weekdays';
    const AVAIL_WEEKNIGHT = 'weeknights';
    const AVAIL_NEVER = 'none';

    const AVAILABILITY = [
        self::AVAIL_ANYTIME,
        self::AVAIL_WEEKEND,
        self::AVAIL_WEEKNIGHT,
        self::AVAIL_WEEKDAY,
        self::AVAIL_NEVER
    ];

    public function adventures()
    {
        return $this->belongsTo('App\Adventure', 'id', 'adventure_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}