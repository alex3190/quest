<?php
/**
 * Created by PhpStorm.
 * User: alexandrabulearca
 * Date: 29/09/17
 * Time: 13:43
 */

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

}