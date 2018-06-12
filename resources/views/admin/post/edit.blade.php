@extends('adminlte::page')
@section('title', 'Admin edit')
@section('content_header')
    <h1> Éditer un Post</h1>
@stop
@section('content')
<form method="post" action="{{route('post.update',['post'=>$post->id])}}"  enctype="multipart/form-data">
@csrf
@method('PUT')
     <div class="form-group">
      <label for="">titre</label>
         @if($errors->has('titre'))
         <div class="text-danger">Titre obligatoire</div>
         @endif
      <input type="text" name="titre" id="titre" 
      class="form-control" placeholder="mon nouveau titre" aria-describedby="helpId" value="{{old('titre',$post->titre)}}">
    </div>
    <div class="form-group">
        <label for="">contenu</label>
           @if($errors->has('contenu'))
              <div class="text-danger">Texte obligatoire</div>
           @endif
        <textarea class="form-control" name="contenu" id="contenu"rows="6" placeholder="mon nouveau contenu" >{{old('contenu',$post->contenu)}} </textarea>
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
     <p><img class="img-fluid" src="{{Storage::disk('imagePost')->url($post->image)}}" alt=""></p>
     {{-- Bouton Créer --}}
    <button type="submit">modif</button>
</form>
@stop


{{-- // ajouter la validate dans le controller --}}
{{-- // ajouter l'affichage de l'erreur dans le blade --}}
{{-- // Ajouter la classe border-danger  --}}
{{-- // Ajouter le old pour récupérer la dernière valeur envoyer --}}


 