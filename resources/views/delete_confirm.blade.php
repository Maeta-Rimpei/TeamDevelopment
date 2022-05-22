@extends('layouts.app')

@section('content')
 <!-- バリデーションエラーの表示 -->
 @include('common.errors')
 <div style="text-align:center; margin-top:100px;">

<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">
          <h3>退会の確認</h3>
        </div>
      <div class="card-body">
        <p class="card-text">退会をすると投稿も全て削除されます。</p>
        <p class="card-text">それでも退会をしますか？</p>
      </div>
    </div>

    <div class="btn-group">
        <div class="ml-3">
            <a href="{{ url('/delete') }}" class="btn btn-primary"
            onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();">退会する</a>
            <form id="delete-form" action="{{ route('user.delete') }}" method="post" style="display: none;">
                {{ csrf_field() }}
           </form>
        </div>

        <div class="ml-3">
            <a href="/myprofile" class="btn btn-primary">キャンセルする(プロフィール編集画面へ戻ります)</a>
        </div>
    </div>
</div>
@endsection