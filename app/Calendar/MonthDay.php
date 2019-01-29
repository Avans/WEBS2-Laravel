<?php


namespace App\Calendar;


class MonthDay
{
    private $day;
    private $month;

    /**
     * MonthDay constructor.
     * @param $day
     * @param Month $month
     */
    public function __construct($day, \App\Calendar\Month $month)
    {
        $this->day = $day;
        $this->month = $month;
    }

    public function isEmpty()
    {
        return $this->month->beforeStartOfMonth($this->day) || $this->month->beyondEndOfMonth($this->day);
    }

    public function weekday() {
        return $this->month->calculateWeekday($this->day);
    }
    public function monthday() {
        return $this->month->calculateMonthDay($this->day);
    }
    public function events() {
        return $this->month->events($this->day);
    }
}