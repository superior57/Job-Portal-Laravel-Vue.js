<?php $__env->startPush('stylesheets'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('header'); ?>
	<?php if(file_exists(resource_path('views/extend/includes/header.blade.php'))): ?>
		<?php echo $__env->make('extend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php else: ?> 
		<?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('slider'); ?>
	<?php echo $__env->yieldContent('homeSlider'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<?php echo $__env->yieldPushContent('stylesheets'); ?>
<main id="wt-main" class="wt-main wt-innerbgcolor wt-haslayout <?php echo e(!empty($body_class) ? $body_class : ''); ?>">
	<?php if(isset($_SERVER["SERVER_NAME"]) && $_SERVER["SERVER_NAME"] === 'amentotech.com'): ?>
		<div id="wt-demo-sidebar" class="wt-demo-sidebar">
			<div id="wt-btndemotoggle" class="wt-btndemotoggle">
				<span class="menu-icon">
					<i class="lnr lnr-layers"></i>
				</span>
			</div>
			<div id="wt-verticalscrollbar" class="wt-verticalscrollbar">
				<div class="wt-demo-holder">
					<a href="<?php echo e(url('/')); ?>">
						<figure class="wt-demo-img">
							<img src="<?php echo e(url('images/demo-img/img-01.jpg')); ?>" alt="img">
						</figure>
					</a>
					<a href="<?php echo e(url('page/home-page-two')); ?>">
						<figure class="wt-demo-img">
							<img src="<?php echo e(url('images/demo-img/img-02.jpg')); ?>" alt="img">
							<figcaption>
								<div class="wt-demo-tags">
									<span class="wt-demo-new">New</span>
								</div>
							</figcaption>
						</figure>
					</a>
					<a href="<?php echo e(url('page/home-page-three')); ?>">
						<figure class="wt-demo-img">
							<img src="<?php echo e(url('images/demo-img/img-03.jpg')); ?>" alt="img">
							<figcaption>
								<div class="wt-demo-tags">
									<span class="wt-demo-populor">New</span>
								</div>
							</figcaption>
						</figure>
					</a>
				</div>
			</div>
			<div class="wt-demo-content">
				<div class="wt-demo-heading">
					<h4>Outstanding Demos</h4>
					<p>With easy<em> ONE CLICK INSTALL</em> and fully customizable options, our demos are the best start you'll ever get!!</p>
					<div class="wt-demo-btns">
						<a href="https://codecanyon.net/item/worketic-market-place-for-freelancers/23712284" target="blank" class="wt-demo-btn">Click To LAUNCH</a>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php echo $__env->yieldContent('content'); ?>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<?php if(file_exists(resource_path('views/extend/front-end/includes/footer.blade.php'))): ?>
		<?php echo $__env->make('extend.front-end.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php else: ?> 
		<?php echo $__env->make('front-end.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
	jQuery('.wt-btndemotoggle').on('click', function() {
		var _this = jQuery(this);
		_this.parents('.wt-demo-sidebar').toggleClass('wt-demoshow');
	});
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>