@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">
                {{ $today->date->toFormattedDateString() }}
            </h1>

            <div class="flex flex-row">
            @foreach($today->groups as $group)
            <div class="card">
                <div class="card-header">
                    {{ $group->name }}
                </div>

                <div class="card-body">
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
