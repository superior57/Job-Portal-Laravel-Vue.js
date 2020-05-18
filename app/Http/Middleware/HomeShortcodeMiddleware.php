<?php

namespace App\Http\Middleware;

use Closure;

class HomeShortcodeMiddleware
{

    /**
     * @access public
     * @desc Create redirect Link 
     * @param $email_type
     * @return string
    */
    public function getSearchForm()
    {
        ob_start();
        ?>
        <form class="wt-formtheme wt-formbanner wt-formbannervtwo">
            <fieldset>
                <div class="form-group">
                    <input type="text" name="job" class="form-control" placeholder="I’m looking for">
                    <div class="wt-formoptions">
                        <div class="wt-dropdown">
                            <span>In: <em class="selected-search-type">Freelancers </em><i class="lnr lnr-chevron-down"></i></span>
                        </div>
                        <div class="wt-radioholder">
                            <span class="wt-radio">
                                <input id="wt-freelancers" data-title="Freelancers" type="radio" name="searchtype" value="freelancer" checked="">
                                <label for="wt-freelancers">Freelancers</label>
                            </span>
                            <span class="wt-radio">
                                <input id="wt-jobs" data-title="Jobs" type="radio" name="searchtype" value="job">
                                <label for="wt-jobs">Jobs</label>
                            </span>
                            <span class="wt-radio">
                                <input id="wt-companies" data-title="Companies" type="radio" name="searchtype" value="job">
                                <label for="wt-companies">Companies</label>
                            </span>
                        </div>
                        <a href="javascrip:void(0);" class="wt-searchbtn"><i class="lnr lnr-magnifier"></i></a>
                    </div>
                </div>
            </fieldset>
        </form>
        <?php
        return ob_get_clean();
    }

    public function getAnimatedImage()
    {
        ob_start();
        ?>
            <figure class="wt-bannermanimg" data-tilt>
                <img src="images/bannerimg/img-01.png" alt="img description">
                <img src="images/bannerimg/img-02.png" class="wt-bannermanimgone" alt="img description">
                <img src="images/bannerimg/img-03.png" class="wt-bannermanimgtwo" alt="img description">
            </figure>
        <?php
        return ob_get_clean();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        ob_start();
        $response =  $next($request);
        if (!method_exists($response, 'content')) {
            return $response;
        }
        $search_form = $this->getSearchForm();
        $animated_image = $this->getAnimatedImage();
        $content='';
        $content = str_replace("[shortcode_search]", $search_form, $response->content());
        $content = str_replace("[shortcode_animated_image]", $animated_image, $response->content());
        
        $response->setContent($content);
        
        return $response ;
        
    }
}
