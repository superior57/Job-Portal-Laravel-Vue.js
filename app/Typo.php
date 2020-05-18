<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SiteManagement;

class Typo extends Model
{
    /**
     * Set site custom styling
     *
     * @access public
     *
     * @return array
     */
    public static function setSiteStyling()
    {
        $styling = SiteManagement::getMetaValue('settings');
        if (!empty($styling[0]['enable_theme_color']) && $styling[0]['enable_theme_color'] == 'true') {
            if (!empty($styling[0]['primary_color'])) {
                ob_start(); ?>
                <style>
                    /* Theme Text Color */
                    a,
                    p a,
                    p a:hover,
                    a:hover,
                    a:focus,
                    a:active,
                    .wt-navigation>ul>li:hover>a,
                    .wt-navigation>ul>li.current-menu-item>a,
                    .wt-navarticletab li:hover a,
                    .wt-navarticletab li a.active,
                    .wt-categoriescontent li a:hover,
                    .wt-joinsteps li.wt-active a,
                    .wt-effectivecontent li:hover a,
                    .wt-articlesingle-content .wt-description .wt-blockquotevone q,
                    .wt-filtertag li:hover a,
                    .wt-userlisting-breadcrumb li .wt-clicksave,
                    .wt-clicksave,
                    .wt-qrcodefeat h3 span,
                    .wt-comfollowers ul li:hover a span,
                    .wt-postarticlemeta .wt-following span,
                    .tg-qrcodefeat h3 span,
                    .active-category {
                        color: <?php echo $styling[0]['primary_color'] ?>;
                    }

                    /* Theme Background Color */
                    .wt-btn:hover,
                    .wt-dropdowarrow,
                    .navbar-toggle,
                    .wt-btn,
                    .wt-navigationarea .wt-navigation>ul>li>a:after,
                    .wt-searchbtn,
                    .wt-sectiontitle:after,
                    .wt-navarticletab li a:after,
                    .wt-pagination ul li a:hover,
                    .wt-pagination ul li.wt-active a,
                    .wt-widgettag a:hover,
                    .wt-articlesingle-content .wt-description blockquote span i,
                    .wt-searchgbtn,
                    .wt-filtertagclear a,
                    .ui-slider-horizontal .ui-slider-range,
                    .wt-btnsearch,
                    .wt-newnoti a em,
                    .wt-notificationicon>a:after,
                    .wt-rightarea .wt-nav .navbar-toggler,
                    .wt-usersidebaricon span,
                    .wt-usersidebaricon span i,
                    .wt-filtertag .wt-filtertagclear a,
                    .loader:before,
                    .wt-offersmessages .wt-ad:after,
                    .wt-btnsendmsg,
                    .wt-tabstitle li a:before,
                    .wt-tabscontenttitle:before,
                    .wt-tablecategories thead tr th:first-child:before,
                    .wt-tablecategories tbody tr td:first-child:before,
                    .wt-slidernav .wt-prev:hover,
                    .wt-slidernav .wt-next:hover,
                    .vb>.vb-dragger>.vb-dragger-styler,
                    .wt-pagination ul li span,
                    .la-banner-settings .wt-location h5:after,
                    .la-section-settings .wt-location h6:after,
                    .wt-forgotpassword-holder .card .card-body form .form-group button[type=submit] {
                        background: <?php echo $styling[0]['primary_color'] ?>;
                    }

                    /* Theme Border Color */
                    input:focus,
                    .select select:focus,
                    .form-control:focus,
                    .wt-navigation>ul>li>.sub-menu,
                    .wt-pagination ul li a:hover,
                    .wt-widgettag a:hover,
                    .wt-joinsteps li.wt-active a,
                    .wt-filtertag li:hover a,
                    .wt-filtertag .wt-filtertagclear a,
                    .wt-themerangeslider .ui-slider-handle,
                    .wt-clicksavebtn,
                    .wt-pagination ul li.wt-active a,
                    .wt-usernav>ul,
                    .wt-pagination ul li span {
                        border-color: <?php echo $styling[0]['primary_color'] ?>;
                    }

                    /* RGBA Background Color */
                    .loader{
                        background: <?php echo $styling[0]['primary_color'] ?>;
                        background: -moz-linear-gradient(left, <?php echo $styling[0]['primary_color'] ?> 10%, rgba(255, 88, 81, 0) 42%);
                        background: -webkit-linear-gradient(left, <?php echo $styling[0]['primary_color'] ?> 10%, rgba(255, 88, 81, 0) 42%);
                        background: -o-linear-gradient(left, <?php echo $styling[0]['primary_color'] ?> 10%, rgba(255, 88, 81, 0) 42%);
                        background: -ms-linear-gradient(left, <?php echo $styling[0]['primary_color'] ?> 10%, rgba(255, 88, 81, 0) 42%);
                        background: linear-gradient(to right, <?php echo $styling[0]['primary_color'] ?> 10%, rgba(255, 88, 81, 0) 42%);
                    }
                </style>
                <?php return ob_get_clean();
            }
        }
    }
}
