@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <b>{{ __('Dashboard') }}</b>
        <a href="{{ route('discussions.create') }}" class="btn btn-primary">Create Discussion</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}
    </div>
</div>
@endsection
