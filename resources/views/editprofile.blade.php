@extends('layouts.app')

@section('content')
 <!-- バリデーションエラーの表示 -->
 @include('common.errors')
 <div style="text-align:center; margin-top:100px;">
    <h1 style="font-size:23px;">プロフィール編集</h1>


    <div class="card-body">
        <form action="{{ url('profile_edit/') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
             {{ csrf_field() }}
                    <!-- 名前の入力 -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- メールアドレス入力 -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <!-- 性別 -->
                        <div class="row mb-3">
                            <label for="sex" class="col-md-4 col-form-label text-md-end">{{ __('Sex') }}</label>

                            <div class="col-md-6">
                            <!--<input id="sex" type="select" class="form-control @error('sex') is-invalid @enderror" name="sex" value="{{ old('sex') }}" required> -->
                            <select name="sex" input id="sex" value="{{ $user->sex }}">
                                <option value="0">Man</option>
                                <option value="1">Woman</option>
                            </select>
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <!-- スキル -->
                        <div class="row mb-3">
                            <label for="skill" class="col-md-4 col-form-label text-md-end">{{ __('Skill') }}</label>

                            <div class="col-md-6">
                                @foreach(config('const.skill') as $skill =>$value)
                                <label><input id="skill" type="checkbox"  class="form-check-input" name="skill[]" value="{{ $user->skill }}" >{{$skill}}</label>

                                @error('skill')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @endforeach
                            </div>
                        </div>

                    <!-- 経験年数入力 -->
                        <div class="row mb-3">
                            <label for="experience_year" class="col-md-4 col-form-label text-md-end">{{ __('Experience Year') }}</label>

                            <div class="col-md-6">
                                <input id="experience_year" type="text" class="form-control @error('experience_year') is-invalid @enderror" name="experience_year" value="{{ $user->experience_year }}" required autocomplete="experience_year" autofocus>

                                @error('experience_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <!-- 年齢入力 -->
                        <div class="row mb-3">
                            <label for="birthday" class="col-md-4 col-form-label text-md-end">{{ __('Birthday') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $user->birthday }}" required autocomplete="birthday" autofocus>

                                @error('bithday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <!-- github入力 -->
                        <div class="row mb-3">
                            <label for="github" class="col-md-4 col-form-label text-md-end">{{ __('Git Hub') }}</label>

                            <div class="col-md-6">
                                <input id="github" type="text" class="form-control @error('github') is-invalid @enderror" name="github" value="{{ $user->github }}" required autocomplete="github" autofocus>

                                @error('github')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <!-- プロフィール画像入力 -->
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('プロフィール画像') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $user->image }}" >

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                <div>
                     <button type="submit" class="btn btn-primary" style="width:100px">編集</button>
                </div>
        </form>
    </div>

        <br>
        <!-- パスワード変更 -->
        <p><a href="{{ url('/password/change') }}">パスワード変更</a></p>
        
        <!-- 退会機能 -->
        <p><a href="{{ url('/delete_confirm') }} ">退会する</a></p>
</div>
@endsection