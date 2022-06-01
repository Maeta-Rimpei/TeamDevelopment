@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
 
        </div>
    </div>
 
    {{--  チャット可能ユーザ一覧  --}}
    <table class="table">
        ・あなたが応募したグループのオーナーとのチャット
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($to_owners_chat as $values)
        <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$value[0]->name}}</td>
            <td><a href="/chat/{{$value[0]->id}}"><button type="button" class="btn btn-primary">Chat</button></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <table class="table">
        ・あなたが作成したグループに応募したユーザーとのチャット
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($to_clients_chat as $values)
        <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$value[0]->name}}</td>
            <td><a href="/chat/{{$value[0]->id}}"><button type="button" class="btn btn-primary">Chat</button></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
 
</div>
 
@endsection