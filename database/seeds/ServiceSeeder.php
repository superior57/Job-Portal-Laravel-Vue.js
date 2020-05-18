<?php
/**
 * Class ServiceSeeder.
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
 * Class ServiceSeeder
 */
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert(
            [
                [
                    'title' => 'I Will Develop Ios And Android Mobile App Using React Native',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562309590-17.jpg";i:1;s:17:"1562309590-18.jpg";i:2;s:41:"1562309590-Ios And Android Mobile App.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Create, Fix, Customize, Your WordPress Website',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-2',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562309667-08.jpg";i:1;s:17:"1562309667-11.jpg";i:2;s:18:"1562309667-015.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Provide Pro SEO Report, Competitor Website Audit And Analysis',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-3',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562309752-02.jpg";i:1;s:17:"1562309752-03.jpg";i:2;s:17:"1562309752-04.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Do SEO Full On Page And Off Page Optimization For Any Site',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-4',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562309822-05.jpg";i:1;s:17:"1562309822-06.jpg";i:2;s:18:"1562309822-015.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Edit And Master Your Audiobook For Acx',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-5',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562310441-12.jpg";i:1;s:17:"1562310441-19.jpg";i:2;s:17:"1562310441-20.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Make Professional Excel And Google Sheets',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-6',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562310491-02.jpg";i:1;s:17:"1562310491-03.jpg";i:2;s:17:"1562310491-16.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Be Your Ios Developer And Update Old Apps',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-7',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562310551-07.jpg";i:1;s:17:"1562310551-10.jpg";i:2;s:17:"1562310551-11.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Create Automated Shopify Dropshipping Store',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-8',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562310637-04.jpg";i:1;s:17:"1562310637-05.jpg";i:2;s:17:"1562310637-16.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Test Your Applications Or Websites For Usability',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-9',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562311011-13.jpg";i:1;s:17:"1562311011-19.jpg";i:2;s:41:"1562311011-Ios And Android Mobile App.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Write And Publish A Guest Post On Da 80 Dofollow Post',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-10',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562311071-03.jpg";i:1;s:17:"1562311071-08.jpg";i:2;s:17:"1562311071-10.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Write And Publish A Guest Post On Da 80 Dofollow Post',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-11',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562311115-11.jpg";i:1;s:17:"1562311115-16.jpg";i:2;s:17:"1562311115-20.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Do Embedded C Coding For Tiva C And Other Microcontrollers',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-12',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562311202-06.jpg";i:1;s:17:"1562311202-19.jpg";i:2;s:41:"1562311202-Ios And Android Mobile App.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Create Automated Shopify Store For Dropshipping',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-13',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:22:"1562311523-andriod.jpg";i:1;s:46:"1562311523-Ios And Android Mobile App copy.jpg";i:2;s:41:"1562311523-Ios And Android Mobile App.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Create, Fix, Customize, Your WordPress Website',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-14',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562311602-10.jpg";i:1;s:17:"1562311602-14.jpg";i:2;s:17:"1562311602-16.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Test Your Website Or Apps Functionality, Usability And More',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-15',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562311698-20.jpg";i:1;s:22:"1562311698-andriod.jpg";i:2;s:46:"1562311698-Ios And Android Mobile App copy.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Create Automated Shopify Dropshipping Store, Shopify Website',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-16',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:16:"1562311833-1.jpg";i:1;s:17:"1562311833-14.jpg";i:2;s:18:"1562311833-015.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Launch Your Shopify Dropshipping Store',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-17',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:16:"1562312105-2.jpg";i:1;s:17:"1562312105-03.jpg";i:2;s:17:"1562312105-04.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Setup 7 Figure Shopify Website Shopify Store',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-18',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562312214-19.jpg";i:1;s:17:"1562312214-20.jpg";i:2;s:22:"1562312214-andriod.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Redesign Shopify Dropshipping Store To Boost Sales',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-19',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562312251-16.jpg";i:1;s:17:"1562312251-17.jpg";i:2;s:17:"1562312251-18.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'I Will Make A Hybrid Application With Android, Php',
                    'slug' => 'i-will-develop-ios-and-android-mobile-app-using-react-native-20',
                    'status' => 'published',
                    'delivery_time_id' => '3',
                    'response_time_id' => '3',
                    'english_level' => 'fluent',
                    'price' => '20',
                    'description' => '<p>Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim id est laborum. Seden utem perspiciatis undesieu.</p>
                    <p>Accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventoren veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos quistm ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor situe sitem amet conctetur adipisci velit sedate quianon.</p>
                    <div class="wt-title">
                    <h3>Why Should You Hire Me?</h3>
                    </div>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nequei porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitn, sed quia nonae numquam eius modi tempora incidunt labore omnis iste natus error sites voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaem ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conseq aeuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
                    'location_id' => '6',
                    'address' => 'test address',
                    'longitude' => '4568',
                    'latitude' => '4512',
                    'is_featured' => 'true',
                    'show_attachments' => 'true',
                    'attachments' => 'a:3:{i:0;s:17:"1562312303-04.jpg";i:1;s:17:"1562312303-07.jpg";i:2;s:17:"1562312303-08.jpg";}',
                    'code' => 'K7YLR93Q',
                    'views' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
