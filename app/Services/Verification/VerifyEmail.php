<?php

  namespace App\Services\Verification;

  use Illuminate\Support\Carbon;
  use Illuminate\Support\Facades\URL;
  use Illuminate\Support\Facades\Config;
  use Illuminate\Notifications\Messages\MailMessage;

  class VerifyEmail extends \Illuminate\Auth\Notifications\VerifyEmail
  {
    protected $username;

    public function __construct($username)
    {
      $this->username = $username;
    }

    public function toMail($notifiable)
    {
      $verificationUrl = $this->verificationUrl($notifiable);

      return (new MailMessage)->greeting('Hi, Mr/Ms ' . $this->username)->action('Verify Email Address', $verificationUrl);
    }

    protected function verificationUrl($notifiable)
    {
      return URL::temporarySignedRoute(
        'verification.verify', Carbon::now()->addHour(Config::get('auth.verification.expire'), 24), ['id' => $notifiable->getKey()]
      );
    }
  }