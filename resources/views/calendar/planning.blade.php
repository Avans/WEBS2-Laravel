<h1>{{ $date->monthday() }}</h1>

@foreach($date->events() as $event)
    @can('view', $event)
        <h2>{{ $event->summary }}</h2>
        <p>{{trans_choice("calendar.chairman", $event->chairman?1:0, ['name' => $event->chairman->name]) }}</p>
        {{trans_choice("calendar.attendees", $event->required->count()+$event->optional->count()) }}
        <ul>
            @foreach ($event->required as $person)
                <li>{{$person->name}} ({{__("calendar.required")}})</li>
            @endforeach
            @foreach ($event->optional as $person)
                <li>{{$person->name}}</li>
            @endforeach
        </ul>
        {{__("calendar.resources") }}
        <ul>
            @forelse ($event->resources as $resource)
                <li>{{$resource->name}} ({{$resource->type}})</li>
            @empty
                <li>{{__("calendar.noresources") }}</li>
            @endforelse
        </ul>
    @endcan
@endforeach
