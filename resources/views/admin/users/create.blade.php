@extends('layouts.admin')

@section('title', 'Add User')
@section('main')


<form action="" class="form-inline">

    <div class="form-group">
        <input class="form-control" name="key" placeholder="Search By Name...">
    </div>

    

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search">

        </i>
    </button>
</form>


<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>user_name</th>
            <th>nick_name</th>
            <th>account</th>
            <th>password</th>
            <th>cash</th>
            <th>total packs</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->user_name}}</td>
            <td>{{$user->nick_name}}</td>
            <td>{{$user->account}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->cash}}</td>
            <td>{{$user->usersLearn ? $user->usersLearn->count() : 0 }}</td>
            <td class="text-right">
                <a href="" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<hr>
<div class="">
    {{$data->appends(request()->all())->links()}}
</div>

@stop();