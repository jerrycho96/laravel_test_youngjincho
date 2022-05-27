@extends('layouts.board')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12 border border-2 mt-5 py-3 px-3">
            <h3>{{ $post->title }}</h3>
            @php
                $user = App\Models\User::find($post->user_id);
            @endphp
            <small>{{ $user->name }}</small>
            <br>
            <small>{{ $post->created_at }}</small>
            <hr>
            {!! nl2br(e($post->contents)) !!}

            @auth
            @if ($post->user_id == auth()->user()->id)
            <hr>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ url('/') }}/edit/{{ $post->id }}" class="btn btn-secondary" type="button">수정</a>

                {{-- 모달 --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">게시물 삭제</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                게시물을 삭제하시겠습니까?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
                                <form action="/delete/{{ $post->id }}" method="post">

                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">삭제</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    삭제
                </button>
            </div>
            @endif
            @endauth

        </div>

    </div>
</div>
@endsection