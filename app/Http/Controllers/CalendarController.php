<?php

namespace App\Http\Controllers;

class CalendarController extends Controller
{
    const DAYS = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

    public function showYear($yearIndex = "Y")
    {
        return view('calendar.year', [
            "month" => new \App\Calendar\Month(new \DateTime(date("$yearIndex-1-1")), self::DAYS)
        ]);
    }

    public function showMonth($monthIndex)
    {
        return view('calendar.month', [
            "month" => new \App\Calendar\Month(new \DateTime(date($monthIndex."-1")), self::DAYS)
        ]);
    }
}
