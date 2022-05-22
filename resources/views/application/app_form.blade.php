@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>グループ応募</h2>
        <!-- 応募フォーム -->
        <form method="POST" action="{{ route('appExeCreate') }}" onSubmit="return checkSubmit()">
            @csrf
            <div class="form-group">
                <label for="content">
                    応募コメント
                    @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                    @endif
                </label>
                <textarea id="content" name="content" class="form-control" value="{{ old('content') }}"></textarea>
            </div>

            <!-- user_idをhiddenで送信 -->
            <input type="hidden" name="user_id" value="2">
            <!-- group_idをhiddenで送信 -->
            <input type="hidden" name="group_id" value="{{ $group->id }}">

            <!-- ボタン -->
            <div class="mt-5">
                <button type="submit" class="btn btn-primary">
                    応募する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function checkSubmit() {
        if (window.confirm('この内容で応募してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection
