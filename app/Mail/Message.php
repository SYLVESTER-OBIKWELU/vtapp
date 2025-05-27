<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Message extends Mailable
{
    use Queueable, SerializesModels;

    public $data;


    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

        public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), $this->data['name'])
                    ->subject($this->data['subject'])
                    ->view('mail.template')
                    ->with('data', $this->data);
    }

//     public function build()
// {
//     // Attach and embed image if exists
//     if (!empty($this->data['image'])) {
//         $imagePath = public_path($this->data['image']);
//         if (file_exists($imagePath)) {
//             $this->withSymfonyMessage(function ($message) use ($imagePath) {
//                 $cid = $message->embedFromPath($imagePath);
//                 $this->data['embedded_image'] = $cid;
//             });
//         }
//     }

//     // Attach and embed logo
//     $logoPath = public_path('home/img/logo.png');
//     if (file_exists($logoPath)) {
//         $this->withSymfonyMessage(function ($message) use ($logoPath) {
//             $cid = $message->embedFromPath($logoPath);
//             $this->data['embedded_logo'] = $cid;
//         });
//     }

//     return $this->from(env('MAIL_FROM_ADDRESS'), $this->data['name'])
//         ->subject($this->data['subject'])
//         ->view('mail.template')
//         ->with(['data' => $this->data]);
// }
}
