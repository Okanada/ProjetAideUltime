@extends('adminlte::page')

@section('title', 'Admin post')

@section('content_header')
    <h1>Posts</h1>
@stop

@section('content')
<div><a href="{{route('post.create')}}" class="btn btn-success float-right">Ajouter un post</a></div>


    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>titre</th>
                <th>Auteur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $element)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$element->titre}}</td>
                <td>{{$element->user->name}}</td>
                <td> 
                <a class="btn btn-primary" href="{{route('post.show',['post'=>$element->id])}}">show</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

