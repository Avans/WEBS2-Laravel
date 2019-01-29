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

    public function current()
    {
        if ($this->month->beforeStartOfMonth($this->day)) {
            return 'empty';
        } elseif ($this->month->beyondEndOfMonth($this->day)) {
            return 'empty';
        } else {
            return [
                'weekday' => $this->month->calculateWeekday($this->day),
                'monthday' =>  $this->month->calculateMonthDay($this->day),
                'events' => $this->month->events($this->day)
            ];
        }
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