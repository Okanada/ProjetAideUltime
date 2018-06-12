<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostUpdateMail extends Mailable
{
    use Queueable, SerializesModels;


    // On crée un paramètre publique que l'on va appeler $post
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post) // ON réutilise comme paramètre, le $post du new PostUpdateMail de l'instance "Mail" dans la function "update" du PostController
    {

        // On recherche les données de la table des posts
        $this->post =$post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('exemple@exemple.com')
                    ->view('emails.post-update');
    }
}
