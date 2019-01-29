<td class="calendar_entry wd{{ strtolower($weekday) }}_entry">
    <div class="entry_date">{{ $monthday }}</div>
    @foreach($events as $event)
        <div class="entry_line">{{ str_limit($event->summary, 5, '...') }}</div>
    @endforeach

    <div class="entry_line"></div>
    <div class="entry_line"></div>
    <div class="entry_line"></div>
</td>