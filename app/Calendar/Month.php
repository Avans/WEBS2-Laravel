<?php


namespace App\Calendar;


use Illuminate\Support\Facades\Auth;

class Month
{
    private $date;
    private $days;


    public function __construct(\DateTime $date, array $days)
    {
        $this->date = $date;
        $this->days = $days;
    }

    public function calculateOffsetAtStart()
    {
        return array_search($this->date->format("D"), $this->days);
    }

    public function beyondEndOfMonth($monthDay)
    {
        return $monthDay > $this->date->format("t");
    }

    public function formatLabel()
    {
        return __($this->date->format("F")) . ' ' . $this->date->format("Y");
    }

    public function next()
    {
        $date = clone $this->date;
        return new self($date->add(new \DateInterval('P1M')), $this->days);
    }


    public function getYear()
    {
        return $this->date->format("Y");
    }

    public function getID()
    {
        return $this->date->format("n");
    }

    public function weekdays() {
        return $this->days;
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

    public function events($monthDay)
    {
        $date = $this->date->format("Y-m-") . $monthDay;
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
}