<?php $__env->startPush('stylesheets'); ?>
    <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($show_article_banner == 'true'): ?>
        <div class="wt-haslayout wt-innerbannerholder" style="background-image:url(<?php echo e(asset(Helper::getBannerImage($article_inner_banner, 'uploads/settings/general'))); ?>)">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                        <div class="wt-innerbannercontent">
                            <div class="wt-title">
                                <h2><?php echo e(trans('lang.articles')); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="wt-haslayout wt-main-section">
        <div class="container">
            <div class="row">
                <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                        <aside id="wt-sidebar" class="wt-sidebar">
                            <?php if(!empty($cats)  && count($cats) !== 0): ?>
                                <div class="wt-widget wt-categoriesholder">
                                    <div class="wt-widgettitle">
                                        <h2><?php echo e(trans('lang.cats')); ?></h2>
                                    </div>
                                    <div class="wt-widgetcontent">
                                        <ul class="wt-categoriescontent">
                                            <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php 
                                                $selected_category = \App\ArticleCategory::where('id', $cat['id'])->first(); 
                                                $article_count = $selected_category->articles->count();
                                            ?>
                                            <li><a href="<?php echo e(url('articles/'.$cat['slug'])); ?>"><?php echo e($cat['title']); ?><em><?php echo e($article_count); ?></em></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($latest_article)  && count($latest_article) !== 0): ?>
                                <div class="wt-widget wt-widgetarticlesholder">
                                    <div class="wt-widgettitle">
                                        <h2><?php echo e(trans('lang.popular_articles')); ?></h2>
                                    </div>
                                    <div class="wt-widgetcontent">
                                        <?php $__currentLoopData = $latest_article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="wt-particlehold">
                                                <figure>
                                                    <img src="<?php echo e(asset(Helper::getImage('uploads/articles', $article->banner, 'x-small-', 'xsmall-default-article.png'))); ?>" alt="image description">
                                                </figure>
                                                <div class="wt-particlecontent">
                                                    <h3><a href="<?php echo e(url('article/'.$article->slug)); ?>"><?php echo e($article->title); ?></a></h3>
                                                    <span><i class="lnr lnr-clock"></i><?php echo e(\Carbon\Carbon::parse($article->updated_at)->format('M d, Y')); ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </aside>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                        <div class="wt-classicaricle-holder">
                            <div class="wt-classicaricle-header">
                                <div class="wt-title">
                                    <h2><?php echo e(trans('lang.our_latest_articles')); ?></h2>
                                </div>
                            </div>
                            <?php if(!empty($articles) && count($articles) !== 0): ?>
                                <div class="wt-article-holder">
                                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="wt-article">
                                            <figure>
                                                <a href="<?php echo e(url('article/'.$article->slug)); ?>">
                                                    <img src="<?php echo e(asset(Helper::getImage('uploads/articles', $article->banner, 'medium-', 'medium-default-article.png'))); ?>" alt="<?php echo e($article->title); ?>">
                                                </a>
                                            </figure>
                                            <div class="wt-articlecontent">
                                                <a href="<?php echo e(url('article/'.$article->slug)); ?>">
                                                    <div class="wt-title">
                                                        <h2><?php echo e($article->title); ?></h2>
                                                    </div>
                                                </a>
                                                <ul class="wt-postarticlemeta">
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <i class="lnr lnr-clock"></i>
                                                            <span><?php echo e(\Carbon\Carbon::parse($article->updated_at)->format('M d, Y')); ?></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <i class="lnr lnr-user"></i>
                                                            <span><?php echo e(\App\Helper::getUserName($article->user_id)); ?></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php if( method_exists($articles,'links') ): ?>
                                    <?php echo e($articles->links('pagination.custom')); ?>

                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(file_exists(resource_path('views/extend/errors/no-record.blade.php'))): ?> 
                                    <?php echo $__env->make('extend.errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php else: ?> 
                                    <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
        <script>
            if (APP_DIRECTION == 'rtl') {
                var direction = true;
            } else {
                var direction = false;
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>