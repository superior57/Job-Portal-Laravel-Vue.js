<?php
/**
 * Class EmailTypeSeeder.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class EmailTypeSeeder
 */
class EmailTypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_types')->insert(
            [
                // General Email Types
                [
                    'role_id' => null,
                    'email_type' => 'new_user',
                    'variables' => 'a:6:{i:0;a:2:{s:3:"key";s:4:"name";s:5:"value";s:6:"%name%";}i:1;a:2:{s:3:"key";s:5:"email";s:5:"value";s:7:"%email%";}i:2;a:2:{s:3:"key";s:8:"username";s:5:"value";s:10:"%username%";}i:3;a:2:{s:3:"key";s:8:"password";s:5:"value";s:10:"%password%";}i:4;a:2:{s:3:"key";s:17:"verification_code";s:5:"value";s:19:"%verification_code%";}i:5;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => null,
                    'email_type' => 'verification_code',
                    'variables' => 'a:4:{i:0;a:2:{s:3:"key";s:4:"name";s:5:"value";s:6:"%name%";}i:1;a:2:{s:3:"key";s:5:"email";s:5:"value";s:7:"%email%";}i:2;a:2:{s:3:"key";s:17:"verification_code";s:5:"value";s:19:"%verification_code%";}i:3;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => null,
                    'email_type' => 'lost_password',
                    'variables' => 'a:3:{i:0;a:2:{s:3:"key";s:4:"name";s:5:"value";s:6:"%name%";}i:1;a:2:{s:3:"key";s:4:"link";s:5:"value";s:6:"%link%";}i:2;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => null,
                    'email_type' => 'account_verification',
                    'variables' => 'a:3:{i:0;a:2:{s:3:"key";s:4:"name";s:5:"value";s:6:"%name%";}i:1;a:2:{s:3:"key";s:4:"link";s:5:"value";s:6:"%link%";}i:2;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => null,
                    'email_type' => 'invitation',
                    'variables' => 'a:4:{i:0;a:2:{s:3:"key";s:8:"username";s:5:"value";s:10:"%username%";}i:1;a:2:{s:3:"key";s:4:"link";s:5:"value";s:6:"%link%";}i:2;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:3;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => null,
                    'email_type' => 'contact_form_received',
                    'variables' => 'a:6:{i:0;a:2:{s:3:"key";s:7:"subject";s:5:"value";s:9:"%subject%";}i:1;a:2:{s:3:"key";s:4:"name";s:5:"value";s:6:"%name%";}i:2;a:2:{s:3:"key";s:5:"email";s:5:"value";s:7:"%email%";}i:3;a:2:{s:3:"key";s:5:"phone";s:5:"value";s:7:"%phone%";}i:4;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:5;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                // Admin Email Types
                [
                    'role_id' => 1,
                    'email_type' => 'admin_email_registration',
                    'variables' => 'a:4:{i:0;a:2:{s:3:"key";s:8:"username";s:5:"value";s:10:"%username%";}i:1;a:2:{s:3:"key";s:4:"link";s:5:"value";s:6:"%link%";}i:2;a:2:{s:3:"key";s:5:"email";s:5:"value";s:7:"%email%";}i:3;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 1,
                    'email_type' => 'admin_email_delete_account',
                    'variables' => 'a:5:{i:0;a:2:{s:3:"key";s:6:"reason";s:5:"value";s:8:"%reason%";}i:1;a:2:{s:3:"key";s:8:"username";s:5:"value";s:10:"%username%";}i:2;a:2:{s:3:"key";s:5:"email";s:5:"value";s:7:"%email%";}i:3;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:4;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 1,
                    'email_type' => 'admin_email_report_employer',
                    'variables' => 'a:6:{i:0;a:2:{s:3:"key";s:17:"reported_employer";s:5:"value";s:19:"%reported_employer%";}i:1;a:2:{s:3:"key";s:17:"reported_employer";s:5:"value";s:19:"%reported_employer%";}i:2;a:2:{s:3:"key";s:13:"employer_link";s:5:"value";s:15:"%employer_link%";}i:3;a:2:{s:3:"key";s:9:"user_link";s:5:"value";s:11:"%user_link%";}i:4;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:5;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 1,
                    'email_type' => 'admin_email_report_project',
                    'variables' => 'a:6:{i:0;a:2:{s:3:"key";s:16:"reported_project";s:5:"value";s:18:"%reported_project%";}i:1;a:2:{s:3:"key";s:11:"reported_by";s:5:"value";s:13:"%reported_by%";}i:2;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:3;a:2:{s:3:"key";s:9:"user_link";s:5:"value";s:11:"%user_link%";}i:4;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:5;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 1,
                    'email_type' => 'admin_email_report_freelancer',
                    'variables' => 'a:6:{i:0;a:2:{s:3:"key";s:19:"reported_freelancer";s:5:"value";s:21:"%reported_freelancer%";}i:1;a:2:{s:3:"key";s:11:"reported_by";s:5:"value";s:13:"%reported_by%";}i:2;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:3;a:2:{s:3:"key";s:9:"user_link";s:5:"value";s:11:"%user_link%";}i:4;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:5;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 1,
                    'email_type' => 'admin_email_new_job_posted',
                    'variables' => 'a:5:{i:0;a:2:{s:3:"key";s:13:"employer_name";s:5:"value";s:15:"%employer_name%";}i:1;a:2:{s:3:"key";s:13:"employer_link";s:5:"value";s:15:"%employer_link%";}i:2;a:2:{s:3:"key";s:9:"job_title";s:5:"value";s:11:"%job_title%";}i:3;a:2:{s:3:"key";s:8:"job_link";s:5:"value";s:10:"%job_link%";}i:4;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 1,
                    'email_type' => 'admin_email_job_completed',
                    'variables' => 'a:5:{i:0;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:1;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:2;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:3;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}i:4;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                // Employer Email Types
                [
                    'role_id' => 2,
                    'email_type' => 'employer_email_proposal_received',
                    'variables' => 'a:9:{i:0;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:1;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:2;a:2:{s:3:"key";s:13:"employer_name";s:5:"value";s:15:"%employer_name%";}i:3;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:4;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}i:5;a:2:{s:3:"key";s:15:"proposal_amount";s:5:"value";s:17:"%proposal_amount%";}i:6;a:2:{s:3:"key";s:17:"proposal_duration";s:5:"value";s:19:"%proposal_duration%";}i:7;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:8;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 2,
                    'email_type' => 'employer_email_new_job_posted',
                    'variables' => 'a:5:{i:0;a:2:{s:3:"key";s:13:"employer_name";s:5:"value";s:15:"%employer_name%";}i:1;a:2:{s:3:"key";s:13:"employer_link";s:5:"value";s:15:"%employer_link%";}i:2;a:2:{s:3:"key";s:9:"job_title";s:5:"value";s:11:"%job_title%";}i:3;a:2:{s:3:"key";s:8:"job_link";s:5:"value";s:10:"%job_link%";}i:4;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 2,
                    'email_type' => 'employer_email_proposal_message',
                    'variables' => 'a:8:{i:0;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:1;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:2;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:3;a:2:{s:3:"key";s:13:"employer_name";s:5:"value";s:15:"%employer_name%";}i:4;a:2:{s:3:"key";s:13:"employer_link";s:5:"value";s:15:"%employer_link%";}i:5;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}i:6;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:7;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 2,
                    'email_type' => 'employer_email_package_subscribed',
                    'variables' => 'a:6:{i:0;a:2:{s:3:"key";s:12:"package_name";s:5:"value";s:14:"%package_name%";}i:1;a:2:{s:3:"key";s:13:"package_price";s:5:"value";s:15:"%package_price%";}i:2;a:2:{s:3:"key";s:14:"package_expiry";s:5:"value";s:16:"%package_expiry%";}i:3;a:2:{s:3:"key";s:13:"employer_name";s:5:"value";s:15:"%employer_name%";}i:4;a:2:{s:3:"key";s:13:"employer_link";s:5:"value";s:15:"%employer_link%";}i:5;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                // Freelancer Email Types
                [
                    'role_id' => 3,
                    'email_type' => 'freelancer_email_new_proposal_submitted',
                    'variables' => 'a:8:{i:0;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:1;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:2;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:3;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}i:4;a:2:{s:3:"key";s:15:"proposal_amount";s:5:"value";s:17:"%proposal_amount%";}i:5;a:2:{s:3:"key";s:17:"proposal_duration";s:5:"value";s:19:"%proposal_duration%";}i:6;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:7;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 3,
                    'email_type' => 'freelancer_email_hire_freelancer',
                    'variables' => 'a:7:{i:0;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:1;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:2;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:3;a:2:{s:3:"key";s:13:"employer_name";s:5:"value";s:15:"%employer_name%";}i:4;a:2:{s:3:"key";s:13:"employer_link";s:5:"value";s:15:"%employer_link%";}i:5;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}i:6;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 3,
                    'email_type' => 'freelancer_email_send_offer',
                    'variables' => 'a:8:{i:0;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:1;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:2;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:3;a:2:{s:3:"key";s:13:"employer_name";s:5:"value";s:15:"%employer_name%";}i:4;a:2:{s:3:"key";s:13:"employer_link";s:5:"value";s:15:"%employer_link%";}i:5;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}i:6;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:7;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 3,
                    'email_type' => 'freelancer_email_cancel_job',
                    'variables' => 'a:8:{i:0;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:1;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:2;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:3;a:2:{s:3:"key";s:13:"employer_name";s:5:"value";s:15:"%employer_name%";}i:4;a:2:{s:3:"key";s:13:"employer_link";s:5:"value";s:15:"%employer_link%";}i:5;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}i:6;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:7;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 3,
                    'email_type' => 'freelancer_email_proposal_message',
                    'variables' => 'a:8:{i:0;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:1;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:2;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:3;a:2:{s:3:"key";s:13:"employer_name";s:5:"value";s:15:"%employer_name%";}i:4;a:2:{s:3:"key";s:13:"employer_link";s:5:"value";s:15:"%employer_link%";}i:5;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}i:6;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:7;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 3,
                    'email_type' => 'freelancer_email_package_subscribed',
                    'variables' => 'a:6:{i:0;a:2:{s:3:"key";s:12:"package_name";s:5:"value";s:14:"%package_name%";}i:1;a:2:{s:3:"key";s:13:"package_price";s:5:"value";s:15:"%package_price%";}i:2;a:2:{s:3:"key";s:14:"package_expiry";s:5:"value";s:16:"%package_expiry%";}i:3;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:4;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:5;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 3,
                    'email_type' => 'freelancer_email_job_completed',
                    'variables' => 'a:9:{i:0;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:1;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:2;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:3;a:2:{s:3:"key";s:13:"employer_name";s:5:"value";s:15:"%employer_name%";}i:4;a:2:{s:3:"key";s:13:"employer_link";s:5:"value";s:15:"%employer_link%";}i:5;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}i:6;a:2:{s:3:"key";s:7:"ratings";s:5:"value";s:9:"%ratings%";}i:7;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:8;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => 1,
                    'email_type' => 'admin_email_dispute_raised',
                    'variables' => 'a:7:{i:0;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:1;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:2;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:3;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}i:4;a:2:{s:3:"key";s:6:"reason";s:5:"value";s:8:"%reason%";}i:5;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:6;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => null,
                    'email_type' => 'reset_password_email',
                    'variables' => 'a:3:{i:0;a:2:{s:3:"key";s:4:"name";s:5:"value";s:6:"%name%";}i:1;a:2:{s:3:"key";s:5:"email";s:5:"value";s:7:"%email%";}i:2;a:2:{s:3:"key";s:8:"password";s:5:"value";s:10:"%password%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'role_id' => null,
                    'email_type' => 'admin_email_cancel_job',
                    'variables' => 'a:8:{i:0;a:2:{s:3:"key";s:13:"employer_link";s:5:"value";s:15:"%employer_link%";}i:1;a:2:{s:3:"key";s:13:"employer_name";s:5:"value";s:15:"%employer_name%";}i:2;a:2:{s:3:"key";s:12:"project_link";s:5:"value";s:14:"%project_link%";}i:3;a:2:{s:3:"key";s:13:"project_title";s:5:"value";s:15:"%project_title%";}i:4;a:2:{s:3:"key";s:15:"freelancer_link";s:5:"value";s:17:"%freelancer_link%";}i:5;a:2:{s:3:"key";s:15:"freelancer_name";s:5:"value";s:17:"%freelancer_name%";}i:6;a:2:{s:3:"key";s:7:"message";s:5:"value";s:9:"%message%";}i:7;a:2:{s:3:"key";s:9:"signature";s:5:"value";s:11:"%signature%";}}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
