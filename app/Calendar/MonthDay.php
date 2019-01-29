<?php


namespace App\Calendar;


class MonthDay
{
    private $day;
    private $month;
    private $monthDay;

    /**
     * MonthDay constructor.
     * @param $day
     * @param Month $month
     */
    public function __construct($day, \App\Calendar\Month $month)
    {
        $this->day = $day;
        $this->month = $month;
        $this->monthDay = $this->day - $this->month->calculateOffsetAtStart() + 1;
    }

    public function isEmpty()
    {
        return ($this->day < $this->month->calculateOffsetAtStart()) || ($this->month->beyondEndOfMonth($this->monthDay));
    }

    public function weekday() {
        return $this->month->calculateWeekday($this->day);
    }
    public function monthday() {
        return $this->monthDay;
    }
    public function events() {
        return $this->month->events($this->monthDay);
    }
}