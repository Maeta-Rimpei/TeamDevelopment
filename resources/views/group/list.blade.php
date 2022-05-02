@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>グループ一覧</h2>
        @if (session('err_msg'))
            <p class="text-danger">
                {{ session('err_msg') }}
            </p>
        @endif
        <table class="table table-striped">
            <tr>
                <th>No.</th>
                <th>タイトル</th>
                <th>作成日時</th>
                <th></th>
            </tr>
            @foreach($groups as $group)
            <tr>
                <td>{{ $group->id }}</td>
                <td><a href="{{ route('showDetail') }}">{{ $group->title }}</a></td>
                <td>{{ $group->updated_at }}</td>
                @csrf
                <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td>
                </form>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection
