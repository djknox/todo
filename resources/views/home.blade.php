@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl text-center">
        {{ $today->date->toFormattedDateString() }}
    </h1>

    @foreach($today->groups as $group)
        <group-controller
<<<<<<< HEAD
            :initial-group="{{ $group }}">
=======
            :group="{{ $group }}">
>>>>>>> db81f22821fa4d6fa02210c4305ddbfd043aedf2
        </group-controller>
    @endforeach
</div>
@endsection
