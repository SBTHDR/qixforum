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

            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="button">Channel Name</button>
                <select class="form-select" name="channel_id">
                  <option selected>Choose a topic...</option>
                  @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text">Discussion Content</span>
                <textarea class="form-control" name="content" placeholder="Write discussion content here..."></textarea>
              </div>

            <div class="input-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
    </div>
</div>
@endsection
