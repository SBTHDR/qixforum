@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header"><b>{{ __('Create a new disscussion') }}</b></div>

    <div class="card-body">
        <form action="{{ route('discussions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Discussion Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Give a discussion title here...">
            </div>

            <div class="mb-2">
              @error('title')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="input-group mb-3">
              <button class="btn btn-outline-secondary" type="button">Channel Name</button>
              <select class="form-select" name="channel_id">
                <option selected>Choose a topic...</option>
                @foreach ($channels as $channel)
                  <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-2">
              @error('channel_id')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group mb-3">
              <input id="content" type="hidden" name="content">
              <trix-editor input="content"></trix-editor>
            </div>

            <div class="mb-2">
              @error('content')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="input-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
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
