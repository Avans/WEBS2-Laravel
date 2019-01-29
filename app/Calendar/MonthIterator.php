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
        return new MonthDay($this->day, $this->month);
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
        return $this->day < $this->calculateTotalDays();
    }

    public function rewind()
    {
        $this->day = 0;
    }
}