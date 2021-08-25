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
            $address = 'surffira@gmail.com';
            $name = 'Surffira Lolz';
            $subject = '[PUOMeritSystem] You Got 1 Compound!';
    
            return $this->view('emails.newcompound')
                        ->from($address, $name)
                        ->cc($address, $name)
                        ->bcc($address, $name)
                        ->replyTo($address, $name)
                        ->subject($subject)
                        ->with([ 
                            'student_name' => $this->data['student_name'],
                            'compound_reason' => $this->data['compound_reason'],
                            'compound_value' => $this->data['compound_value'],
                            'lecturer_name' => $this->data['lecturer_name']
                        ]);
        }
    }
}
