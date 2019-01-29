<?php

namespace App;

use App\Calendar\MonthIterator;
use App\Calendar\Month;

class Calendar
{
    private $month;
    private $days;

    public function __construct(\DateTime $date, $days)
    {
        $this->month = new Month($date, $days);
        $this->days = $days;
    }

    public function shiftMonth()
    {
        $this->month = $this->month->next();
    }

    public function renderMonthName()
    {
        return $this->month->formatLabel();
    }

    public function getMonthID()
    {
        return $this->month->getID();
    }

    public function dates() {
        return new MonthIterator($this->month);
    }
}