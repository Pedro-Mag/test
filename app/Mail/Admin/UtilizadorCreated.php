<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Admin\AdminUser;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UtilizadorCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AdminUser $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
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
            ->attach(public_path("images/title_admin.png"))
            ->view('emails.admin.userCreated')
            ->with([
                'user' => $this->user,
                'password' => $this->password
            ]);
    }
}
