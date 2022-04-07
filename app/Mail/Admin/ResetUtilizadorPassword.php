<?php

namespace App\Mail\Admin;

use App\Models\Admin\AdminUser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetUtilizadorPassword extends Mailable
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
        return $this->subject("Password redefinida")
            ->from('noreply@sigo.com.pt', 'SIGO')
            ->attach(public_path("images/title_admin.png"))
            ->view('emails.admin.userResetPassword')
            ->with([
                'user' => $this->user,
                'password' => $this->password
            ]);
    }
}
