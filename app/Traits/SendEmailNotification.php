<?php
namespace App\Traits;

use App\Notifications\VerifyEmail;
use App\Notifications\ResetPassword;

trait SendEmailNotification
{
    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }
}

