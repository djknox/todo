@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mt-4 mb-6">
        <div class="text-3xl">
            {{ $today->date->format('l') }}
        </div>
        <br>
        <div class="text-2xl">
            {{ $today->date->format('F jS, Y') }}
        </div>
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
