<?php
namespace App\Calendar;

class Dates implements \Iterator {

    private $month;

    private $offsetAtStart;

    private $day;
    private $totalDays;

    public function __construct(Month $month)
    {
        $this->month = $month;
        $this->offsetAtStart = $month->calculateOffsetAtStart();
        $this->rewind();
        $this->totalDays = $month->calculateTotalDays();
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        $monthDay = $this->month->calculateMonthDay($this->day);
        if ($this->month->beforeStartOfMonth($this->day)) {
            return 'empty';
        } elseif ($this->month->beyondEndOfMonth($monthDay)) {
            return 'empty';
        } else {
            return [
                'weekday' => $this->month->calculateWeekday($this->day),
                'monthday' =>  $monthDay,
                'events' => $this->month->events($monthDay)
            ];
        }
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->day++;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->day;
    }

    public function valid()
    {
        return $this->day < $this->totalDays;
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->day = 0;
    }
}