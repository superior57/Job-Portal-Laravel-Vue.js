<nav id="wt-nav" class="wt-nav navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="lnr lnr-menu"></i>
    </button>
    <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
        <ul class="navbar-nav">
            <!-- <?php if(!empty($pages) || Schema::hasTable('pages')): ?>
                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $page_has_child = App\Page::pageHasChild($page->id); $pageID = Request::segment(2);
                        $show_page = \App\SiteManagement::where('meta_key', 'show-page-'.$page->id)->select('meta_value')->pluck('meta_value')->first();
                    ?>
                    <?php if($page->relation_type == 0 && ($show_page == 'true' || $show_page == true)): ?>
                        <li class="<?php echo e(!empty($page_has_child) ? 'menu-item-has-children page_item_has_children' : ''); ?> <?php if($pageID == $page->slug ): ?> current-menu-item <?php endif; ?>">
                            <a href="<?php echo e(url('page/'.$page->slug)); ?>"><?php echo e($page->title); ?></a>
                            <?php if(!empty($page_has_child)): ?>
                                <ul class="sub-menu">
                                    <?php $__currentLoopData = $page_has_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $child = App\Page::getChildPages($parent->child_id);?>
                                        <?php if(!empty($child)): ?>
                                            <li class="<?php if($pageID == $child->slug ): ?> current-menu-item <?php endif; ?>">
                                                <a href="<?php echo e(url('page/'.$child->slug.'/')); ?>">
                                                    <?php echo e($child->title); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?> -->
            <!-- <li>
                <a href="<?php echo e(url('articles')); ?>">
                    <?php echo e(trans('lang.articles')); ?>

                </a>
            </li> -->
            <!-- <li>
                <a href="<?php echo e(url('search-results?type=freelancer')); ?>">
                    <?php echo e(trans('lang.view_freelancers')); ?>

                </a>
            </li> -->
            <!-- <li>
                <a href="<?php echo e(url('search-results?type=employer')); ?>">
                    <?php echo e(trans('lang.view_employers')); ?>

                </a>
            </li> -->
            <?php if($type =='jobs' || $type == 'both'): ?>
                <li>
                    <a href="<?php echo e(url('search-results?type=job')); ?>">
                        <?php echo e(trans('lang.browse_jobs')); ?>

                    </a>
                </li>
            <?php endif; ?>
                <li>
                    <a href="#">
                        Hadvarker
                    </a>
                </li>
                <li>
                    <a href="#">
                        Information
                    </a>
                </li>
                <li>
                    <a href="#">
                        Opret Konto
                    </a>
                </li>
            <!-- <?php if($type =='services' || $type == 'both'): ?>
                <li>
                    <a href="<?php echo e(url('search-results?type=service')); ?>">
                        <?php echo e(trans('lang.browse_services')); ?>

                    </a>
                </li>
            <?php endif; ?> -->
        </ul>
    </div>
</nav>