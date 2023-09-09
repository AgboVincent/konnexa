@extends('layouts.app')

@section('content')
    <div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('posts') }}" method="post">
                @csrf
                <div class="row mb-4">
                    <label for="body" class="col-md-4 col-form-label text-md-end">Body</label>
                    <div class="col-md-6">
                        <textarea name="body" id="body" cols="30" rows="4" class="form-control
                                   @error('body') is-invalid  @enderror"
                                   placeholder="Post something!" value="{{ old('body') }}" required autocomplete="body">
                        </textarea>
                        @error('body')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </form>
            @if($posts->count())
                @foreach($posts as $post)
                    <x-post :post="$post"
                @endforeach
                {{$posts->links()}}
            @endif
        </div>
      </div>
    </div>

@endsection
