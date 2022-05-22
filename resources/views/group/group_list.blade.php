@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-md-offset-2">
        <h2>グループ一覧</h2>
        @if (session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
        @endif

        <a href="{{ route('groupShowCreate') }}">グループ作成</a>

        <!-- 検索フォーム -->
        <!-- TODO：コントローラー -->
        <p>グループ検索</p>
        <form method="GET" action="{{ route('groupSearch') }}">
            @csrf
            <input type="search" placeholder="キーワードを入力" name="search" value="">
            <div>
                <button type="submit">検索</button>
                <button>
                    <a href="{{ route('groupShow') }}" class="text-white">
                        クリア
                    </a>
                </button>
            </div>
        </form>

        <table class="table table-striped">
            <tr>
                <th></th>
                <th>タイトル</th>
                <th>作成日時</th>
                <th></th>
            </tr>
            @foreach($groups as $group)
            <tr>
                <td>
                    <!-- プロフィール画像 兼 モーダルボタン -->
                    <img src="{{url('storage/image/A_Einstein-1.jpg')}}" alt="$userの画像" class="profile_img" data-bs-toggle="modal" data-bs-target="#profileModal">
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
                <td><a href="{{ route('groupShowDetail', $group->id) }}">{{ $group->title }}</a></td>
                <td>{{ $group->updated_at }}</td>
                <td>
                @if(time() <= strtotime($group->term_of_apply))
                        {{ '応募可能' }}
                @else
                        {{ '募集終了' }}
                @endif
                </td>
            </tr>
            @endforeach
        </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- <script>
            $(document).ready(function() {
                $(document).on('click', '.m_button', function() {
                    let href_value = $(this).attr('href');
                    $('.result').html('<img src="asset(storage/image/A_Einstein-1.jpg)" alt="$user->nameの画像" class="info_img" style="max-width: 33%">');
                });
            });
        </script> -->
    </div>
</div>
@endsection
