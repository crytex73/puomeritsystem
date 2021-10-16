<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCompoundEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        {
            //from email credentials and data
            $address = config('mail.from.address');
            $name = config('mail.from.name');
            $subject = '[PUOMeritSystem] You Got 1 Submission Merit !';
    
            return $this->view('emails.newmerit')
                        ->from($address, $name)
                        ->cc($address, $name)
                        ->bcc($address, $name)
                        ->replyTo($address, $name)
                        ->subject($subject)
                        ->with([ 
                            'student_name' => $this->data['student_name'],
                            'matric_no' => $this->data['matric_number'],
                            'link' => $this->data['link']
                        ]);
        }
    }
}
