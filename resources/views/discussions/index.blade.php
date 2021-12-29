@extends('layouts.app')

@section('content')
@if (Session::has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong> {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@foreach ($discussions as $discussion)
    <div class="card mb-2">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                <h5><strong>{{ $discussion->title }}</strong></h5>
                <span>by {{ $discussion->user->name }} {{ $discussion->created_at->diffForHumans() }}</span>
            </span>
            <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-primary">View</a>
        </div>

        <div class="card-body">
            {!! $discussion->content !!}
        </div>
    </div>
@endforeach

{{ $discussions->links() }}

@endsection
