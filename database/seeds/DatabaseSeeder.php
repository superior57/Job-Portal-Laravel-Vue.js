<?php
/**
 * Class SkillController.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ModelRoleSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(EmailTypeSeeder::class);
        $this->call(ReviewOptionsSeeder::class);
        $this->call(EmailTemplateSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(BadgeSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(InvoiceItemSeeder::class);
        $this->call(LangableSeeder::class);
        $this->call(UserSkillSeeder::class);
        $this->call(SiteManagementSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(JobSkillSeeder::class);
        $this->call(JobCategorySeeder::class);
        $this->call(PageSeeder::class);
        // $this->call(MetaSeeder::class);
        $this->call(ChildPageSeeder::class);
        $this->call(ProposalSeeder::class);
        $this->call(MessagesSeeder::class);
        $this->call(PrivateMessagesSeeder::class);
        $this->call(PrivateMessagesToSeeder::class);
        $this->call(DeliveryTimeSeeder::class);
        $this->call(ResponseTimeSeeder::class);
        $this->call(ServiceUserSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ArticleCategoriesSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(ArticleCategorySeeder::class);
        $this->call(ReviewSeeder::class);
    }
}
