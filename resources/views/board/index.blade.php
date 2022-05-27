@extends('layouts.board')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-12">

            @if(session()->has('flash_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('flash_message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @auth
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2">
                <a href="{{ url('/') }}/create" class="btn btn-secondary" type="button">게시물 작성</a>
            </div>
            @endauth
            <ul class="list-group">

                @forelse ($posts as $post)

                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                    <a href="{{ url('/') }}/show/{{ $post->id }}" style="text-decoration: none">
                        {{ $post->title }}
                    </a>
                    @php
                        $user = App\Models\User::find($post->user_id);
                    @endphp
                    <small>{{ $user->name }} | {{ $post->created_at }}</small>
                </li>
                @empty
                <p class="text-center">게시물이 없습니다.</p>
                @endforelse

            </ul>
        </div>
    </div>
</div>

@endsection