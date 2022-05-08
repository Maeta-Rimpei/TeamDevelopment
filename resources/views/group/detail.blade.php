@extends('layouts.app')

@section('content')
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


        <table>
            <tr>
                <th>件名</th>
                <td>{{ $group->title }}</td>
            </tr>
            <tr>
                <th>仕事内容</th>
                <td>{{$group->content}}</td>
            </tr>
            <tr>
                <th>納期</th>
                <td>{{ $group->deadline }}</td>
            </tr>
            <tr>
                <th>報酬</th>
                <td>{{ number_format($group->reword) . '円' }}</td>
            </tr>
            <tr>
                <th>応募受付人数</th>
                <td>{{ $group->number_applicants }}</td>
            </tr>
            <tr>
                <th>選抜人数</th>
                <td>{{ $group->number_selection }}</td>
            </tr>
            <tr>
                <th>必要なスキル</th>
                <td>{{ $group->required_skill }}</td>
            </tr>
            <tr>
                <th>応募期間</th>
                <td>{{ $group->term_of_apply }}</td>
            </tr>
            <tr>
                <th>選抜期間</th>
                <td>{{ $group->term_of_selection }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
