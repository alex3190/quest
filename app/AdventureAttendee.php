<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class AdventureAttendee extends Model
{

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

    public $casts = [
        'is_dm' => 'boolean',
        'is_host' => 'boolean',
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