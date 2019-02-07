<td class="calendar_entry wd{{ $date->weekday() }}_entry">
    <div class="entry_date"><a href="/calendar/{{ $date->path() }}">{{ $date->monthday() }}</a></div>
    @foreach($date->events() as $event)
        @can('view', $event)
            <div class="entry_line">{{ str_limit($event->summary, 5, '...') }}</div>
        @endcan
    @endforeach

    <div class="entry_line"></div>
    <div class="entry_line"></div>
    <div class="entry_line"></div>
</td>