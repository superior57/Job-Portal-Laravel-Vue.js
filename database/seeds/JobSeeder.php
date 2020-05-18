<?php
/**
 * Class JobSeeder.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * Class JobSeeder
 */
class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert(
            [
                [
                    'user_id' => 2,
                    'title' => 'Internet Developer',
                    'slug' => 'internet-developer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '786',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 1,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 3,
                    'title' => 'Intranet Developer',
                    'slug' => 'intranet-developer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '96',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 2,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 4,
                    'title' => 'Web Content Developer',
                    'slug' => 'web-content-developers',
                    'status' => 'hired',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '8500',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 3,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 5,
                    'title' => 'Wildlife Conservation Professor',
                    'slug' => 'wildlife-conservation-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '780',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 4,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 6,
                    'title' => 'Forest Biometrics Professor',
                    'slug' => 'forest-biometrics-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '74',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 5,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 7,
                    'title' => 'Forest Ecology Professor',
                    'slug' => 'forest-ecology-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '1000',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 6,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 8,
                    'title' => 'Forest Management Professor',
                    'slug' => 'forest-management-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '150',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 7,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 9,
                    'title' => 'Forest Pathology Professor',
                    'slug' => 'forest-pathology-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '2000',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 8,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 10,
                    'title' => 'Forest Resources Professor',
                    'slug' => 'forest-resources-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '2050',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 8,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 11,
                    'title' => 'Forest Technology Professor',
                    'slug' => 'forest-technology-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '1120',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 1,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 12,
                    'title' => 'Silviculture Professor',
                    'slug' => 'silviculture-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '7850',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 2,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 2,
                    'title' => 'Timber Management Professor',
                    'slug' => 'timber-management-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '700',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 3,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 2,
                    'title' => 'Computer Programming Professor',
                    'slug' => 'computer-programming-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '500',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 4,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 3,
                    'title' => 'Information Systems Professor',
                    'slug' => 'information-systems-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '99',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 5,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 4,
                    'title' => 'Information Technology Professor',
                    'slug' => 'information-technology-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '193',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 6,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 5,
                    'title' => 'IT Professor',
                    'slug' => 'it-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '450',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 7,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 5,
                    'title' => 'Java Programming Professor',
                    'slug' => 'java-programming-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '743',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 8,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 6,
                    'title' => 'Ecology Professor',
                    'slug' => 'ecology-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '950',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 8,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 7,
                    'title' => 'Environmental Conservation Professor',
                    'slug' => 'environmental-conservation-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '750',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 1,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 8,
                    'title' => 'C++ Professor',
                    'slug' => 'c-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '800',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 2,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 9,
                    'title' => 'Visual Designer',
                    'slug' => 'visual-designer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '900',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 3,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 10,
                    'title' => 'Graphic Designer',
                    'slug' => 'graphic-designer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '500',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 4,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 11,
                    'title' => 'Graphic Artist',
                    'slug' => 'graphic-artist',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '400',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 5,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 11,
                    'title' => 'Catalogue Illustrator',
                    'slug' => 'catalogue-illustrator',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '900',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 6,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 12,
                    'title' => 'Software Applications Designer',
                    'slug' => 'software-applications-designer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '760',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 7,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 1,
                    'title' => 'Software Applications Architect',
                    'slug' => 'software-applications-architect',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '980',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 8,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 2,
                    'title' => 'Computer Information Systems Professor',
                    'slug' => 'computer-information-systems-professor',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '1145',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 8,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 3,
                    'title' => 'Mainframe Programmer',
                    'slug' => 'mainframe-programmer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '750',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 1,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 4,
                    'title' => 'Systems Programmer',
                    'slug' => 'systems-programmer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '850',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 2,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 5,
                    'title' => 'Application Integration Engineer',
                    'slug' => 'application-integration-engineer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '950',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 3,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 6,
                    'title' => 'Applications Developer',
                    'slug' => 'applications-developer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '100',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 4,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 8,
                    'title' => 'Computer Applications Developer',
                    'slug' => 'computer-applications-developer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '746',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 5,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 9,
                    'title' => 'Computer Applications Engineer',
                    'slug' => 'computer-applications-engineer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '147',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 6,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 10,
                    'title' => 'Database Developer',
                    'slug' => 'database-developer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '965',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 7,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 11,
                    'title' => 'Software Application Designer',
                    'slug' => 'software-application-designer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '784',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 8,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 12,
                    'title' => 'Web Content Developer',
                    'slug' => 'web-content-developer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '1200',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 8,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 1,
                    'title' => 'Web Designer',
                    'slug' => 'web-designer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '1500',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 1,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 2,
                    'title' => 'Web Developer',
                    'slug' => 'web-developer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '2000',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 2,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 3,
                    'title' => 'Applications Programmer',
                    'slug' => 'applications-programmer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'hourly',
                    'price' => '15',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 3,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 4,
                    'title' => 'Computer Language Coder',
                    'slug' => 'computer-language-coder',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'hourly',
                    'price' => '10',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 4,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 5,
                    'title' => 'Computer Programmer',
                    'slug' => 'computer-programmer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'hourly',
                    'price' => '100',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 5,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 6,
                    'title' => 'Junior Software Developer',
                    'slug' => 'junior-software-developer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'hourly',
                    'price' => '50',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 6,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 7,
                    'title' => 'Intranet Developer',
                    'slug' => 'intranet-developers',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'hourly',
                    'price' => '90',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 7,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 8,
                    'title' => 'Internet Developer',
                    'slug' => 'internet-developers',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'hourly',
                    'price' => '80',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 8,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 9,
                    'title' => 'Internet Application Developer',
                    'slug' => 'internet-application-developer',
                    'status' => 'posted',
                    'duration' => 'weekly',
                    'project_level' => 'basic',
                    'freelancer_type' => 'pro_independent',
                    'english_level' => 'basic',
                    'project_type' => 'fixed',
                    'price' => '10',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.</p>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-projectliststyle">
                    <li>Nemo enim ipsam voluptatem quia</li>
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>qui dolorem ipsum quia dolor sit amet</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p>Eomnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>
                    <ul class="wt-projectliststyle">
                    <li>Adipisci velit, sed quia non numquam eius modi tempora</li>
                    <li>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</li>
                    <li>Qui dolorem ipsum quia dolor sit amet</li>
                    <li>Nemo enim ipsam voluptatem quia</li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore ste natus error voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>  ',
                    'location_id' => 8,
                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',
                    'longitude' => '133.368101',
                    'latitude' => '-24.004758',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:39:"1554458958-demo-import-in-WordPress.zip";i:1;s:52:"1554458958-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1554458958-WordPress-customization.pdf";}',
                    'code' => 'A1UDS262',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
