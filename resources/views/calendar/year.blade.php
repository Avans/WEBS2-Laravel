@extends('layouts.calendar')

@section('content')

@foreach ($month->range(12) as $month)
    @include('calendar.dates')
@endforeach
@endsection