@extends('layouts.app')

@section('content')

<div class="card mb-2">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>
            <img src="{{ Gravatar::src($discussion->user->email) }}">
            <h5><strong>{{ $discussion->title }}</strong></h5>
            <span>by {{ $discussion->user->name }} {{ $discussion->created_at->diffForHumans() }}</span>
        </span>
        <a href="{{ route('discussions.index') }}" class="btn btn-primary">Back</a>
    </div>
    <div class="card-body">
        {!! $discussion->content !!}
    </div>
</div>

<div class="card p-2">
    <div>
        <strong>Comments</strong>
    </div>
    <hr>
    <div class="mb-2 border border-secondary p-2 rounded">
        <span>Mark Tuntuni</span>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, dolore! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus consequuntur in possimus laborum aliquam quam quasi sunt error aperiam rem?</p>
        <form action="" method="" class="d-flex justify-content-end">
            @csrf
            <button type="submit" class="btn btn-sm btn-secondary">replay</button>
        </form>
    </div>
</div>

@endsection
