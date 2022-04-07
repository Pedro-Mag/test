<?php

namespace App\Mail\Main\Config;

use App\Models\Main\Config\MainUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MainUserCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MainUser $utilizador, $password, $account)
    {
        $this->utilizador = $utilizador;
        $this->password = $password;
        $this->account = $account;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Utilizador criado com sucesso")
                    ->from('noreply@sigo.com.pt', 'SIGO')
                    ->attach(public_path("images/title.png"))
                    ->view('emails.main.config.userCreated')
                    ->with([
                        'user' => $this->utilizador,
                        'password' => $this->password,
                        'account' => $this->account
                    ]);
    }
}
