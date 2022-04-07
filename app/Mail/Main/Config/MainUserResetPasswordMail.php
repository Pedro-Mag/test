<?php

namespace App\Mail\Main\Config;

use App\Models\Main\Config\MainUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PhpParser\Node\Expr\Cast\String_;

class MainUserResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MainUser $utilizador, String $password, String $account)
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
        return $this->subject("Password redefinida")
                    ->from('noreply@sigo.com.pt', 'SIGO')
                    ->attach(public_path("images/title.png"))
                    ->view('emails.main.config.userResetPassword')
                    ->with([
                        'user' => $this->utilizador,
                        'password' => $this->password,
                        'account' => $this->account
                    ]);    }
}
