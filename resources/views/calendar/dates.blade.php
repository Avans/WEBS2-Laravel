<table class="calendar">
    <tr><td colspan="{{ count($month->weekdays()) }}" id="calendar_month"><a href="/calendar/{{$month->getYear()}}/{{ $month->getID() }}">{{ $month->formatLabel() }}</a></td></tr>
    <tr>
        @foreach ($month->weekdays() as $weekday)
            <th>{{ __('calendar.'.$weekday) }}</th>
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