@extends('adminlte::page')

@section('title', 'Admin user')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
<div><a href="{{route('user.create')}}" class="btn btn-success float-right">Ajouter un post</a></div>
 <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>E-mail</th>
                <th>Rôle</th>
                <th>Nombre de posts</th>
                <th>Action</th>

            
            </tr>
        </thead>
        <tbody>
            @foreach($users as $element)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$element->name}}</td>
                <td>{{$element->email}}</td>
                <td>{{$element->role->name}}</td>
                <td>{{count($element->posts)}}</td>
                <td> <a class="btn btn-primary" href="{{route('user.show',['user'=>$element->id])}}">show</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

