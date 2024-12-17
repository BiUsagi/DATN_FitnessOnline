<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;

    /**
     * Tạo instance mới.
     */
    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    /**
     * Xây dựng email.
     */
    public function build()
    {
        return $this->subject('Mã OTP của bạn')
                    ->view('frontend.mail.verify-account')
                    ->with(['otp' => $this->otp]);
    }
}

