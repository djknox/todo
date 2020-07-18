@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl text-center">
        {{ $today->date->toFormattedDateString() }}
    </h1>

    @foreach($today->groups as $group)
    <div class="card">
        <div class="card-header">
            {{ $group->name }}
        </div>

        <div class="card-body">
            @foreach($group->items as $item)
            <div class="my-4">
                {{ $item->description }}
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection
