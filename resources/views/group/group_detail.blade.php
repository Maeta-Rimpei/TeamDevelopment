@extends('layouts.app')

@section('groupdetail')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>グループ詳細</h2>
        <h3>{{ $group->title }}</h3>
        @if (session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
        @endif

        @if (session('term_over'))
        <p class="text-danger">
            {{ session('term_over') }}
        </p>
        @endif

        @if (time() >= strtotime($group->term_of_apply))
        <h5>このグループの募集は終了しました。</h5>
        @endif

        <div class="row">
            <div class="col-3 d-flex justify-content-center mb-3">件名</div>
            <div class="col-9">{{ $group->title }}</div>
            <div class="col-3 d-flex justify-content-center mb-3">仕事内容</div>
            <div class="col-9 mb-3">{{ $group->content }}</div>
            <div class="col-3 d-flex justify-content-center mb-3">納期</div>
            <div class="col-9">{{ $group->deadline }}</div>
            <div class="col-3 d-flex justify-content-center mb-3">報酬</div>
            <div class="col-9">{{ number_format($group->reword) . '円' }}</div>
            <div class="col-3 d-flex justify-content-center mb-3">応募受付人数</div>
            <div class="col-9">{{ $group->number_applicants . '名' }}</div>
            <div class="col-3 d-flex justify-content-center mb-3">選抜人数</div>
            <div class="col-9">{{ $group->number_selection . '名'}}</div>
            <div class="col-3 d-flex justify-content-center mb-3">必要なスキル</div>
            <div class="col-9">{{ $group->required_skill}}</div>
            <div class="col-3 d-flex justify-content-center mb-3">応募期間</div>
            <div class="col-9">{{ $group->term_of_apply }}</div>
            <div class="col-3 d-flex justify-content-center mb-3">選抜期間</div>
            <div class="col-9">{{ $group->term_of_selection }}</div>
        </div>
    </div>
</div>

<!-- 応募一覧 -->
<h2>応募者一覧</h2>
<table class="table table-striped">
    <tr>
        <th style="width :30%"></th>
        <th style="width :10%">応募者</th>
        <th style="width :55%">コメント</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>
            <!-- プロフィール画像 兼 モーダルボタン -->
            <img src="{{url('storage/image/A_Einstein-1.jpg')}}" alt="{{ $user->name }}の画像" class="profile_img" data-bs-toggle="modal" data-bs-target="#profileModal">
            <style>
                img.profile_img {
                    max-width: 15%;
                    border-radius: 50%;
                }
            </style>
            <!-- モーダルプロフィール -->
            <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="profileModalLabel">Auth user のプロフィール</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ここにプロフィール詳細書きます。
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->pivot->comment }}</td>
    </tr>
    @endforeach
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

@endsection
