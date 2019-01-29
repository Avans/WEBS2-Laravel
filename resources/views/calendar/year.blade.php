@extends('layouts.calendar')

@section('content')

@for ($i = 0; $i < 12; $i++)
    @include('calendar.dates')
{{ $calendar->shiftMonth() }}
@endfor
@endsection