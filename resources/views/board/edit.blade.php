@extends('layouts.board')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            
            @if ($errors -> any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>제목 또는 내용이 비어있습니다.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <h3>게시물 수정</h3>
            <form action="/update" method="post">
                @csrf
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">제목</span>
                    <input type="text" class="form-control" name="title" placeholder="제목을 입력해주세요."
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                        value="{{ $post->title }}">
                </div>
                <div class="input-group">
                    <span class="input-group-text">내용</span>
                    <textarea class="form-control h-50" rows="20" name="contents" aria-label="With textarea"
                        placeholder="내용을 입력해주세요.">{{ $post->contents }}</textarea>
                </div>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                    <button class="btn btn-success" type="submit">수정 완료</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection