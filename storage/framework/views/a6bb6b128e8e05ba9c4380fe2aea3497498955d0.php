<aside id="wt-sidebar" class="wt-sidebar wt-usersidebar">
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
                            <input type="text" name="s" class="form-control" placeholder="<?php echo e(trans('lang.ph_search_freelancer')); ?>" value="<?php echo e($keyword); ?>">
                        </div>
                    </fieldset>
                </div>
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
                                <?php $checked = ( !empty($_GET['skills']) && in_array($skill->slug, $_GET['skills'])) ? 'checked' : '' ?>
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
                <h2><?php echo e(trans('lang.location')); ?></h2>
            </div>
            <div class="wt-widgetcontent">
                <fieldset>
                    <div class="form-group">
                        <input type="text" class="form-control filter-records" placeholder="<?php echo e(trans('lang.search_loc')); ?>">
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
                                    <label for="location-<?php echo e($location->slug); ?>"> <img src="<?php echo e(asset(App\Helper::getLocationFlag($location->flag))); ?>" alt="<?php echo e(trans('lang.img')); ?>"> <?php echo e($location->title); ?></label>
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </fieldset>
            </div>
        </div>
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgettitle">
                <h2><?php echo e(trans('lang.hourly_rate')); ?></h2>
            </div>
            <div class="wt-widgetcontent">
                <div class="wt-formtheme wt-formsearch">
                    <fieldset>
                        <div class="form-group">
                            <input type="text" class="form-control filter-records" placeholder="<?php echo e(trans('lang.ph_search_rate')); ?>">
                            <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="wt-checkboxholder wt-verticalscrollbar">
                            <?php $__currentLoopData = Helper::getHourlyRate(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $hourly_rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $checked = ( !empty($_GET['hourly_rate']) && in_array($key, $_GET['hourly_rate'])) ? 'checked' : '' ?>
                                <span class="wt-checkbox">
                                    <input id="rate-<?php echo e($key); ?>" type="checkbox" name="hourly_rate[]" value="<?php echo e($key); ?>" <?php echo e($checked); ?>>
                                    <label for="rate-<?php echo e($key); ?>"><?php echo e($hourly_rate); ?></label>
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgettitle">
                <h2><?php echo e(trans('lang.freelancer_type')); ?></h2>
            </div>
            <div class="wt-widgetcontent">
                <div class="wt-formtheme wt-formsearch">
                    <div class="wt-checkboxholder wt-verticalscrollbar">
                        <?php $__currentLoopData = Helper::getFreelancerLevelList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $freelancer_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $checked = ( !empty($_GET['freelaner_type']) && in_array($key, $_GET['freelaner_type'])) ? 'checked' : '' ?>
                            <span class="wt-checkbox">
                                <input id="rate-<?php echo e($key); ?>" type="checkbox" name="freelaner_type[]" value="<?php echo e($key); ?>" <?php echo e($checked); ?>>
                                <label for="rate-<?php echo e($key); ?>"><?php echo e($freelancer_level); ?></label>
                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgettitle">
                <h2><?php echo e(trans('lang.english_level')); ?></h2>
            </div>
            <div class="wt-widgetcontent">
                <div class="wt-formtheme wt-formsearch">
                    <fieldset>
                        <div class="wt-checkboxholder wt-verticalscrollbar">
                            <?php $__currentLoopData = Helper::getEnglishLevelList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $english_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $checked = ( !empty($_GET['english_level']) && in_array($key, $_GET['english_level'])) ? 'checked' : '' ?>
                                <span class="wt-checkbox">
                                    <input id="rate-<?php echo e($key); ?>" type="checkbox" name="english_level[]" value="<?php echo e($key); ?>" <?php echo e($checked); ?>>
                                    <label for="rate-<?php echo e($key); ?>"><?php echo e($english_level); ?></label>
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </fieldset>
                </div>
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
    <?php echo form::close();; ?>

</aside>