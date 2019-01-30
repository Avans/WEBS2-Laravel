@extends('layouts.calendar')

@section('content')
    <a href="/calendar/{{ $month->getYear() }}">Jaaroverzicht</a>
    @include('calendar.dates')
@endsection