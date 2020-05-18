<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert(
            [
                [
                    'title' => 'Who Else Wants To Be Successful With Business',
                    'slug'  => 'who-else-wants-to-be-successful-with-business',
                    'banner'  => 'img-01.jpg',
                    'description'  => '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis undesieu omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaqueiu ipsa quae ab illo inventore veritatisetm quasitea architecto beatae vitae dictaed quia consequuntur magni dolores eos quist ratione voluptatem sequei nesciunt. Neque porro quam est qui dolorem ipsum quia dolor sitem amet consectetur adipisci velit sed quianon numquam eius modi tempora incidunt ut labore etneise dolore magnam aliquam quaerat tatem dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    <blockquote class="wt-blockquotevone"><span><i class="lnr lnr-bookmark"></i></span> <q>&rdquo; Adipisicing elit, sed dote eiusmod tempor olak magna aliqua okaeine mikaru itniesce.&rdquo;</q></blockquote>
                    <p>ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiate nulla pariatur. Excepteur sint occaecat cupidatat ainon proident sunt in culpa qui officia deserunt mollit anim id est laborum ut perspiciatis unde.</p>
                    <figure class="wt-blogdetailimgvtwo wt-articlessingleone"><img class="test" src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/img-02.jpg" alt="image description" />
                    <figcaption><span>As per current survey perspiciatis unde omnis iste natus error sit voluptatem.</span></figcaption>
                    </figure>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                    <ul>
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>Qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi quaerat voluptatem.</p>
                    <figure class="wt-blogdetailimgvtwo wt-alignleft"><img src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/img-03.jpg" alt="image description" />
                    <figcaption><span>As per current survey perspiciatis unde</span></figcaption>
                    </figure>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lum, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dictation explicabo. nemo enim ipsam voluptatem quia voluptas orem ipsum quia dolor sit.</p>
                    <ul class="wt-blogliststyle">
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eiuste modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <p class="wt-clear">Excepteur sint eccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et qaenuasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>
                    <figure class="wt-blogdetailimgvtwo wt-alignright"><img src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/img-04.jpg" alt="image description" />
                    <figcaption><span>As per current survey perspiciatis unde</span></figcaption>
                    </figure>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-blogliststyle">
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p class="wt-clear">Excepteur sint eccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasite architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>
                    <div class="wt-video">
                    <figure><a href="https://www.youtube.com/watch?v=J37W6DjqT3Q" rel="prettyPhoto[video]" data-rel="prettyPhoto[video]"><img src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/video-img.jpg" alt="image description" /></a></figure>
                    </div>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>
                    <ul>
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'user_id' => 1,
                ],
                [
                    'title' => '20 Top Tips For Business',
                    'slug'  => '20-top-tips-for-business',
                    'banner'  => 'img-02.jpg',
                    'description'  => '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis undesieu omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaqueiu ipsa quae ab illo inventore veritatisetm quasitea architecto beatae vitae dictaed quia consequuntur magni dolores eos quist ratione voluptatem sequei nesciunt. Neque porro quam est qui dolorem ipsum quia dolor sitem amet consectetur adipisci velit sed quianon numquam eius modi tempora incidunt ut labore etneise dolore magnam aliquam quaerat tatem dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    <blockquote class="wt-blockquotevone"><span><i class="lnr lnr-bookmark"></i></span> <q>&rdquo; Adipisicing elit, sed dote eiusmod tempor olak magna aliqua okaeine mikaru itniesce.&rdquo;</q></blockquote>
                    <p>ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiate nulla pariatur. Excepteur sint occaecat cupidatat ainon proident sunt in culpa qui officia deserunt mollit anim id est laborum ut perspiciatis unde.</p>
                    <figure class="wt-blogdetailimgvtwo wt-articlessingleone"><img class="test" src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/img-02.jpg" alt="image description" />
                    <figcaption><span>As per current survey perspiciatis unde omnis iste natus error sit voluptatem.</span></figcaption>
                    </figure>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                    <ul>
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>Qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi quaerat voluptatem.</p>
                    <figure class="wt-blogdetailimgvtwo wt-alignleft"><img src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/img-03.jpg" alt="image description" />
                    <figcaption><span>As per current survey perspiciatis unde</span></figcaption>
                    </figure>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lum, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dictation explicabo. nemo enim ipsam voluptatem quia voluptas orem ipsum quia dolor sit.</p>
                    <ul class="wt-blogliststyle">
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eiuste modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <p class="wt-clear">Excepteur sint eccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et qaenuasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>
                    <figure class="wt-blogdetailimgvtwo wt-alignright"><img src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/img-04.jpg" alt="image description" />
                    <figcaption><span>As per current survey perspiciatis unde</span></figcaption>
                    </figure>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-blogliststyle">
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p class="wt-clear">Excepteur sint eccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasite architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>
                    <div class="wt-video">
                    <figure><a href="https://www.youtube.com/watch?v=J37W6DjqT3Q" rel="prettyPhoto[video]" data-rel="prettyPhoto[video]"><img src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/video-img.jpg" alt="image description" /></a></figure>
                    </div>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>
                    <ul>
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'user_id' => 1,
                ],
                [
                    'title' => 'Clear And Unbiased Facts About Business (Without All The Hype)',
                    'slug'  => 'clear-and-unbiased-facts-about-business-without-all-the-hype',
                    'banner'  => 'img-04.jpg',
                    'description'  => '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed utem perspiciatis undesieu omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaqueiu ipsa quae ab illo inventore veritatisetm quasitea architecto beatae vitae dictaed quia consequuntur magni dolores eos quist ratione voluptatem sequei nesciunt. Neque porro quam est qui dolorem ipsum quia dolor sitem amet consectetur adipisci velit sed quianon numquam eius modi tempora incidunt ut labore etneise dolore magnam aliquam quaerat tatem dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    <blockquote class="wt-blockquotevone"><span><i class="lnr lnr-bookmark"></i></span> <q>&rdquo; Adipisicing elit, sed dote eiusmod tempor olak magna aliqua okaeine mikaru itniesce.&rdquo;</q></blockquote>
                    <p>ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiate nulla pariatur. Excepteur sint occaecat cupidatat ainon proident sunt in culpa qui officia deserunt mollit anim id est laborum ut perspiciatis unde.</p>
                    <figure class="wt-blogdetailimgvtwo wt-articlessingleone"><img class="test" src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/img-02.jpg" alt="image description" />
                    <figcaption><span>As per current survey perspiciatis unde omnis iste natus error sit voluptatem.</span></figcaption>
                    </figure>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                    <ul>
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>Qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi quaerat voluptatem.</p>
                    <figure class="wt-blogdetailimgvtwo wt-alignleft"><img src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/img-03.jpg" alt="image description" />
                    <figcaption><span>As per current survey perspiciatis unde</span></figcaption>
                    </figure>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lum, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dictation explicabo. nemo enim ipsam voluptatem quia voluptas orem ipsum quia dolor sit.</p>
                    <ul class="wt-blogliststyle">
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eiuste modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <p class="wt-clear">Excepteur sint eccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et qaenuasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>
                    <figure class="wt-blogdetailimgvtwo wt-alignright"><img src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/img-04.jpg" alt="image description" />
                    <figcaption><span>As per current survey perspiciatis unde</span></figcaption>
                    </figure>
                    <p>Laborum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.</p>
                    <ul class="wt-blogliststyle">
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia nonae numquam eius modi tempora incidunt labore.</p>
                    <p class="wt-clear">Excepteur sint eccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasite architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>
                    <div class="wt-video">
                    <figure><a href="https://www.youtube.com/watch?v=J37W6DjqT3Q" rel="prettyPhoto[video]" data-rel="prettyPhoto[video]"><img src="http://www.amentotech.com/projects/worketic/images/article/articlessingle/video-img.jpg" alt="image description" /></a></figure>
                    </div>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>
                    <ul>
                    <li><span>Nemo enim ipsam voluptatem quia</span></li>
                    <li><span>Adipisci velit, sed quia non numquam eius modi tempora</span></li>
                    <li><span>Eaque ipsa quae ab illo inventore veritatis et quasi architecto</span></li>
                    <li><span>qui dolorem ipsum quia dolor sit amet</span></li>
                    </ul>
                    <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.</p>',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'user_id' => 1,
                ]
            ]
        );
    }
}
