@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl text-center">
        {{ $today->date->toFormattedDateString() }}
    </h1>

    @foreach($today->groups as $group)
        <group-controller
            :group="{{ $group }}">
        </group-controller>
    @endforeach
</div>
@endsection
