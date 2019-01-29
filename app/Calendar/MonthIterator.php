<?php
namespace App\Calendar;

class MonthIterator implements \Iterator {

    private $month;
    private $day;

    public function __construct(Month $month)
    {
        $this->month = $month;
        $this->rewind();
    }

    public function current() : MonthDay
    {
        return $this->month->makeDay($this->day);
    }

    public function next()
    {
        $this->day++;
    }

    public function key()
    {
        return $this->day;
    }

    public function valid()
    {
        return $this->month->isMonthDay($this->day);
    }

    public function rewind()
    {
        $this->day = 0;
    }
}