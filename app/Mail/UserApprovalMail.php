<?php 
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        // Constructor logic, if any
    }

    public function build()
    {
        return $this->view('emails.user_approval')
            ->subject('User Approval');
    }
}
