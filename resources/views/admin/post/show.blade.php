@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Show Post</h1>
@stop





@section('content')
   <div class="col-8">
       <div class="box">
           <div class="box-header">
               <h1>{{$post->titre}}</h1>
           </div>
           <div class="box-body">
               {{-- Appel de imagePost du storage pour aller chercher l'image via la $table->image du fichier de migration --}}
              <p><img class="img-fluid" src="{{Storage::disk('imagePostResize')->url($post->image)}}" alt=""></p>
               <p>{{$post->contenu}}</p>
           </div>
       </div>
   </div>
   <div class="col-4">
       <div class="box">
           <div class="box-body">
               {{-- @can('update',$post) --}}
               <a href="{{route('post.edit',['post'=>$post->id])}}" class="btn btn-warning">edit</a>
               {{-- @endcan --}}

               @csrf
               @method('DELETE')
               {{-- @can('delete',$post) --}}
               <form class="d-inline" action="{{route('post.destroy',['post'=>$post->id])}}" method="POST">
               <button type="submit" class="btn btn-danger">delete</button>
               {{-- @endcan --}}
            </form>
               
           </div>
       </div>
   </div>
@stop