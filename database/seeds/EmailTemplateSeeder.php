<?php
/**
 * Class EmailTemplateSeeder.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

/**
 * Class EmailTemplateSeeder
 */
class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_templates')->insert(
            [
                // General Email Templates
                [
                    'admin_email' => null,
                    'email_type_id' => '1',
                    'title' => 'Registration',
                    'subject' => 'New User Registered',
                    'content' => '<p>Hi <strong>%name%!</strong> Thanks for registering at Worketic. You can now login to manage your account using the following credentials:<br /> <strong>Username:</strong> %name%<br /> <strong>Password:</strong> %password%<br /> <strong>Email:</strong> %email%<br /> %signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '2',
                    'title' => 'Verification Code',
                    'subject' => 'Verification Code Received',
                    'content' => '<p>Hi <strong>%name%!</strong> Thanks for registering at Worketic.<br /> Here is your verification code to complete registration process<br /> <strong>Name :</strong> %name%<br /> <strong>Email :</strong> %email%<br /> <strong>Verification Code:</strong> %verification_code%<br /> %signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '3',
                    'title' => 'Lost Password',
                    'subject' => 'Forgot Password',
                    'content' => '<p>Hi <strong>%name%!</strong> <strong>Lost Password reset</strong></p>
                    <p>Someone requested to reset the password of following account:<br /> <strong>Email Address:</strong> %account_email%<br /> If this was a mistake, just ignore this email and nothing will happen.<br /> To reset your password, click reset link below:<br /> <a href="%link%"><strong>Reset</strong></a></p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '4',
                    'title' => 'Account Verification',
                    'subject' => 'Account Verification',
                    'content' => '<p>Hi <strong>%name%</strong>! <strong>Verify Your Account</strong></p>
                    <p>You account has created with below given email address:</p>
                    <p><strong>Email Address:</strong> %account_email%</p>
                    <p>If this was a mistake, just ignore this email and nothing will happen.</p>
                    <p>To verifiy your account, click below link:</p>
                    <p><strong><a href="%link%">Verify</a> </strong></p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '5',
                    'title' => 'Invitation',
                    'subject' => 'Invitation',
                    'content' => '<p>Hi,</p>
                    <p><strong>%username%</strong> has invited you to signup at <strong>%link%</strong>.</p>
                    <p>You have invitation message given below</p>
                    <p><strong>%message% </strong></p>
                    <p><strong>%signature%</strong></p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '6',
                    'title' => 'Contact Form Received',
                    'subject' => 'Contact Form Received',
                    'content' => '<p>Hi,</p>
                    <p>A person has contacted you,</p>
                    <p>Description of message is given below.</p>
                    <p><strong>Subject :</strong> %subject%</p>
                    <p><strong>Name :</strong> %name%</p>
                    <p><strong>Email :</strong> %email%</p>
                    <p><strong>Phone Number :</strong> %phone%</p>
                    <p><strong>Message :</strong> %message%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                // Admin Email Templates
                [
                    'admin_email' => 'info@yourdomain.com',
                    'email_type_id' => '7',
                    'title' => 'Admin Email Content - Registration',
                    'subject' => 'New Registration!',
                    'content' => '<p>Hey!</p>
                    <p>A new user <strong>"%username%"</strong> with email address <strong>"%email%"</strong> has registered on your website.<br /> Please login to check user detail.<br /> You can check user detail at: <strong>%link% </strong></p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => 'info@yourdomain.com',
                    'email_type_id' => '8',
                    'title' => 'Admin Email Content - Account Delete',
                    'subject' => 'Account Delete',
                    'content' => '<p>Hi, An existing user has deleted account due to following</p>
                    <p><strong>Reason:</strong> %reason%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => 'info@yourdomain.com',
                    'email_type_id' => '9',
                    'title' => 'Admin Email Content - Report Employer',
                    'subject' => 'Employer Reported',
                    'content' => '<p>Hello,</p>
                    <p>An employer <strong><a href="%link%"> %reported_employer% </a></strong> has been reported by <strong><a href="%report_by_link%">%reported_by% </a></strong></p>
                    <p>Message is given below.</p>
                    <p>%message%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => 'info@yourdomain.com',
                    'email_type_id' => '10',
                    'title' => 'Admin Email Content - Report Project',
                    'subject' => 'Project Reported',
                    'content' => '<p>Hello,</p>
                    <p>A project <strong><a href="%link">%reported_project%</a></strong> has been reported by <strong><a href="%report_by_link%">%reported_by% </a></strong></p>
                    <p>Message is given below.</p>
                    <p>%message%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => 'info@yourdomain.com',
                    'email_type_id' => '11',
                    'title' => 'Admin Email Content - Report Freelancer',
                    'subject' => 'A freelancer has been reported!',
                    'content' => '<p>Hello,</p>
                    <p>A freelancer <a href="%link%"><strong>%reported_freelancer%</strong></a> has been reported by<strong> <a href="%report_by_link%">%reported_by% </a></strong>&nbsp;</p>
                    <p>Message is given below.</p>
                    <p>%message%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => 'info@yourdomain.com',
                    'email_type_id' => '12',
                    'title' => 'Admin Email Content - Job Posted',
                    'subject' => 'New Job Posted',
                    'content' => '<p>Hello,</p>
                    <p>A new job is posted by <strong><a href="%employer_link%">%employer_name%</a></strong>.</p>
                    <p>Click to view the job link.</p>
                    <p><a href="%job_link%" target="_blank" rel="noopener"><strong>%job_title%</strong></a></p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => 'info@yourdomain.com',
                    'email_type_id' => '13',
                    'title' => 'Admin Email Content - Job Completed',
                    'subject' => 'Job Completed',
                    'content' => '<p>Hello,</p>
                    <p>The <a href="%freelancer_link%"><strong>%freelancer_name%</strong></a> has completed the following project (<strong><a href="%project_link%">%project_title%</a></strong>).</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                // Employer Email Templates
                [
                    'admin_email' => null,
                    'email_type_id' => '14',
                    'title' => 'Employer Email Content - Proposal Received',
                    'subject' => 'Proposal Received',
                    'content' => '<p>Hello <strong>%employer_name%</strong>,</p>
                    <p><strong> <a href="%freelancer_link%">%freelancer_name%</a></strong> has sent a new proposal on the following project <a href="%project_link%"><strong>%project_title%</strong></a>. Project Information is given below.</p>
                    <p><strong>Proposal Amount :</strong> %proposal_amount%</p>
                    <p><strong>Project Duration :</strong> %proposal_duration%</p>
                    <p><strong>Message:</strong></p>
                    <p>%message%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '15',
                    'title' => 'Employer Email Content - New Job Posted',
                    'subject' => 'New Job Posted',
                    'content' => '<p>Hello,</p>
                    <p>A new job is posted by you <strong><a href="%employer_link%">%employer_name%</a></strong>.</p>
                    <p>Click to view the job link. <strong><a href="%job_link%" target="_blank" rel="noopener">%job_title%</a></strong>&nbsp;</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '16',
                    'title' => 'Employer Email Content - Proposal Message',
                    'subject' => 'Proposal Message',
                    'content' => '<p>Hello <strong><a href="%employer_link%">%employer_name%</a></strong>,</p>
                    <p>The <a href="%freelancer_link%"><strong>%freelancer_name%</strong></a> have submitted the proposal message on this job <strong><a href="%project_link%">%project_title%</a></strong>.</p>
                    <p>Login to view your proposal message.</p>
                    <p><strong>Message: </strong></p>
                    <p>%message%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '17',
                    'title' => 'Employer Email Content - Package Purchased',
                    'subject' => 'Package Purchased',
                    'content' => '<p>Hello <a href="%employer_link%"><strong>%employer_name%</strong></a>,</p>
                    <p>You have subscribed to the following</p>
                    <p><strong>%package_name%</strong> package at cost of <strong>%package_price%</strong> which will be expired on <strong>%package_expiry%</strong>.</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                //Freelancer Email Templates
                [
                    'admin_email' => null,
                    'email_type_id' => '18',
                    'title' => 'Freelancer Email Content - New Proposal Submitted',
                    'subject' => 'New Proposal Submitted',
                    'content' => '<p>Hello <strong><a href="%freelancer_link%">%freelancer_name%</a></strong>,</p>
                    <p>You have submitted the proposal against this job <strong><a href="%project_link%">%project_title%</a></strong>. With the following details.</p>
                    <p><strong>Project Proposal Amount :</strong> %proposal_amount%</p>
                    <p><strong>Project Duration :</strong> %proposal_duration%</p>
                    <p><strong>Message:</strong> %message%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '19',
                    'title' => 'Freelancer Email Content - Hire Freelancer',
                    'subject' => 'Congratulation You are hired!',
                    'content' => '<p>Hello <strong><a href="%freelancer_link%">%freelancer_name%</a></strong>,</p>
                    <p>The <strong><a href="%employer_link%">%employer_name%</a></strong> hired you for the following job <strong><a href="%project_link%">%project_title%</a></strong>.</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '20',
                    'title' => 'Freelancer Email Content - Send Offer',
                    'subject' => 'Offer Received',
                    'content' => '<p>Hi <strong><a href="%freelancer_link%">%freelancer_name%</a></strong>,</p>
                    <p>The <a href="%employer_link%"><strong>%employer_name%</strong></a> would like to invite you to consider working on the following project&nbsp;&nbsp;</p>
                    <p><strong>Project Name :</strong> <strong><a href="%project_link%">%project_title%</a> </strong></p>
                    <p><strong>Message:</strong></p>
                    <p>%message%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '21',
                    'title' => 'Freelancer Email Content - Cancel Job',
                    'subject' => 'Job Cancelled',
                    'content' => '<p>Hello <strong><a href="%freelancer_link%">%freelancer_name%</a></strong>,</p>
                    <p>Unfortunately <strong><a href="%employer_link%">%employer_name%</a></strong> cancelled the <strong><a href="%project_link%">%project_title%</a></strong> due to following reasons.</p>
                    <p>Job Cancel Reasons Below.</p>
                    <p><strong>Message:</strong></p>
                    <p>%message%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '22',
                    'title' => 'Freelancer Email Content - Proposal Message',
                    'subject' => 'Proposal Message',
                    'content' => '<p>Hello <strong><a href="%employer_link%">%employer_name%</a></strong>,</p>
                    <p>The <strong><a href="%freelancer_link%">%freelancer_name%</a></strong>&nbsp;has submitted the proposal message on this job <strong><a href="%project_link%">%project_title%</a></strong>.</p>
                    <p>Login to view your proposal message.</p>
                    <p><strong>Message:</strong></p>
                    <p>%message%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '23',
                    'title' => 'Freelancer Email Content - Package Subscribed',
                    'subject' => 'Package Purchased',
                    'content' => '<p>Hello <strong><a href="%freelancer_link%">%freelancer_name%</a></strong>,</p>
                    <p>You have subscribed to the following <strong>%package_name%</strong> package at cost of <strong>%package_price%</strong> which will be expired on <strong>%package_expiry%</strong>.</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '24',
                    'title' => 'Freelancer Email Content - Job Completed',
                    'subject' => 'Job Completed',
                    'content' => '<p>Hello <strong><a href="%freelancer_link%">%freelancer_name%</a></strong>,</p>
                    <p>The <strong><a href="%employer_link%">%employer_name%</a></strong>&nbsp;has confirmed that the following project (<a href="%project_link%">"<strong>%project_title%</strong>"</a>) is completed.</p>
                    <p>You have received the following ratings from employer.</p>
                    <p><strong>Message: </strong></p>
                    <p>%message%</p>
                    <p><strong>Ratings:</strong> %ratings%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => 'info@yourdomain.com',
                    'email_type_id' => '25',
                    'title' => 'Admin Email Content - Dispute Raised',
                    'subject' => 'A dispute has been rasied',
                    'content' => '<p>Hello,</p>
                    <p>A dispute has been raised by freelancer <strong><a href="%freelancer_link%"> %freelancer_name% </a></strong> against <a href="%project_link%">"<strong>%project_title%</strong>"</a>&nbsp;.</p>
                    <p><strong>Reason:</strong> "%reason%"</p>
                    <p>Message is given below.</p>
                    <p>%message%</p>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => null,
                    'email_type_id' => '26',
                    'title' => 'Password Reset',
                    'subject' => 'Password Reset',
                    'content' => '<p>Hello <strong>%name%</strong>,</p>
                    <p>You password has been reset successfully.</p>
                    <p>You can login to your account with new credentials</p>
                    <p><strong>Email: </strong>%email%</p>
                    <p><strong>Password: </strong>%password%</p><br>
                    <p>%signature%</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'admin_email' => 'info@yourdomain.com',
                    'email_type_id' => '27',
                    'title' => 'Admin Email Content - Job Cancelled',
                    'subject' => 'Job Cancelled',
                    'content' => '  <p>Hello,</p>
                                    <p>An Employer <a href="%employer_link%">%employer_name%</a> has cancelled his ongoing project <a href="%project_link%">%project_title%</a> assigned to <a href="%freelancer_link%"> %freelancer_name% </a></p>
                                    <p>Job Cancel Reason is given below.</p>
                                    <p>%message%</p>
                                    <p>%signature%,</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
