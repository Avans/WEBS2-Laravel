<?php

namespace App;

use App\Calendar\MonthIterator;
use App\Calendar\Month;

class Calendar
{
    private $month;

    public function __construct(Month $month)
    {
        $this->month = $month;
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
}