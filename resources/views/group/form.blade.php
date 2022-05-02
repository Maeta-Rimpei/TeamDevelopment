@extends('layouts.app')
@section('title', 'グループ作成')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>グループ作成</h2>
        <!-- 登録フォーム -->
        <form method="POST" action="{{ route('exeCreate') }}" onSubmit="return checkSubmit()">
            <!-- 件名 -->
            <div class="form-group">
                <label for="title">
                    件名
                </label>
                <input id="title" name="title" class="form-control" value="{{ old('title') }}" type="text">
                @if ($errors->has('title'))
                <div class="text-danger">
                    {{ $errors->first('title') }}
                </div>
                @endif
            </div>
            <!-- 仕事内容 -->
            <div class="form-group">
                <label for="content">
                    仕事内容
                </label>
                <textarea id="content" name="content" class="form-control" rows="4">{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                <div class="text-danger">
                    {{ $errors->first('content') }}
                </div>
                @endif
            </div>
            <!-- 納期 -->
            <div class="form-group">
                <label for="deadline">
                    納期
                </label>
                <input type="date" id="deadline" name="deadline" min="date('Y-m-d')" class="form-control" rows="4">
                @if ($errors->has('deadline'))
                <div class="text-danger">
                    {{ $errors->first('deadline') }}
                </div>
                @endif
            </div>
            <!-- 報酬 -->
            <div class="form-group">
                <label for="reword">
                    報酬
                </label>
                <input type="text" id="reword" name="reword" class="form-control" rows="4">円
                @if ($errors->has('reword'))
                <div class="text-danger">
                    {{ $errors->first('reword') }}
                </div>
                @endif
            </div>
            <!-- 応募人数上限 -->
            <div class="form-group">
                <label for="number_applicants">
                    応募人数上限
                </label>
                <select id="number_applicants" name="number_applicants" class="form-control" rows="4">
                    @for ($i=1; $i<=50; $i++){
                        <option value="$i">{{ $i . '名' }}</option>
                        @if ($i >= 50){
                            <option value="50">50名以上</option>
                        }
                        @endif
                    }
                    @endfor
                </select>
                @if ($errors->has('number_applicants'))
                <div class="text-danger">
                    {{ $errors->first('number_applicants') }}
                </div>
                @endif
            </div>
                    <!-- 選抜人数 -->
            <div class="form-group">
                <label for="number_selection">
                    選抜人数
                </label>
                <select id="number_selection" name="number_selection" class="form-control" rows="4">
                    @for ($j=1; $j<=50; $j++){
                        <option value="$j">{{ $j . '名' }}</option>
                        @if ($j >= 50){
                            <option value="50">50名以上</option>
                        }
                        @endif
                    }
                    @endfor
                </select>
                @if ($errors->has('number_selection'))
                <div class="text-danger">
                    {{ $errors->first('number_selection') }}
                </div>
                @endif
            </div>
                <!-- 募集期間 -->
                <div class="form-group">
                <label for="term_of_apply">
                    募集期間
                </label>
                <input type="date" id="term_of_apply" name="term_of_apply" min="date('Y-m-d')" class="form-control" rows="4">
                @if ($errors->has('term_of_apply'))
                <div class="text-danger">
                    {{ $errors->first('term_of_apply') }}
                </div>
                @endif
                <!-- 選抜期間 -->
            <div class="form-group">
                <label for="term_of_selection">
                    選抜期間
                </label>
                <input type="date" id="term_of_selection" name="term_of_selection" min="date('Y-m-d')" class="form-control" rows="4">
                @if ($errors->has('term_of_selection'))
                <div class="text-danger">
                    {{ $errors->first('term_of_selection') }}
                </div>
                @endif
            <!-- 必要なスキル -->
            <div class="form-group">
                <label for="number_selection">
                    必要なスキル
                </label>
                <!-- <select id="number_selection" name="number_selection" class="form-control" rows="4">
                    @for ($j=1; $j<=50; $j++){
                        <option value="$j">{{ $j . '名' }}</option>
                        @if ($j >= 50){
                            <option value="50">50名以上</option>
                        }
                        @endif
                    }
                    @endfor
                </select> -->
                <!-- @if ($errors->has('number_selection'))
                <div class="text-danger">
                    {{ $errors->first('number_selection') }}
                </div>
                @endif -->
            </div>




            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('show') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    投稿する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function checkSubmit() {
        if (window.confirm('送信してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection
