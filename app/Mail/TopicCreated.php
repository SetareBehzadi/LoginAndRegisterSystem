<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TopicCreated extends Mailable
{
    use Queueable, SerializesModels;
    private $fName;
    private $lName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fName ="setare";
        $this->lName ="behzadi";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::find(1);
        return $this->view('emails.topic-created')->with(
            [
                "full_name"=> $user['name']
            ]
        );
    }
}
