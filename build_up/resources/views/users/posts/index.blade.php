@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="container">
            <div class="p-5">
                <h1 class="font-monospace mb-1">{{$user->name}}</h1>
                <p>{{$posts->count()}} {{Str::plural('posts', $posts->count())}} and
                received {{$user->receivedLikes->count()}}likes</p>
            </div>
            <div>
                @if($posts->count())
                    @foreach($posts as $post)
                        <x-post :post="$post" />
                    @endforeach
                    {{$posts->links()}}
                @else
                    <p>{{$user->name}} does not have any posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection
