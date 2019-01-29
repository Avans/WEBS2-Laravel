<?php


namespace App\Calendar;


class Month
{
    private $date;
    private $days;


    public function __construct(\DateTime $date, array $days)
    {
        $this->date = clone $date;
        $this->days = $days;
    }

    public function calculateOffsetAtStart()
    {
        return array_search($this->date->format("D"), $this->days);
    }

    public function beforeStartOfMonth($day)
    {
        return $day < $this->calculateOffsetAtStart($this->days);
    }
    public function beyondEndOfMonth($day)
    {
        return $this->calculateMonthDay($day) > $this->date->format("t");
    }

    public function formatLabel()
    {
        return $this->date->format("F Y");
    }

    public function next()
    {
        return new self($this->date->add(new \DateInterval('P1M')), $this->days);
    }

    public function getID()
    {
        return $this->date->format("Y-n");
    }

    public function dates() {
        return new MonthIterator($this);
    }

    public function range(int $count) {
        $range = [$this];
        for ($i = 1; $i < $count; $i++) {
            $range[] = $range[$i - 1]->next();
        }
        return $range;
    }

    public function events($day)
    {
        $date = $this->date->format("Y-m-") . $this->calculateMonthDay($day);
        return \App\Event::query()
            ->whereDate('start', '=', $date)
            ->whereDate('end', '=', $date)
            ->orWhereRaw('? BETWEEN start AND end', [$date])
            ->get();
    }

    public function calculateWeekday($day)
    {
        return $day % count($this->days);
    }

    public function calculateTotalDays()
    {
        return (count($this->days) * $this->calculateNumberOfWeeks());
    }

    private function calculateNumberOfWeeks()
    {
        return round(($this->calculateOffsetAtStart($this->days) + $this->date->format("t")) / count($this->days));
    }

    public function calculateMonthDay($day)
    {
        return $day - $this->calculateOffsetAtStart($this->days) + 1;
    }

    public function isMonthDay($day)
    {
        return $day < $this->calculateTotalDays();
    }

    public function makeDay($day) : MonthDay
    {
        return new MonthDay($day, $this);
    }

}