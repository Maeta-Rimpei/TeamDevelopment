@extends('layouts.app')

@section('groupform')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>グループ作成</h2>
        <!-- 登録フォーム -->
        <form method="POST" action="{{ route('groupExeCreate') }}" onSubmit="return checkSubmit()">
            @csrf
            <!-- 件名 -->
            <div class="form-group">
                <label for="title">
                    件名
                    @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                    @endif
                </label>
                <input id="title" name="title" class="form-control" value="{{ old('title') }}" type="text">
            </div>
            <!-- 仕事内容 -->
            <div class="form-group">
                <label for="content">
                    仕事内容
                    @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                    @endif
                </label>
                <textarea id="content" name="content" class="form-control" rows="4">{{ old('content') }}</textarea>
            </div>
            <!-- 納期 -->
            <div class="form-group">
                <label for="deadline">
                    納期
                    @if ($errors->has('deadline'))
                    <div class="text-danger">
                        {{ $errors->first('deadline') }}
                    </div>
                    @endif
                </label>
                <input type="date" id="deadline" name="deadline" class="form-control" rows="4">{{ 'までに完了' }}
            </div>
            <!-- 報酬 -->
            <div class="form-group">
                <label for="reword">
                    報酬
                    @if ($errors->has('reword'))
                    <div class="text-danger">
                        {{ $errors->first('reword') }}
                    </div>
                    @endif
                </label>
                <input type="text" id="reword" name="reword" class="form-control" rows="4">円
            </div>
            <!-- 応募人数上限 -->
            <div class="form-group">
                <label for="number_applicants">
                    応募人数上限
                    @if ($errors->has('number_applicants'))
                    <div class="text-danger">
                        {{ $errors->first('number_applicants') }}
                    </div>
                    @endif
                </label>
                <select id="number_applicants" name="number_applicants" class="form-control" rows="4">
                    @for ($i=1; $i<=50; $i++){ <option value="{{ $i }}">{{ $i . '名' }}</option>
                        @if ($i >= 50){
                        <option value="50">50名以上</option>
                        }
                        @endif
                        }
                        @endfor
                </select>
            </div>
            <!-- 選抜人数 -->
            <div class="form-group">
                <label for="number_selection">
                    選抜人数
                    @if ($errors->has('number_selection'))
                    <div class="text-danger">
                        {{ $errors->first('number_selection') }}
                    </div>
                    @endif
                </label>
                <select id="number_selection" name="number_selection" class="form-control" rows="4">
                    @for ($j=1; $j<=50; $j++){ <option value="{{ $j }}">{{ $j . '名' }}</option>
                        @if ($j >= 50){
                        <option value="50">50名以上</option>
                        }
                        @endif
                        }
                        @endfor
                </select>
            </div>
            <!-- 募集期間 -->
            <div class="form-group">
                <label for="term_of_apply">
                    募集期間
                    @if ($errors->has('term_of_apply'))
                    <div class="text-danger">
                        {{ $errors->first('term_of_apply') }}
                    </div>
                    @endif
                </label>
                <input type="date" id="term_of_apply" name="term_of_apply" min="date('Y-m-d')" class="form-control" rows="4">
            </div>
            <!-- 選抜期間 -->
            <div class="form-group">
                <label for="term_of_selection">
                    選抜期間
                    @if ($errors->has('term_of_selection'))
                    <div class="text-danger">
                        {{ $errors->first('term_of_selection') }}
                    </div>
                    @endif
                </label>
                <input type="date" id="term_of_selection" name="term_of_selection" min="date('Y-m-d')" class="form-control" rows="4">
            </div>
            <!-- 必要なスキル [仮置き 後ほどチェックボックスを追加] -->
            <div class="form-group">
                <label for="number_selection">
                    必要なスキル
                    @if ($errors->has('required_skill'))
                    <div class="text-danger">
                        {{ $errors->first('required_skill') }}
                    </div>
                    @endif
                </label>
                <input type="text" id="required_skill" name="required_skill" class="form-control" rows="4">
            </div>
            <!-- ユーザーIDをhiddenで送信 -->
            <input type="hidden" name="user_id" value="2">

            <!-- ボタン -->
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('groupShow') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    グループ作成
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function checkSubmit() {
        if (window.confirm('この内容でグループを作成してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection
