<?php
namespace App\Calendar;

class Dates implements \Iterator {

    private $month;
    private $day;

    public function __construct(Month $month)
    {
        $this->month = $month;
        $this->rewind();
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
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
        return $this->month->isMonthDay($this->day);
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