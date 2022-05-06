@extends('layouts.app')

@section('content')
 <!-- バリデーションエラーの表示 -->
 @include('common.errors')
 <div style="text-align:center; margin-top:100px;">
    <h1 style="font-size:23px;">プロフィール編集</h1>
    
        <form action="{{ url('profile_edit/') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" style="width:250px; hight:1px;">  
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" style="width:250px; hight:100px;">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" name="sex" value="{{ $user->sex }}" style="width:250px; hight:100px;">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" name="birthday" value="{{ $user->birthday }}" style="width:250px; hight:100px;">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" name="image" value="{{ $user->image }}" style="width:250px; hight:100px;">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="skill" value="{{ $user->skill }}" style="width:250px; hight:100px;">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" name="experience_year" value="{{ $user->experience_year }}" style="width:250px; hight:100px;">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" name="github" value="{{ $user->github }}" style="width:250px; hight:100px;">
                </div>
                <br>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" style="width:250px; hight:100px;">
                </div>
                <br>
                
                <div>
                     <button type="submit" class="btn btn-default" style="width:100px">編集</button>
                </div>
        </form>

        <br>
        <form action="{{ url('password/change/') }}"  method="GET">
            <input type="submit" value="パスワード変更" style="width:100%">
        </form>
        <br>
            
        <form action="{{ url('delete/') }}" method="POST">
        @csrf
            @method('DELETE')

            <input type="submit" value="退会する" style="width:100px">

        </from>
</div>
@endsection