<?php
/**
 * Created by PhpStorm.
 * User: MSI gs
 * Date: 9/15/2017
 * Time: 3:31 PM
 */

namespace App\Http\Controllers;


class EventsController
{
    public function index() {
        return view('events.events');
    }
}