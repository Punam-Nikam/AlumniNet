<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\JobPost;

class JobAlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $job;

    public function __construct(JobPost $job)
    {
        $this->job = $job;
    }

    public function build()
    {
        return $this->subject('New Job Alert — ' . $this->job->title . ' at ' . $this->job->company)
                    ->view('emails.job_alert');
    }
}