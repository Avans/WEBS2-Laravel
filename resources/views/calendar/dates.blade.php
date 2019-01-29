<table class="calendar">
    <tr><td colspan="{{ count($days) }}" id="calendar_month"><a href="/calendar/month/{{ $month->getID() }}">{{ $month->formatLabel() }}</a></td></tr>
    <tr>
        @foreach ($days as $day)
            <th>{{ $day }}</th>
        @endforeach
    </tr>
    <tr>
        @foreach ($month->dates() as $date)
            @if ($date->isEmpty())
                @include('calendar.emptyday')
            @else
                @if ($date->weekday() == 0)
    </tr><tr>
                @endif
                @include('calendar.date', ['date' => $date])
        @endif
@endforeach
</tr>
</table>