@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl text-center">
        {{ $today->date->toFormattedDateString() }}
    </h1>

    @foreach($today->groups as $group)
    <div class="card">
        <group-display
            :initial-group="{{ $group }}">
        </group-display>
    </div>
    @endforeach
</div>
@endsection
