@extends('layouts.app')

@section('content')

@if (Session::has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong> {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card mb-2">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="d-flex gap-2">
            <img class="img-thumbnail rounded-circle" width="50px" src="{{ Gravatar::src($discussion->user->email) }}">
            <span>
                <h5><strong>{{ $discussion->title }}</strong></h5>
                <span>by {{ $discussion->user->name }} {{ $discussion->created_at->diffForHumans() }}</span>
            </span>
        </span>
        <a href="{{ route('discussions.index') }}" class="btn btn-primary">Back</a>
    </div>
    <div class="card-body">
        {!! $discussion->content !!}
    </div>
</div>

<div class="card p-2 mb-2">
    @auth
        <span class="mb-2">
            <strong>Make Reply</strong>
        </span>
        <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
            @csrf
            <input type="hidden" id="reply" name="reply">
            <trix-editor input="reply"></trix-editor>

            <div class="mb-2">
                @error('reply')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group d-flex gap-2">
                <button type="submit" class="btn btn-primary">Reply</button>
            </div>
        </form>
    @else
        <span class="mb-2">
            <strong>Sign in to make a reply</strong>
        </span>
    @endauth
</div>

@foreach ($discussion->replies as $reply)
    <div class="card p-2">
        <div>
            <strong>Comments</strong>
        </div>
        <hr>
        <div class="mb-2 border border-secondary p-2 rounded">
            <p>{!! $reply->reply !!}</p>
            <hr>
            <span class="d-flex gap-2 align-items-center">
                <img class="img-thumbnail rounded-circle" width="30px" src="{{ Gravatar::src($discussion->user->email) }}">
                <span class="text-secondary">
                    <span>by {{ $reply->user->name }}</span>
                    <span>{{ $discussion->created_at->diffForHumans() }}</span>
                </span>
            </span>
        </div>
    </div>
@endforeach

@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
