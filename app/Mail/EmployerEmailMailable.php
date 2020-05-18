<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EmailHelper;
use App\SiteManagement;

class EmployerEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Setting scope of the variables
     *
     * @access public
     *
     * @var string $type
     *
     * @var collection $template
     *
     * @var array $email_params
     *
     */
    public $type;
    public $template;
    public $email_params;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($type, $template, $email_params = array())
    {
        $this->type = $type;
        $this->template = $template;
        $this->email_params = $email_params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from_email = EmailHelper::getEmailFrom();
        $from_email_id = EmailHelper::getEmailID();
        $subject = $this->template->subject;
        if ($this->type == 'employer_email_proposal_received') {
            $email_message = $this->prepareEmployerEmailPropsalReceived($this->email_params);
        } elseif ($this->type == 'employer_email_new_job_posted') {
            $email_message = $this->prepareEmployerEmailJobPosted($this->email_params);
        } elseif ($this->type == 'employer_email_proposal_message') {
            $email_message = $this->prepareEmployerEmailProposalMessage($this->email_params);
        } elseif ($this->type == 'employer_email_package_subscribed') {
            $email_message = $this->prepareEmployerEmailPackagePurchased($this->email_params);
        }
        $message = $this->from($from_email, $from_email_id)
            ->subject($subject)->view('emails.index')
            ->with(
                [
                    'html' => $email_message,
                ]
            );
        return $message;
    }

    /**
     * Proposal Received
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareEmployerEmailPropsalReceived($email_params)
    {
        extract($email_params);
        $employer_name = $employer;
        $freelancer_name = $freelancer;
        $freelancer_link = $freelancer_profile;
        $project_title = $title;
        $project_link = $link;
        $proposal_amount = $amount;
        $proposal_duration = $duration;
        $proposal_message = $message;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello %employer_name%,

                                    <a href='%freelancer_link%'>%freelancer_name%</a> has sent a new proposal on the following project <a href='%project_link%'>%project_title%</a>.
                                    Message is given below.
                                    Project Proposal Amount : %proposal_amount%
                                    Project Duration : %proposal_duration%
                                    Message: %message%

                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%employer_name%", $employer_name, $app_content);
        $app_content = str_replace("%freelancer_link%", $freelancer_link, $app_content);
        $app_content = str_replace("%freelancer_name%", $freelancer_name, $app_content);
        $app_content = str_replace("%project_link%", $project_link, $app_content);
        $app_content = str_replace("%project_title%", $project_title, $app_content);
        $app_content = str_replace("%proposal_amount%", $proposal_amount, $app_content);
        $app_content = str_replace("%proposal_duration%", $proposal_duration, $app_content);
        $app_content = str_replace("%message%", $proposal_message, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Email job posted
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareEmployerEmailJobPosted($email_params)
    {
        extract($email_params);
        $title = $job_title;
        $job_link = $posted_job_link;
        $employer_name = $name;
        $employer_link = $link;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello,
                                    A new job is posted you <a href='%employer_link%'>%employer_name%</a>.
                                    Click to view the job link. <a href='%job_link%' target='_blank' rel='noopener'>%job_title%</a>

                                    %signature%";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%employer_link%", $employer_link, $app_content);
        $app_content = str_replace("%employer_name%", $employer_name, $app_content);
        $app_content = str_replace("%job_link%", $job_link, $app_content);
        $app_content = str_replace("%job_title%", $title, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Proposal message
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareEmployerEmailProposalMessage($email_params)
    {
        extract($email_params);
        $employer_name = $employer;
        $employer_link = $employer_profile;
        $freelancer_name = $freelancer;
        $freelancer_link = $freelancer_profile;
        $project_title = $title;
        $project_link = $link;
        $proposal_message = $message;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello <a href='%employer_link%'>%employer_name%</a>,

                                    The <a href='%freelancer_link%'>%freelancer_name%</a> submit the proposal message on this job <a href='%project_link%'>%project_title%</a>.
                                    Login to view your proposal message.
                                    Message: %message%

                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%employer_name%", $employer_name, $app_content);
        $app_content = str_replace("%employer_link%", $employer_link, $app_content);
        $app_content = str_replace("%freelancer_link%", $freelancer_link, $app_content);
        $app_content = str_replace("%freelancer_name%", $freelancer_name, $app_content);
        $app_content = str_replace("%project_link%", $project_link, $app_content);
        $app_content = str_replace("%project_title%", $project_title, $app_content);
        $app_content = str_replace("%message%", $proposal_message, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Proposal message
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareEmployerEmailPackagePurchased($email_params)
    {
        extract($email_params);
        $employer_name = $employer;
        $employer_link = $employer_profile;
        $package_name = $name;
        $package_price = $price;
        $package_expiry = $expiry_date;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello <a href='%employer_link%'>%employer_name%</a>,

                                    You have subscribe to the following %package_name% at cost of %package_price% which will be expire on %package_expiry%.

                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%employer_name%", $employer_name, $app_content);
        $app_content = str_replace("%employer_link%", $employer_link, $app_content);
        $app_content = str_replace("%package_name%", $package_name, $app_content);
        $app_content = str_replace("%package_price%", $package_price, $app_content);
        $app_content = str_replace("%package_expiry%", $package_expiry, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }
}
