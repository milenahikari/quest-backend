<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailMonitor extends Mailable
{
    use Queueable, SerializesModels;

    private $userName;
    private $userEmail;

    private $mensagem;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $monitor, $mensagem)
    {
        $this->userName = $user['name'];
        $this->userEmail = $user['email'];

        $this->monitorName = $monitor;

        $this->mensagem = $mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $retorno = $this->from($this->userEmail)
            ->subject('QUEST - solicitação de apoio nas suas disciplinas')
            ->view('emails.monitor')
            ->with([
                'userName' => $this->userName,
                'userEmail' => $this->userEmail,
                'monitorName' => $this->monitorName,
                'mensagem' => $this->mensagem,
            ]);
    }
}
