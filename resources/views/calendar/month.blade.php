@extends('layouts.calendar')

@section('content')
    <a href="/calendar/{{ $month->getYear() }}">{{__('calendar.overview')}}</a>
    @include('calendar.dates')
@endsection