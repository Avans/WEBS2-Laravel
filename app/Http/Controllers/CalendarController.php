<?php

namespace App\Http\Controllers;

use App\Calendar\MonthDay;

class CalendarController extends Controller
{
    const DAYS = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

    public function showYear($year = "Y")
    {
        return view('calendar.year', ["month" =>$this->createMonth($year)]);
    }

    public function showMonth($year, $month)
    {
        return view('calendar.month', ["month" => $this->createMonth($year, $month)]);
    }

    public function showDay($year, $month, $day)
    {
        return view('calendar.planning', [
            "date" => MonthDay::make((int)$day, $this->createMonth($year, $month))
        ]);
    }

    private function createMonth($year = 'Y', $month = '01',  $day = '01') : \App\Calendar\Month {
        return new \App\Calendar\Month(new \DateTime($year . "-" . $this->padLeftToTwoWithZeros($month) . "-" . $this->padLeftToTwoWithZeros($day)), self::DAYS);
    }
    private function padLeftToTwoWithZeros(string $string) {
        return str_pad($string, 2, "0", STR_PAD_LEFT);
    }
}
