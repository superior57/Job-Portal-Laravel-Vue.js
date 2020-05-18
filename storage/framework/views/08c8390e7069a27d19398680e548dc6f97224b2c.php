<aside id="wt-sidebar" class="wt-sidebar">
    <?php echo Form::open(['url' => url('search-results'), 'method' => 'get', 'class' => 'wt-formtheme wt-formsearch']); ?>

        <input type="hidden" value="<?php echo e($type); ?>" name="type">
        <div class="wt-widget wt-effectiveholder wt-startsearch">
            <div class="wt-widgettitle">
                <h2><?php echo e(trans('lang.start_search')); ?></h2>
            </div>
            <div class="wt-widgetcontent">
                <div class="wt-formtheme wt-formsearch">
                    <fieldset>
                        <div class="form-group">
                            <input type="text" name="s" class="form-control" placeholder="<?php echo e(trans('lang.ph_search_jobs')); ?>" value="<?php echo e($keyword); ?>">
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgettitle">
                <h2><?php echo e(trans('lang.cats')); ?></h2>
            </div>
            <div class="wt-widgetcontent">
                <fieldset>
                    <div class="form-group">
                        <input type="text" class="form-control filter-records" placeholder="<?php echo e(trans('lang.ph_search_cat')); ?>">
                        <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                    </div>
                </fieldset>
                <fieldset>
                    <?php if(!empty($categories)): ?>
                        <div class="wt-checkboxholder wt-verticalscrollbar">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $checked = ( !empty($_GET['category']) && in_array($category->slug, $_GET['category'] )) ? 'checked' : ''; ?>
                                <span class="wt-checkbox">
                                    <input id="cat-<?php echo e($category->slug); ?>" type="checkbox" name="category[]" value="<?php echo e($category->slug); ?>" <?php echo e($checked); ?> >
                                    <label for="cat-<?php echo e($category->slug); ?>"> <?php echo e($category->title); ?></label>
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </fieldset>
            </div>
        </div>
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgettitle">
                <h2><?php echo e(trans('lang.locations')); ?></h2>
            </div>
            <div class="wt-widgetcontent">
                <fieldset>
                    <div class="form-group">
                        <input type="text" class="form-control filter-records" placeholder="<?php echo e(trans('lang.ph_search_locations')); ?>">
                        <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                    </div>
                </fieldset>
                <fieldset>
                    <?php if(!empty($locations)): ?>
                        <div class="wt-checkboxholder wt-verticalscrollbar">
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $checked = ( !empty($_GET['locations']) && in_array($location->slug, $_GET['locations'])) ? 'checked' : '' ?>
                                <span class="wt-checkbox">
                                    <input id="location-<?php echo e($location->slug); ?>" type="checkbox" name="locations[]" value="<?php echo e($location->slug); ?>" <?php echo e($checked); ?> >
                                    <label for="location-<?php echo e($location->slug); ?>"> <img src="<?php echo e(asset(Helper::getLocationFlag($location->flag))); ?>" alt="<?php echo e(trans('lang.img')); ?>"> <?php echo e($location->title); ?></label>
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </fieldset>
            </div>
        </div>
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgettitle">
                <h2><?php echo e(trans('lang.skills')); ?></h2>
            </div>
            <div class="wt-widgetcontent">
                <fieldset>
                    <?php if(!empty($skills)): ?>
                        <div class="wt-checkboxholder wt-verticalscrollbar">
                            <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $checked = (!empty($_GET['skills']) && in_array($skill->slug, $_GET['skills'])) ? 'checked' : '' ?>
                                <span class="wt-checkbox">
                                    <input id="skill-<?php echo e($key); ?>" type="checkbox" name="skills[]" value="<?php echo e($skill->slug); ?>" <?php echo e($checked); ?> >
                                    <label for="skill-<?php echo e($key); ?>"><?php echo e($skill->title); ?></label>
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </fieldset>
            </div>
        </div>
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgettitle">
                <h2><?php echo e(trans('lang.project_length')); ?></h2>
            </div>
            <div class="wt-widgetcontent">
                <fieldset>
                    <?php if(!empty($project_length)): ?>
                        <div class="wt-checkboxholder">
                            <?php $__currentLoopData = $project_length; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $length): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $checked = ( !empty($_GET['project_lengths']) && in_array($length, $_GET['project_lengths'])) ? 'checked' : '' ?>
                                <span class="wt-checkbox">
                                    <input id="<?php echo e($key); ?>" type="checkbox" name="project_lengths[]" value="<?php echo e($key); ?>" <?php echo e($checked); ?>>
                                    <label for="<?php echo e($key); ?>"><?php echo e($length); ?></label>
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </fieldset>
            </div>
        </div>
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgettitle">
                <h2><?php echo e(trans('lang.langs')); ?></h2>
            </div>
            <div class="wt-widgetcontent">
                <fieldset>
                    <div class="form-group">
                        <input type="text" class="form-control filter-records" placeholder="<?php echo e(trans('lang.ph_search_langs')); ?>">
                        <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                    </div>
                </fieldset>
                <fieldset>
                    <?php if(!empty($languages)): ?>
                        <div class="wt-checkboxholder wt-verticalscrollbar">
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $checked = ( !empty($_GET['languages']) && in_array($language->slug, $_GET['languages'])) ? 'checked' : '' ?>
                                <span class="wt-checkbox">
                                    <input id="language-<?php echo e($language->slug); ?>" type="checkbox" name="languages[]" value="<?php echo e($language->slug); ?>" <?php echo e($checked); ?> >
                                    <label for="language-<?php echo e($language->slug); ?>"><?php echo e($language->title); ?></label>
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </fieldset>
            </div>
        </div>
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgetcontent">
                <div class="wt-applyfilters">
                    <span><?php echo e(trans('lang.apply_filter')); ?><br> <?php echo e(trans('lang.changes_by_you')); ?></span>
                    <?php echo Form::submit(trans('lang.btn_apply_filters'), ['class' => 'wt-btn']); ?>

                </div>
            </div>
        </div>
    <?php echo Form::close(); ?>

</aside>
