

<?php $__env->startSection('css'); ?>
	<!-- Sweet Alert CSS -->
	<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row mt-24">

		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card border-0">
				<div class="card-header border-0">
					<div class="mt-4">
						<h3 class="card-title mb-2 fs-20"><i class="fa-solid fa-microchip-ai mr-2 text-primary"></i><?php echo e(__('Templates')); ?></h3>
						<h6 class="text-muted"><?php echo e(__('Need to create a content? We got you covered! Checkout the list of templates that you can use')); ?></h6>
					</div>
				</div>
				<div class="card-body pt-2 favorite-templates-panel">

					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
						  	<button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true"><?php echo e(__('All')); ?></button>
						</li>
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="<?php echo e($category->code); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo e($category->code); ?>" type="button" role="tab" aria-controls="<?php echo e($category->code); ?>" aria-selected="false"><?php echo e(__($category->name)); ?></button>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						
					</ul>

					<div class="tab-content pt-5" id="myTabContent">

						<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
							<div class="row" id="templates-panel">
								<?php $__currentLoopData = $favorite_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="template">
											<a id="<?php echo e($template->template_code); ?>" <?php if($template->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($template->template_code); ?>-icon" class="<?php if($template->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
											<div class="card <?php if($template->professional): ?> professional <?php elseif($template->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($template->template_code); ?>-card" onclick="window.location.href='<?php echo e(url('user/templates')); ?>/<?php echo e($template->slug); ?>'">
												<div class="card-body pt-5">
													<div class="template-icon mb-4">
														<?php echo $template->icon; ?>												
													</div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font"><?php echo e(__($template->name)); ?></h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2"><?php echo e(__($template->description)); ?></p>
													</div>
													<?php if($template->professional): ?> <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> <?php endif; ?>
												</div>
											</div>
										</div>							
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<?php $__currentLoopData = $favorite_custom_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="template">
											<a id="<?php echo e($template->template_code); ?>" <?php if($template->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatusCustom(this.id)"><i id="<?php echo e($template->template_code); ?>-icon" class="<?php if($template->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
											<div class="card <?php if($template->professional): ?> professional <?php elseif($template->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($template->template_code); ?>-card" onclick="window.location.href='<?php echo e(url('user/templates')); ?>/<?php echo e($template->slug); ?>/<?php echo e($template->template_code); ?>'">
												<div class="card-body pt-5">
													<div class="template-icon mb-4">
														<?php echo $template->icon; ?>												
													</div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font"><?php echo e(__($template->name)); ?></h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2"><?php echo e(__($template->description)); ?></p>
													</div>
													<?php if($template->professional): ?> <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> <?php endif; ?>
												</div>
											</div>
										</div>							
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
								<?php $__currentLoopData = $other_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="template">
											<a id="<?php echo e($template->template_code); ?>" <?php if($template->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($template->template_code); ?>-icon" class="<?php if($template->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
											<div class="card <?php if($template->professional): ?> professional <?php elseif($template->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($template->template_code); ?>-card" onclick="window.location.href='<?php echo e(url('user/templates')); ?>/<?php echo e($template->slug); ?>'">
												<div class="card-body pt-5">
													<div class="template-icon mb-4">
														<?php echo $template->icon; ?>												
													</div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font"><?php echo e(__($template->name)); ?></h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2"><?php echo e(__($template->description)); ?></p>
													</div>
													<?php if($template->professional): ?> <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> <?php endif; ?>
												</div>
											</div>
										</div>							
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
								
								<?php $__currentLoopData = $custom_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="template">
											<a id="<?php echo e($template->template_code); ?>" <?php if($template->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatusCustom(this.id)"><i id="<?php echo e($template->template_code); ?>-icon" class="<?php if($template->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
											<div class="card <?php if($template->professional): ?> professional <?php elseif($template->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($template->template_code); ?>-card" onclick="window.location.href='<?php echo e(url('user/templates')); ?>/<?php echo e($template->slug); ?>/<?php echo e($template->template_code); ?>'">
												<div class="card-body pt-5">
													<div class="template-icon mb-4">
														<?php echo $template->icon; ?>												
													</div>
													<div class="template-title">
														<h6 class="mb-2 fs-15 number-font"><?php echo e(__($template->name)); ?></h6>
													</div>
													<div class="template-info">
														<p class="fs-13 text-muted mb-2"><?php echo e(__($template->description)); ?></p>
													</div>
													<?php if($template->professional): ?> <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> <?php endif; ?>
												</div>
											</div>
										</div>							
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
							</div>	
						</div>

						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="tab-pane fade" id="<?php echo e($category->code); ?>" role="tabpanel" aria-labelledby="<?php echo e($category->code); ?>-tab">
								<div class="row" id="templates-panel">
									<?php $__currentLoopData = $favorite_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($template->group == $category->code): ?>
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="<?php echo e($template->template_code); ?>" <?php if($template->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($template->template_code); ?>-icon" class="<?php if($template->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
													<div class="card <?php if($template->professional): ?> professional <?php elseif($template->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($template->template_code); ?>-card" onclick="window.location.href='<?php echo e(url('user/templates')); ?>/<?php echo e($template->slug); ?>'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																<?php echo $template->icon; ?>												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font"><?php echo e(__($template->name)); ?></h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2"><?php echo e(__($template->description)); ?></p>
															</div>
															<?php if($template->professional): ?> <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> <?php endif; ?>
														</div>
													</div>
												</div>							
											</div>
										<?php endif; ?>									
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									<?php $__currentLoopData = $favorite_custom_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($template->group == $category->code): ?>
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="<?php echo e($template->template_code); ?>" <?php if($template->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatusCustom(this.id)"><i id="<?php echo e($template->template_code); ?>-icon" class="<?php if($template->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
													<div class="card <?php if($template->professional): ?> professional <?php elseif($template->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($template->template_code); ?>-card" onclick="window.location.href='<?php echo e(url('user/templates')); ?>/<?php echo e($template->slug); ?>/<?php echo e($template->template_code); ?>'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																<?php echo $template->icon; ?>												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font"><?php echo e(__($template->name)); ?></h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2"><?php echo e(__($template->description)); ?></p>
															</div>
															<?php if($template->professional): ?> <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> <?php endif; ?>
														</div>
													</div>
												</div>							
											</div>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
									<?php $__currentLoopData = $other_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($template->group == $category->code): ?>
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="<?php echo e($template->template_code); ?>" <?php if($template->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatus(this.id)"><i id="<?php echo e($template->template_code); ?>-icon" class="<?php if($template->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
													<div class="card <?php if($template->professional): ?> professional <?php elseif($template->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($template->template_code); ?>-card" onclick="window.location.href='<?php echo e(url('user/templates')); ?>/<?php echo e($template->slug); ?>'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																<?php echo $template->icon; ?>												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font"><?php echo e(__($template->name)); ?></h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2"><?php echo e(__($template->description)); ?></p>
															</div>
															<?php if($template->professional): ?> <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> <?php endif; ?>
														</div>
													</div>
												</div>							
											</div>	
										<?php endif; ?>									
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		

									<?php $__currentLoopData = $custom_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($template->group == $category->code): ?>
											<div class="col-lg-3 col-md-6 col-sm-12">
												<div class="template">
													<a id="<?php echo e($template->template_code); ?>" <?php if($template->favorite): ?> data-tippy-content="<?php echo e(__('Remove from favorite')); ?>" <?php else: ?> data-tippy-content="<?php echo e(__('Select as favorite')); ?>" <?php endif; ?> onclick="favoriteStatusCustom(this.id)"><i id="<?php echo e($template->template_code); ?>-icon" class="<?php if($template->favorite): ?> fa-solid fa-stars <?php else: ?> fa-regular fa-star <?php endif; ?> star"></i></a>
													<div class="card <?php if($template->professional): ?> professional <?php elseif($template->favorite): ?> favorite <?php else: ?> border-0 <?php endif; ?>" id="<?php echo e($template->template_code); ?>-card" onclick="window.location.href='<?php echo e(url('user/templates')); ?>/<?php echo e($template->slug); ?>/<?php echo e($template->template_code); ?>'">
														<div class="card-body pt-5">
															<div class="template-icon mb-4">
																<?php echo $template->icon; ?>												
															</div>
															<div class="template-title">
																<h6 class="mb-2 fs-15 number-font"><?php echo e(__($template->name)); ?></h6>
															</div>
															<div class="template-info">
																<p class="fs-13 text-muted mb-2"><?php echo e(__($template->description)); ?></p>
															</div>
															<?php if($template->professional): ?> <p class="fs-8 btn btn-yellow"><i class="fa-sharp fa-solid fa-crown mr-2"></i><?php echo e(__('Pro')); ?></p> <?php endif; ?>
														</div>
													</div>
												</div>							
											</div>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
					

					</div>
									
				</div>
			</div>
		</div>

	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script src="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
	<script>
		function favoriteStatus(id) {

			let icon, card;
			let formData = new FormData();
			formData.append("id", id);

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'post',
				url: 'dashboard/favorite',
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {

					if (data['status'] == 'success') {
						if (data['set']) {
							Swal.fire('<?php echo e(__('Template Removed from Favorites')); ?>', '<?php echo e(__('Selected template has been successfully removed from favorites')); ?>', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-solid");
							icon.classList.remove("fa-stars");
							icon.classList.add("fa-regular");
							icon.classList.add("fa-star");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.remove("favorite");
								card.classList.add('border-0');
							}							
						} else {
							Swal.fire('<?php echo e(__('Template Added to Favorites')); ?>', '<?php echo e(__('Selected template has been successfully added to favorites')); ?>', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-regular");
							icon.classList.remove("fa-star");
							icon.classList.add("fa-solid");
							icon.classList.add("fa-stars");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.add('favorite');
								card.classList.remove('border-0');
							}
						}
														
					} else {
						Swal.fire('<?php echo e(__('Favorite Setting Issue')); ?>', '<?php echo e(__('There as an issue with setting favorite status for this template')); ?>', 'warning');
					}      
				},
				error: function(data) {
					Swal.fire('Oops...','Something went wrong!', 'error')
				}
			})
		}

		function favoriteStatusCustom(id) {

			let icon, card;
			let formData = new FormData();
			formData.append("id", id);

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'post',
				url: 'templates/favoritecustom',
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {

					if (data['status'] == 'success') {
						if (data['set']) {
							Swal.fire('<?php echo e(__('Template Removed from Favorites')); ?>', '<?php echo e(__('Selected template has been successfully removed from favorites')); ?>', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-solid");
							icon.classList.remove("fa-stars");
							icon.classList.add("fa-regular");
							icon.classList.add("fa-star");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.remove("favorite");
								card.classList.add('border-0');
							}							
						} else {
							Swal.fire('<?php echo e(__('Template Added to Favorites')); ?>', '<?php echo e(__('Selected template has been successfully added to favorites')); ?>', 'success');
							icon = document.getElementById(id + '-icon');
							icon.classList.remove("fa-regular");
							icon.classList.remove("fa-star");
							icon.classList.add("fa-solid");
							icon.classList.add("fa-stars");

							card = document.getElementById(id + '-card');
							if(card.classList.contains("professional")) {
								// do nothing
							} else {
								card.classList.add('favorite');
								card.classList.remove('border-0');
							}
						}
														
					} else {
						Swal.fire('<?php echo e(__('Favorite Setting Issue')); ?>', '<?php echo e(__('There as an issue with setting favorite status for this template')); ?>', 'warning');
					}      
				},
				error: function(data) {
					Swal.fire('Oops...','Something went wrong!', 'error')
				}
			})
		}
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\paracleteai\paracleteai_public_html\resources\views/user/templates/index.blade.php ENDPATH**/ ?>