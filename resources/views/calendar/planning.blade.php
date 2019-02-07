<h1>{{ $date->monthday() }}</h1>

@foreach($date->events() as $event)
    @can('view', $event)
        <h2>{{ $event->summary }}</h2>
        <p>Chairman: {{$event->chairman?$event->chairman->name:'<none>'}}</p>
        Attendees
        <ul>
            @foreach ($event->required as $person)
                <li>{{$person->name}} (required)</li>
            @endforeach
            @foreach ($event->optional as $person)
                <li>{{$person->name}}</li>
            @endforeach
        </ul>
        Resources
        <ul>
            @forelse ($event->resources as $resource)
                <li>{{$resource->name}} ({{$resource->type}})</li>
            @empty
                <li>no resources</li>
            @endforelse
        </ul>
    @endcan
@endforeach
