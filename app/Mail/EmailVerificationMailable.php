<?php

/**
 * Class EmailVerificationMailable
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class EmailVerificationMailable
 *
 */
class EmailVerificationMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Setting scope of the variable
     *
     * @access public
     *
     * @var array $verification_code
     */
    public $verification_code;

    /**
     * Create a new message instance.
     *
     * @param mixed $code code for mail
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->verification_code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email_message = $this->prepareEmailVerificationCode($this->verification_code);
        $message = $this->view('emails.index')
            ->with(
                [
                'html' => $email_message,
                ]
            );
        return $message;
    }

    /**
     * Email Verification Code
     *
     * @param integer $verification_code verification code
     *
     * @access public
     *
     * @return string
     */
    public function prepareEmailVerificationCode($verification_code)
    {
        $body = "copy and paste this code". e($verification_code);
        return $body;
    }
}
