@extends('layouts.app')

@section('content')

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

            <button type="submit" class="btn btn-sm btn-secondary mt-2">reply</button>
        </form>
    @else
        <span class="mb-2">
            <strong>Sign in to make a reply</strong>
        </span>
    @endauth
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
            <button type="submit" class="btn btn-sm btn-secondary">reply</button>
        </form>
    </div>
</div>

@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
