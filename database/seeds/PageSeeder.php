<?php
/**
 * Class PageSeeder.
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
 * Class PageSeeder
 */
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();
        DB::table('pages')->insert(
            [
                [
                    'title' => 'Main',
                    'slug' => 'main',
                    'body' => '<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="wt-greeting-holder">
                    <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 float-left">
                    <div class="wt-greetingcontent">
                    <div class="wt-sectionhead">
                    <div class="wt-sectiontitle">
                    <h2>Greetings &amp; Welcome</h2>
                    Start Today For a Great Future</div>
                    <div class="wt-description">
                    <p>Dotem eiusmod tempor incune utnaem labore etdolore maigna aliqua eniina ilukita ylokem lokateise ination voluptate velite esse cillum dolore eu fugnulla pariatur lokaim urianewce anim id est laborumed.</p>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa officia deserunt mollit anim id est laborumed perspiciatis unde omnis isteatus error aluptatem accusantium doloremque laudantium.</p>
                    </div>
                    </div>
                    <div id="wt-statistics" class="wt-statistics">
                    <div class="wt-statisticcontent wt-countercolor1">
                    <h3 data-from="0" data-to="1500" data-speed="8000" data-refresh-interval="50">1,500</h3>
                    <em>k</em>
                    <h4>Active Projects</h4>
                    </div>
                    <div class="wt-statisticcontent wt-countercolor2">
                    <h3 data-from="0" data-to="99.6" data-speed="8000" data-refresh-interval="5.9">75</h3>
                    <em>%</em>
                    <h4>Great Feedback</h4>
                    </div>
                    <div class="wt-statisticcontent wt-countercolor3">
                    <h3 data-from="0" data-to="5000" data-speed="8000" data-refresh-interval="100">5,000</h3>
                    <em>k</em>
                    <h4>Active Freelancers</h4>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 float-left">
                    <div class="wt-greetingvideo">
                    <figure><a href="https://www.youtube.com/watch?v=B-ph2g5o2K4" rel="prettyPhoto[video]" data-rel="prettyPhoto[video]"><img src="http://www.amentotech.com/projects/worketic/images/video-img.png" alt="video" width="415" height="450" /> </a></figure>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>',
                    'relation_type' => 0,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'sections' => null,
                ],
                [
                    'title' => 'About Us',
                    'slug' => 'about-us',
                    'body' => 'null',
                    'relation_type' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'sections' => 'a:1:{i:0;O:8:"stdClass":5:{s:4:"name";s:19:"Description Section";s:7:"section";s:15:"content_section";s:5:"value";s:7:"content";s:4:"icon";s:10:"img-09.png";s:2:"id";i:4;}}',
                ],
                [
                    'title' => 'How It Works',
                    'slug' => 'how-it-works',
                    'body' => '<div class="wt-contentwrappers">
                    <div class="container">
                    <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                    <div class="wt-howitwork-hold wt-bgwhite wt-haslayout">
                    <ul class="wt-navarticletab wt-navarticletabvtwo nav navbar-nav">
                    <li class="nav-item"><a id="all-tab" class="active" href="#forhiring" data-toggle="tab">For Hiring</a></li>
                    <li class="nav-item"><a id="business-tab" href="#forfreelancing" data-toggle="tab">For Freelancing</a></li>
                    <li class="nav-item"><a id="trading-tab" href="#faq" data-toggle="tab">FAQ</a></li>
                    </ul>
                    <div class="tab-content wt-haslayout">
                    <div id="forhiring" class="wt-contentarticle tab-pane active fade show">
                    <div class="row">
                    <div class="wt-starthiringhold wt-innerspace wt-haslayout">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 float-left">
                    <div class="wt-starthiringcontent">
                    <div class="wt-sectionhead">
                    <div class="wt-sectiontitle">
                    <h2>How To Start Hiring</h2>
                    Start Today For a Great Future</div>
                    <div class="wt-description">
                    <p>Dotem eiusmod tempor incune utnaem labore etdolore maigna aliqua eniina ilukita ylokem lokateise ination voluptate velite esse cillum dolore eu fugnulla pariatur lokaim urianewce animid <a>Learn more</a></p>
                    </div>
                    </div>
                    <ul class="wt-accordionhold accordion">
                    <li>
                    <div id="headingOne" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapseOne">Adipisicing elit, sed do eiusmod tempor incididunt?</div>
                    <div id="collapseOne" class="wt-accordiondetails collapse show" aria-labelledby="headingOne">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore eta dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    <li>
                    <div id="headingtwo" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapsetwo">Dolore magna aliqua enim ad minim veniam?</div>
                    <div id="collapsetwo" class="wt-accordiondetails collapse" aria-labelledby="headingtwo">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    <li>
                    <div id="headingthreea" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapsethree">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo?</div>
                    <div id="collapsethree" class="wt-accordiondetails collapse" aria-labelledby="headingthreea">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    </ul>
                    </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 float-right">
                    <div class="wt-howtoworkimg">
                    <figure><img src="http://www.amentotech.com/projects/worketic/images/work/img-01.jpg" alt="img description" width="415" height="386" /></figure>
                    </div>
                    </div>
                    </div>
                    <div class="wt-starthiringhold wt-innerspace wt-haslayout">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 float-right">
                    <div class="wt-starthiringcontent">
                    <div class="wt-sectionhead">
                    <div class="wt-sectiontitle">
                    <h2>Getting Into Business</h2>
                    Focus on Your Work &amp; Team</div>
                    <div class="wt-description">
                    <p>Dotem eiusmod tempor incune utnaem labore etdolore maigna aliqua eniina ilukita ylokem lokateise ination voluptate velite esse cillum dolore eu fugnulla pariatur lokaim urianewce animid learn <a>more</a></p>
                    </div>
                    </div>
                    <ul class="wt-accordionhold accordion">
                    <li>
                    <div id="headingtwo2" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapsetwo2">Nostrud exercitation ullamco laboris nisi ut aliquip?</div>
                    <div id="collapsetwo2" class="wt-accordiondetails collapse" aria-labelledby="headingtwo2">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    <li>
                    <div id="headingtwo4" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapsetwo4">Commodo consequat aute irure dolor in reprehenderit in voluptate velit?</div>
                    <div id="collapsetwo4" class="wt-accordiondetails collapse" aria-labelledby="headingtwo4">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    <li>
                    <div id="headingthree2" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapsethree2">Cillum dolore eu fugiat nulla pariatur?</div>
                    <div id="collapsethree2" class="wt-accordiondetails collapse" aria-labelledby="headingthree2">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    </ul>
                    </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 float-left">
                    <div class="wt-howtoworkimg">
                    <figure><img src="http://www.amentotech.com/projects/worketic/images/work/img-02.jpg" alt="img description" /></figure>
                    </div>
                    </div>
                    </div>
                    <div class="wt-starthiringhold wt-innerspace wt-haslayout">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 float-left">
                    <div class="wt-starthiringcontent">
                    <div class="wt-sectionhead">
                    <div class="wt-sectiontitle">
                    <h2>Making Serious Profit</h2>
                    Manage Your Profitable Account</div>
                    <div class="wt-description">
                    <p>Dotem eiusmod tempor incune utnaem labore etdolore maigna aliqua eniina ilukita ylokem lokateise ination voluptate velite esse cillum dolore eu fugnulla pariatur lokaim urianewce animid learn <a>more</a></p>
                    </div>
                    </div>
                    <ul class="wt-accordionhold accordion">
                    <li>
                    <div id="headingOne3" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapseOne3">Excepteur sint occaecat cupidatat non proident?</div>
                    <div id="collapseOne3" class="wt-accordiondetails collapse" aria-labelledby="headingOne3">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    <li>
                    <div id="headingtwo3" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapsetwo3">Sunt in culpa qui officia deserunt mollit anim id est laborum?</div>
                    <div id="collapsetwo3" class="wt-accordiondetails collapse" aria-labelledby="headingtwo3">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    <li>
                    <div id="headingthree3" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapsethree3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem?</div>
                    <div id="collapsethree3" class="wt-accordiondetails collapse" aria-labelledby="headingthree3">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    </ul>
                    </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 float-right">
                    <div class="wt-howtoworkimg">
                    <figure><img src="http://www.amentotech.com/projects/worketic/images/work/img-03.jpg" alt="img description" width="415" height="386" /></figure>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div id="forfreelancing" class="wt-contentarticle tab-pane fade">
                    <div class="row">
                    <div class="wt-starthiringhold wt-innerspace wt-haslayout">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 float-right">
                    <div class="wt-starthiringcontent">
                    <div class="wt-sectionhead">
                    <div class="wt-sectiontitle">
                    <h2>How To Start Hiring</h2>
                    Start Today For a Great Future</div>
                    <div class="wt-description">
                    <p>Dotem eiusmod tempor incune utnaem labore etdolore maigna aliqua eniina ilukita ylokem lokateise ination voluptate velite esse cillum dolore eu fugnulla pariatur lokaim urianewce animid learn <a>more</a></p>
                    </div>
                    </div>
                    <ul class="wt-accordionhold accordion">
                    <li>
                    <div id="headingOneq" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapseOneq">Adipisicing elit, sed do eiusmod tempor incididunt?</div>
                    <div id="collapseOneq" class="wt-accordiondetails collapse" aria-labelledby="headingOneq">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    <li>
                    <div id="headingtwoq" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapsetwoq">Dolore magna aliqua enim ad minim veniam?</div>
                    <div id="collapsetwoq" class="wt-accordiondetails collapse" aria-labelledby="headingtwoq">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    <li>
                    <div id="headingthreeq" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapsethreeq">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo?</div>
                    <div id="collapsethreeq" class="wt-accordiondetails collapse" aria-labelledby="headingthreeq">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    </ul>
                    </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 float-left">
                    <div class="wt-howtoworkimg">
                    <figure><img src="http://www.amentotech.com/projects/worketic/images/work/img-01.jpg" alt="img description" width="415" height="386" /></figure>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div id="faq" class="wt-contentarticle tab-pane fade">
                    <div class="row">
                    <div class="wt-starthiringhold wt-innerspace wt-haslayout">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 float-left">
                    <div class="wt-starthiringcontent">
                    <div class="wt-sectionhead">
                    <div class="wt-sectiontitle">
                    <h2>How To Start Hiring</h2>
                    Start Today For a Great Future</div>
                    <div class="wt-description">
                    <p>Dotem eiusmod tempor incune utnaem labore etdolore maigna aliqua eniina ilukita ylokem lokateise ination voluptate velite esse cillum dolore eu fugnulla pariatur lokaim urianewce animid learn <a>more</a></p>
                    </div>
                    </div>
                    <ul class="wt-accordionhold accordion">
                    <li>
                    <div id="headingOnea" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapseOnea">Nostrud exercitation ullamco laboris nisi ut aliquip?</div>
                    <div id="collapseOnea" class="wt-accordiondetails collapse" aria-labelledby="headingOne">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    <li>
                    <div id="headingtwoa" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapsetwoa">Commodo consequat aute irure dolor in reprehenderit in voluptate velit?</div>
                    <div id="collapsetwoa" class="wt-accordiondetails collapse" aria-labelledby="headingtwoa">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    <li>
                    <div id="headingthree" class="wt-accordiontitle collapsed" data-toggle="collapse" data-target="#collapsethreea">Cillum dolore eu fugiat nulla pariatur?</div>
                    <div id="collapsethreea" class="wt-accordiondetails collapse" aria-labelledby="headingthree">
                    <div class="wt-title">
                    <h3>Digital Marketing</h3>
                    </div>
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit sed aeiusmisuod tempor incididunt labore dolore ma alaeiqua enim ade minim veniam quis nostr xecitation ullamcoaris nisi ut aliquipa extaea coedmmmodo equate irure dolawor in reprehenderit.</p>
                    </div>
                    <div class="wt-likeunlike">Did you find this useful?</div>
                    </div>
                    </li>
                    </ul>
                    </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-5 float-right">
                    <div class="wt-howtoworkimg">
                    <figure><img src="http://www.amentotech.com/projects/worketic/images/work/img-01.jpg" alt="img description" width="415" height="386" /></figure>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>',
                    'relation_type' => 0,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'sections' => null,
                ],
                [
                    'title' => 'Privacy Policy',
                    'slug' => 'privacy-policy',
                    'body' => '<div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                    <aside id="wt-sidebar" class="wt-sidebar">
                    <div class="wt-widget wt-effectiveholder">
                    <div class="wt-widgettitle">
                    <h2>Effective T&amp;C</h2>
                    </div>
                    <div class="wt-widgetcontent">
                    <ul class="wt-effectivecontent">
                    <li><a>Adipisicing elit sed do eiusmod</a></li>
                    <li><a>Tempor incididunt</a></li>
                    <li><a>How To Submit Claim Report</a></li>
                    <li><a>Ut enim ad minim veniam</a></li>
                    <li><a>Quis nostrud exercitation</a></li>
                    <li><a>Ullamco laboris nisiut</a></li>
                    <li><a>Aliquip ex ea commodo</a></li>
                    <li><a>Consequat duis aute</a></li>
                    <li><a>Irure dolorin</a></li>
                    <li><a>Reprehenderit</a></li>
                    <li><a>Voluptate velit esse cillum</a></li>
                    </ul>
                    </div>
                    </div>
                    </aside>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                    <div class="wt-submitreportholder wt-bgwhite">
                    <div class="wt-titlebar">
                    <h2>How To Submit Claim Report</h2>
                    </div>
                    <div class="wt-reportdescription">
                    <div class="wt-description">
                    <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud <a href="javascrip:void(0);"> exercitation ullamco laboris</a> nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut <a href="javascrip:void(0);"> perspiciatis unde</a> omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur, adipisci velit, sed quia magnam aliquam quaerat voluptatem.</p>
                    </div>
                    <div class="wt-title">
                    <h3>Step #01</h3>
                    </div>
                    <div class="wt-description">
                    <p>Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p>Voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur, adipisci velit, sed quia magnam aliquam quaerat voluptatem.</p>
                    </div>
                    <div class="wt-title">
                    <h3>Step #02</h3>
                    </div>
                    <div class="wt-description">
                    <p>Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Consequuntur magni dolores eios qui ratione voluptatem sequi nesciunt. Nequerro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur, adipisci velit, sed quia magnam aliquam quaerat voluptatem.</p>
                    </div>
                    <div class="wt-title">
                    <h3>Step #03</h3>
                    </div>
                    <div class="wt-description">
                    <p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur adipisci velit.</p>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>',
                    'relation_type' => 0,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'sections' => null,
                ],
                [
                    'title' => 'Home v1',
                    'slug' => 'home-v1',
                    'body' => 'null',
                    'relation_type' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'sections' => 'a:4:{i:0;O:8:"stdClass":5:{s:4:"name";s:14:"Slider Section";s:7:"section";s:6:"slider";s:5:"value";s:7:"sliders";s:4:"icon";s:10:"img-01.png";s:2:"id";i:1;}i:1;O:8:"stdClass":5:{s:4:"name";s:16:"Category Section";s:7:"section";s:8:"category";s:5:"value";s:3:"cat";s:4:"icon";s:10:"img-02.png";s:2:"id";i:2;}i:2;O:8:"stdClass":5:{s:4:"name";s:15:"Welcome Section";s:7:"section";s:15:"welcome_section";s:5:"value";s:16:"welcome_sections";s:4:"icon";s:10:"img-03.png";s:2:"id";i:4;}i:3;O:8:"stdClass":5:{s:4:"name";s:11:"APP Section";s:7:"section";s:11:"app_section";s:5:"value";s:11:"app_section";s:4:"icon";s:10:"img-04.png";s:2:"id";i:5;}}',
                ],
                [
                    'title' => 'Home V2',
                    'slug' => 'home-v2',
                    'body' => 'null',
                    'relation_type' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'sections' => 'a:6:{i:0;O:8:"stdClass":5:{s:4:"name";s:14:"Slider Section";s:7:"section";s:6:"slider";s:5:"value";s:7:"sliders";s:4:"icon";s:10:"img-01.png";s:2:"id";i:1;}i:1;O:8:"stdClass":5:{s:4:"name";s:15:"Service Section";s:7:"section";s:15:"service_section";s:5:"value";s:8:"services";s:4:"icon";s:10:"img-05.png";s:2:"id";i:6;}i:2;O:8:"stdClass":5:{s:4:"name";s:23:"How it work tab section";s:7:"section";s:16:"work_tab_section";s:5:"value";s:9:"work_tabs";s:4:"icon";s:10:"img-07.png";s:2:"id";i:3;}i:3;O:8:"stdClass":5:{s:4:"name";s:18:"Freelancer section";s:7:"section";s:18:"freelancer_section";s:5:"value";s:11:"freelancers";s:4:"icon";s:10:"img-08.png";s:2:"id";i:4;}i:4;O:8:"stdClass":5:{s:4:"name";s:11:"APP Section";s:7:"section";s:11:"app_section";s:5:"value";s:11:"app_section";s:4:"icon";s:10:"img-04.png";s:2:"id";i:5;}i:5;O:8:"stdClass":5:{s:4:"name";s:15:"Article Section";s:7:"section";s:15:"article_section";s:5:"value";s:8:"articles";s:4:"icon";s:10:"img-10.png";s:2:"id";i:10;}}',
                ],
                [
                    'title' => 'Home v3',
                    'slug' => 'home-v3',
                    'body' => 'null',
                    'relation_type' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'sections' => 'a:6:{i:0;O:8:"stdClass":5:{s:4:"name";s:14:"Slider Section";s:7:"section";s:6:"slider";s:5:"value";s:7:"sliders";s:4:"icon";s:10:"img-01.png";s:2:"id";i:1;}i:1;O:8:"stdClass":5:{s:4:"name";s:15:"Service Section";s:7:"section";s:15:"service_section";s:5:"value";s:8:"services";s:4:"icon";s:10:"img-05.png";s:2:"id";i:5;}i:2;O:8:"stdClass":5:{s:4:"name";s:18:"Freelancer section";s:7:"section";s:18:"freelancer_section";s:5:"value";s:11:"freelancers";s:4:"icon";s:10:"img-08.png";s:2:"id";i:4;}i:3;O:8:"stdClass":5:{s:4:"name";s:25:"How it work video section";s:7:"section";s:18:"work_video_section";s:5:"value";s:11:"work_videos";s:4:"icon";s:10:"img-06.png";s:2:"id";i:3;}i:4;O:8:"stdClass":5:{s:4:"name";s:11:"APP Section";s:7:"section";s:11:"app_section";s:5:"value";s:11:"app_section";s:4:"icon";s:10:"img-04.png";s:2:"id";i:7;}i:5;O:8:"stdClass":5:{s:4:"name";s:15:"Article Section";s:7:"section";s:15:"article_section";s:5:"value";s:8:"articles";s:4:"icon";s:10:"img-09.png";s:2:"id";i:6;}}',
                ],
            ]
        );
    }
}
