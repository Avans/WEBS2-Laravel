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

    public function beyondEndOfMonth($day_count)
    {
        return $day_count > $this->date->format("t");
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

    public function events($day_count)
    {
        return \App\Event::query()
            ->whereDate('start', '=', $this->date->format("Y-m-$day_count"))
            ->whereDate('end', '=', $this->date->format("Y-m-$day_count"))
            ->orWhereRaw('? BETWEEN start AND end', [$this->date->format("Y-m-$day_count")])
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
}