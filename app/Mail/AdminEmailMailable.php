<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EmailHelper;
use App\SiteManagement;

class AdminEmailMailable extends Mailable
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
        if ($this->type == 'admin_email_registration') {
            $email_message = $this->prepareAdminEmailRegisteredUser($this->email_params);
        } elseif ($this->type == 'admin_email_delete_account') {
            $email_message = $this->prepareAdminEmailDeleteUser($this->email_params);
        } elseif ($this->type == 'admin_email_cancel_job') {
            $email_message = $this->prepareAdminEmailJobCancelled($this->email_params);
        } elseif ($this->type == 'admin_email_report_employer') {
            $email_message = $this->prepareAdminEmailReportEmployer($this->email_params);
        } elseif ($this->type == 'admin_email_report_project') {
            $email_message = $this->prepareAdminEmailReportProject($this->email_params);
        } elseif ($this->type == 'admin_email_report_freelancer') {
            $email_message = $this->prepareAdminEmailReportFreelancer($this->email_params);
        } elseif ($this->type == 'admin_email_new_job_posted') {
            $email_message = $this->prepareAdminEmailJobPosted($this->email_params);
        } elseif ($this->type == 'admin_email_new_service_posted') {
            $email_message = $this->prepareAdminEmailServicePosted($this->email_params);
        } elseif ($this->type == 'admin_email_job_completed') {
            $email_message = $this->prepareAdminEmailJobCompleted($this->email_params);
        } elseif ($this->type == 'admin_email_dispute_raised') {
            $email_message = $this->prepareAdminEmailDisputeRaised($this->email_params);
        } elseif ($this->type == 'admin_new_order_received') {
            $email_message = $this->prepareAdminNewOrder($this->email_params);
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
     * Email new user
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareAdminEmailRegisteredUser($email_params)
    {
        extract($email_params);
        $user_name = $name;
        $user_email = $email;
        $profile_link = $link;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hey!

                                    A new user %username% with email address %email% has registered on your website. Please login to check user detail.

                                    You can check user detail at: %link%

                                    %signature%";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%username%", $user_name, $app_content);
        $app_content = str_replace("%email%", $user_email, $app_content);
        $app_content = str_replace("%link%", $profile_link, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Email user deleted
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareAdminEmailDeleteUser($email_params)
    {
        extract($email_params);
        $delete_reason = $reason;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hi,
                                    An existing user has deleted account due to following

                                    reason: %reason%
                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%reason%", $delete_reason, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Email report employer
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareAdminEmailReportEmployer($email_params)
    {
        extract($email_params);
        $employer = $reported_employer;
        $report_by = $reported_by;
        $report_message = $message;
        $employer_link = $link;
        $reported_by_link = $report_by_link;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello,
                                    An employer <a href='%link%'> %reported_employer% </a> has been reported by <a href='%report_by_link%'>%reported_by% </a>
                                    Message is given below.
                                    %message%

                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%reported_employer%", $employer, $app_content);
        $app_content = str_replace("%link%", $employer_link, $app_content);
        $app_content = str_replace("%report_by_link%", $reported_by_link, $app_content);
        $app_content = str_replace("%reported_by%", $report_by, $app_content);
        $app_content = str_replace("%message%", $report_message, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Email report project
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareAdminEmailReportProject($email_params)
    {
        extract($email_params);
        $project = $reported_project;
        $report_by = $reported_by;
        $report_message = $message;
        $reported_by_link = $report_by_link;
        $project_link = $link;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello,
                                    A project <a href='%link%'>%reported_project%</a> has been reported by <a href='%report_by_link%'>%reported_by% </a>
                                    Message is given below.
                                    %message%

                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%reported_project%", $project, $app_content);
        $app_content = str_replace("%link%", $project_link, $app_content);
        $app_content = str_replace("%report_by_link%", $reported_by_link, $app_content);
        $app_content = str_replace("%reported_by%", $report_by, $app_content);
        $app_content = str_replace("%message%", $report_message, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Email report freelancer
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareAdminEmailReportFreelancer($email_params)
    {
        extract($email_params);
        $freelancer = $reported_freelancer;
        $report_by = $reported_by;
        $report_message = $message;
        $reported_by_link = $report_by_link;
        $freelancer_link = $link;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello,
                                    A freelancer <a href='%link%'>%reported_freelancer%</a> has been reported by <a href='%report_by_link%'>%reported_by% </a>
                                    Message is given below.
                                    %message%

                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%reported_freelancer%", $freelancer, $app_content);
        $app_content = str_replace("%link%", $freelancer_link, $app_content);
        $app_content = str_replace("%report_by_link%", $reported_by_link, $app_content);
        $app_content = str_replace("%reported_by%", $report_by, $app_content);
        $app_content = str_replace("%message%", $report_message, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Email jobs posted
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareAdminEmailJobPosted($email_params)
    {
        extract($email_params);
        $title = $job_title;
        $job_link = $posted_job_link;
        $employer_name = $name;
        $employer_link = $link;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello,
                                    A new job is posted by <a href='%employer_link%'>%employer_name%</a>.
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
     * Email service posted
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareAdminEmailServicePosted($email_params)
    {
        extract($email_params);
        $title = $service_title;
        $service_link = $posted_service_link;
        $freelancer_name = $name;
        $freelancer_link = $link;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template;
        $email_content_default =    "Hello,
                                    A new service is posted by <a href='%freelancer_link%'>%freelancer_name%</a>.
                                    Click to view the service link. <a href='%service_link%' target='_blank' rel='noopener'>%service_title%</a>

                                    %signature%";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%freelancer_link%", $freelancer_link, $app_content);
        $app_content = str_replace("%freelancer_name%", $freelancer_name, $app_content);
        $app_content = str_replace("%service_link%", $service_link, $app_content);
        $app_content = str_replace("%service_title%", $title, $app_content);
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
    public function prepareAdminEmailJobCompleted($email_params)
    {
        extract($email_params);
        $title = $project_title;
        $project_link = $completed_project_link;
        $freelancer_name = $name;
        $freelancer_link = $link;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =    "Hello,

                                    The <a href='%freelancer_link%'>%freelancer_name%</a> has completed the following project (<a href='%project_link%'>%project_title%</a>).

                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%freelancer_link%", $freelancer_link, $app_content);
        $app_content = str_replace("%freelancer_name%", $freelancer_name, $app_content);
        $app_content = str_replace("%project_link%", $project_link, $app_content);
        $app_content = str_replace("%project_title%", $title, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }

    /**
     * Email dispute raised
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareAdminEmailDisputeRaised($email_params)
    {
        extract($email_params);
        $title = $project_title;
        $link = $project_link;
        $freelancer_name = $name;
        $freelancer_link = $sender_link;
        $message = $msg;
        $dispute_reason = $reason;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template->content;
        $email_content_default =   "Hello,
                                    A dispute has been raised by a freelancer <a href='%freelancer_link%'> %freelancer_name% </a> against <a href='%project_link%'>%project_title%</a>
                                    Reason: '%reason%'
                                    Message is given below.
                                    %message%

                                    %signature%,";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%freelancer_name%", $freelancer_name, $app_content);
        $app_content = str_replace("%freelancer_link%", $freelancer_link, $app_content);
        $app_content = str_replace("%project_link%", $link, $app_content);
        $app_content = str_replace("%project_title%", $title, $app_content);
        $app_content = str_replace("%reason%", $dispute_reason, $app_content);
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
    public function prepareAdminEmailJobCancelled($email_params)
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
        if (!empty($this->template->content)) {
            $app_content = $this->template->content;
        } else {
            $app_content = '';
        }

        $email_content_default =    "Hello,
                                    An Employer <a href=' %employer_link%'>%employer_name%</a> has been cancelled his ongoing project <a href='%project_link%'>%project_title%</a> assign to <a href='%freelancer_link%'> %freelancer_name% </a>
                                    Job Cancel Reasons Below.
                                    %message%

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
     * Email job cancelled
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareAdminNewOrder($email_params)
    {
        extract($email_params);
        $user_name = $name;
        $order = $order_id;
        $signature = EmailHelper::getSignature();
        $app_content = $this->template['content'];

        $email_content_default =    "hi Admin,
                                    User %name% has made the payment against the order #%order_id%. Please confirm and update the order status. 
                                    
                                    %signature%";
        //set default contents
        if (empty($app_content)) {
            $app_content = $email_content_default;
        }
        $app_content = str_replace("%name%", $user_name, $app_content);
        $app_content = str_replace("%order_id%", $order, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = "";
        $body .= EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }
}
