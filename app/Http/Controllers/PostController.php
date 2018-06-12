<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use Storage;
use  Intervention\Image\ImageManagerStatic as  Image;
use App;
use Mail;
use App\Mail\PostUpdateMail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $posts=Post::all();
        return view('admin.post.index',compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */






    public function create()
    {
        return view ('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */





    public function store(StorePost $request)
    {
        $request->validated();

        $post = new Post;
        $post->titre = $request->titre;
        $post->contenu = $request->contenu;
        $post->user_id = $request->user_id;


        // Redimensionnement de l'image 
        $post->image =  App::make('ImageResize')->imageStore($request->image);
        // Redimmensionnement de l'image


        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */





     
    public function show(Post $post)
    {
        return view ('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

     




     
    public function edit(Post $post)
    {
        
    $this->authorize('update', $post);
     return view ('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */






    public function update(Request $request, Post $post) //<- le $post ici est un paramètre qui se réfère au "post" de la Route du PostController dans le web.php
    {
        $this->authorize('update', $post);

        $request->validate([
        'titre' => 'required|unique:posts|max:255',
        'contenu' => 'required',
        "image"=> "image|max:400000|mimes:jpeg,bmp,png,jpg"
    
    ]);
        
        //    Remplacement d'une image par une autre tout en supprimant l'ancienne du storage
       if($request->image != null){ 
        //  if(Storage::disk('imagePost')->exists($post->image)){
        //    Storage::disk('imagePost')->delete($post->image);
        //  }


        // Suppression de l'image redimmensionné 
            App::make('ImageResize')->imageDelete($post->image);
        //  Redimmensionnement de l'image
            $post->image = App::make('ImageResize')->imageStore($request->image);
        
        
        
         

        }

        //Condition d'envoi de mail si l'update du post est sauvegardé
        if ( $post->save()){
            Mail::to($post->user)->send(new PostUpdateMail($post));
        } 
    

        $post->titre = $request->titre;
        $post->contenu = $request->contenu;
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */








    public function destroy(Post $post)
        {
            $this->authorize('delete', $post);

        Storage::disk('imagePost')->delete($post->image);
        Storage::disk('imagePostResize')->delete($post->image);
            $post->delete();
        return redirect()->route('post.index');
        }

}
