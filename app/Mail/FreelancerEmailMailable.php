<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EmailHelper;
use App\SiteManagement;

class FreelancerEmailMailable extends Mailable
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
        $subject = !empty($this->template->subject) ? $this->template->subject : '';
        if ($this->type == 'freelancer_email_new_proposal_submitted') {
            $email_message = $this->prepareFreelancerEmailPropsalSubmitted($this->email_params);
        } elseif ($this->type == 'freelancer_email_hire_freelancer') {
            $email_message = $this->prepareFreelancerEmailFreelancerHired($this->email_params);
        } elseif ($this->type == 'freelancer_email_send_offer') {
            $email_message = $this->prepareFreelancerEmailSendOffer($this->email_params);
        } elseif ($this->type == 'freelancer_email_cancel_job') {
            $email_message = $this->prepareFreelancerEmailJobCancelled($this->email_params);
        } elseif ($this->type == 'freelancer_email_proposal_message') {
            $email_message = $this->prepareFreelancerEmailProposalMessage($this->email_params);
        } elseif ($this->type == 'freelancer_email_package_subscribed') {
            $email_message = $this->prepareFreelancerEmailPackagePurchased($this->email_params);
        } elseif ($this->type == 'freelancer_email_job_completed') {
            $email_message = $this->prepareFreelancerEmailJobCompleted($this->email_params);
        } elseif ($this->type == 'freelancer_email_new_order') {
            $email_message = $this->prepareFreelancerEmailNewOrder($this->email_params);
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
     * Proposal submitted
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareFreelancerEmailPropsalSubmitted($email_params)
    {
        extract($email_params);
        $freelancer_name = $freelancer;
        $freelancer_link = $freelancer_profile;
        $project_title = $title;
        $project_link = $link;
        $proposal_amount = $amount;
        $proposal_duration = $duration;
        $proposal_message = $message;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello <a href='%freelancer_link%'>%freelancer_name%</a>,

                                    You have submitted the proposal against this job <a href='%project_link%'>%project_title%</a>.
                                    Message is given below.
                                    Project Proposal Amount : %proposal_amount%
                                    Project Duration : %proposal_duration%
                                    Message: %message%

                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
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
     * Email freelancer hired
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareFreelancerEmailFreelancerHired($email_params)
    {
        extract($email_params);
        $title = $project_title;
        $project_link = $hired_project_link;
        $freelancer_name = $name;
        $freelancer_link = $link;
        $employer_link = $employer_profile;
        $employer_name = $emp_name;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello <a href='%freelancer_link%'>%freelancer_name%</a>,

                                    The <a href='%employer_link%'>%employer_name%</a> hired you for the following job <a href='%project_link%'>%project_title%</a>.

                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%freelancer_link%", $freelancer_link, $app_content);
        $app_content = str_replace("%freelancer_name%", $freelancer_name, $app_content);
        $app_content = str_replace("%project_link%", $project_link, $app_content);
        $app_content = str_replace("%project_title%", $title, $app_content);
        $app_content = str_replace("%employer_link%", $employer_link, $app_content);
        $app_content = str_replace("%employer_name%", $employer_name, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Email send offer
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareFreelancerEmailSendOffer($email_params)
    {
        extract($email_params);
        $title = $project_title;
        $project_link = $project_link;
        $freelancer_name = $name;
        $freelancer_link = $link;
        $employer_link = $employer_profile;
        $employer_name = $emp_name;
        $message = $msg;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hi <a href='%freelancer_link%'>%freelancer_name%</a>,

                                    The <a href='%employer_link%'>%employer_name%</a> would like to invite you to consider working on the following project <a href='%project_link%'>%project_title%</a>
                                    Message: %message%
                                    
                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%freelancer_link%", $freelancer_link, $app_content);
        $app_content = str_replace("%freelancer_name%", $freelancer_name, $app_content);
        $app_content = str_replace("%project_link%", $project_link, $app_content);
        $app_content = str_replace("%project_title%", $title, $app_content);
        $app_content = str_replace("%employer_link%", $employer_link, $app_content);
        $app_content = str_replace("%employer_name%", $employer_name, $app_content);
        $app_content = str_replace("%message%", $message, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Email job cancelled
     * 
     * @param array $email_params Email Parameters
     * 
     * @access public
     *
     * @return string
     */
    public function prepareFreelancerEmailJobCancelled($email_params)
    {
        extract($email_params);
        $title = $project_title;
        $project_link = $cancelled_project_link;
        $freelancer_name = $name;
        $freelancer_link = $link;
        $employer_link = $employer_profile;
        $employer_name = $emp_name;
        $message = $msg;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello <a href='%freelancer_link%'>%freelancer_name%</a>,

                                    Unfortunately <a href=' %employer_link%'>%employer_name%</a> cancelled the <a href='%project_link%'>%project_title%</a> project due to following below reasons.
                                    Job Cancel Reasons Below.
                                    Message: %message%
                                    
                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%freelancer_link%", $freelancer_link, $app_content);
        $app_content = str_replace("%freelancer_name%", $freelancer_name, $app_content);
        $app_content = str_replace("%employer_link%", $employer_link, $app_content);
        $app_content = str_replace("%employer_name%", $employer_name, $app_content);
        $app_content = str_replace("%project_link%", $project_link, $app_content);
        $app_content = str_replace("%project_title%", $title, $app_content);
        $app_content = str_replace("%message%", $message, $app_content);
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
    public function prepareFreelancerEmailProposalMessage($email_params)
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
        $email_content_default =    "Hello <a href='%freelancer_link%'>%freelancer_name%</a>,

                                    The <a href='%employer_link%'>%employer_name%</a> submit the proposal message on this job <a href='%project_link%'>%project_title%</a>.
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
     * Package Purchased
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareFreelancerEmailPackagePurchased($email_params)
    {
        extract($email_params);
        $freelancer_name = $freelancer;
        $freelancer_link = $freelancer_profile;
        $package_name = $name;
        $package_price = $price;
        $package_expiry = $expiry_date;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello <a href='%freelancer_link%'>%freelancer_name%</a>,

                                    You have subscribe to the following %package_name% at cost of %package_price% which will be expire on %package_expiry%.
                                    
                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%freelancer_name%", $freelancer_name, $app_content);
        $app_content = str_replace("%freelancer_link%", $freelancer_link, $app_content);
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

    /**
     * Email job completed 
     * 
     * @param array $email_params Email Parameters
     * 
     * @access public
     *
     * @return string
     */
    public function prepareFreelancerEmailJobCompleted($email_params)
    {
        extract($email_params);
        $employer_name = $employer;
        $employer_link = $employer_profile;
        $title = $project_title;
        $project_link = $completed_project_link;
        $freelancer_name = $name;
        $freelancer_link = $link;
        $rating = $ratings;
        $message = $review;
        $signature = EmailHelper::getSignature();
        $app_content = !empty($this->template->content) ?  $this->template->content : $this->template;
        $email_content_default =    "Hello <a href='%freelancer_link%'>%freelancer_name%</a>,

                                    The <a href='%employer_link%'>%employer_name%</a> is confirmed that the following project (<a href='%project_link%'>%project_title%</a>) is completed.
                                    You have received the following ratings %rating% from employer.
                                    Message: %message%
                                    Ratings: %ratings%
                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%freelancer_link%", $freelancer_link, $app_content);
        $app_content = str_replace("%freelancer_name%", $freelancer_name, $app_content);
        $app_content = str_replace("%employer_link%", $employer_link, $app_content);
        $app_content = str_replace("%employer_name%", $employer_name, $app_content);
        $app_content = str_replace("%project_link%", $project_link, $app_content);
        $app_content = str_replace("%project_title%", $title, $app_content);
        $app_content = str_replace("%rating%", $rating, $app_content);
        $app_content = str_replace("%message%", $message, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Proposal submitted
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareFreelancerEmailNewOrder($email_params)
    {
        extract($email_params);
        $employer_name = $employer_name;
        $freelancer_name = $freelancer_name;
        $employer_link = $employer_profile;
        $service_title = $title;
        $service_link = $service_link;
        $service_amount = $amount;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template;
        $email_content_default =    "Hello %freelancer_name%,

                                    <a href='%employer_link%'>%employer_name%</a> has purchased your following service <a href='%service_link%'>%service_title%</a>.
                                    Service amount is %service_amount%
                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%employer_name%", $employer_name, $app_content);
        $app_content = str_replace("%employer_link%", $employer_link, $app_content);
        $app_content = str_replace("%freelancer_name%", $freelancer_name, $app_content);
        $app_content = str_replace("%service_link%", $service_link, $app_content);
        $app_content = str_replace("%service_title%", $service_title, $app_content);
        $app_content = str_replace("%service_amount%", $service_amount, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }
}
