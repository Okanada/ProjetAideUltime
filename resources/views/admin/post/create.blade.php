@extends('adminlte::page')
@section('title', 'Admin edit')
@section('content_header')
    <h1>Création d'un post</h1>
@stop
@section('content')
<form method="post" action="{{route('post.store')}}"  enctype="multipart/form-data">
@csrf
<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
     <div class="form-group">
      <label for="">titre</label>
         @if($errors->has('titre'))
         <div class="text-danger">Titre obligatoire</div>
         @endif
      <input type="text" name="titre" id="titre" 
      class="form-control" placeholder="mon nouveau titre" aria-describedby="helpId" value="{{old('titre')}}">
    </div>
    <div class="form-group">
        <label for="">contenu</label>
           @if($errors->has('contenu'))
              <div class="text-danger">Texte obligatoire</div>
           @endif
        <textarea class="form-control" name="contenu" id="contenu"rows="6" placeholder="mon nouveau contenu" >{{old('contenu')}} </textarea>
    </div>
    {{-- Label et input de l'image + message d'erreur juste au-dessus --}}
    @if($errors->has('image'))
         <div class="text-danger">Fichier trop volumineux</div>
    @endif
    <div class="form-group">
         <label for="image">Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">choisissez une image</label>
             </div>
     </div>
     {{-- Bouton Créer --}}
    <button type="submit">Créer</button>
</form>
@stop





 