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

        @if (auth()->user()->discussions->count() > 0)
            <span class="border border-primary border-2 rounded p-2"><strong>Your Discussion: {{ auth()->user()->discussions->count() }}</strong></span>
        @else
            <h5>You have not posted any discussion yet!</h5>
        @endif
    </div>
</div>
@endsection
