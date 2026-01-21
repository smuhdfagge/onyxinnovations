

<?php $__env->startSection('title', ($product->meta_title ?? $product->name) . ' - Products - Onyx Innovations Ltd'); ?>
<?php $__env->startSection('meta_description', $product->meta_description ?? $product->short_description); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="<?php echo e(asset('header.jpg')); ?>" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm mb-6">
            <a href="<?php echo e(route('products.index')); ?>" class="text-blue-200 hover:text-white">Products</a>
            <span class="text-blue-300 mx-2">/</span>
            <span class="text-white"><?php echo e($product->name); ?></span>
        </nav>
        <div class="flex flex-wrap items-start gap-6">
            <?php if($product->logo): ?>
            <img src="<?php echo e(Storage::url($product->logo)); ?>" alt="<?php echo e($product->name); ?> logo" class="h-20 w-20 rounded-xl bg-white p-2 shadow-lg">
            <?php endif; ?>
            <div class="flex-1">
                <div class="flex flex-wrap gap-3 mb-4">
                    <?php if($product->category): ?>
                    <span class="bg-blue-500 text-white text-sm px-4 py-1 rounded-full"><?php echo e($product->category); ?></span>
                    <?php endif; ?>
                    <?php if($product->platform): ?>
                    <span class="bg-indigo-500 text-white text-sm px-4 py-1 rounded-full"><?php echo e($product->platform); ?></span>
                    <?php endif; ?>
                    <?php if($product->version): ?>
                    <span class="bg-blue-700 text-blue-100 text-sm px-4 py-1 rounded-full">Version <?php echo e($product->version); ?></span>
                    <?php endif; ?>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4"><?php echo e($product->name); ?></h1>
                <?php if($product->tagline): ?>
                <p class="text-xl text-blue-200 font-medium mb-4"><?php echo e($product->tagline); ?></p>
                <?php endif; ?>
                <p class="text-lg text-blue-100 max-w-3xl"><?php echo e($product->short_description); ?></p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 flex flex-wrap gap-4">
            <?php if($product->product_url): ?>
            <a href="<?php echo e($product->product_url); ?>" target="_blank" class="inline-flex items-center px-8 py-3 bg-white text-blue-900 rounded-full font-semibold hover:bg-blue-50 transition-all shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                Access Product
            </a>
            <?php endif; ?>
            <?php if($product->demo_url): ?>
            <a href="<?php echo e($product->demo_url); ?>" target="_blank" class="inline-flex items-center px-8 py-3 bg-transparent border-2 border-white text-white rounded-full font-semibold hover:bg-white hover:text-blue-900 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Try Demo
            </a>
            <?php endif; ?>
            <?php if($product->documentation_url): ?>
            <a href="<?php echo e($product->documentation_url); ?>" target="_blank" class="inline-flex items-center px-8 py-3 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                Documentation
            </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Product Content -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Featured Image -->
                <?php if($product->featured_image): ?>
                <div class="rounded-2xl overflow-hidden shadow-xl">
                    <img src="<?php echo e(Storage::url($product->featured_image)); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-auto">
                </div>
                <?php endif; ?>

                <!-- Description -->
                <?php if($product->description): ?>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">About <?php echo e($product->name); ?></h2>
                    <div class="prose prose-lg max-w-none text-gray-600">
                        <?php echo nl2br(e($product->description)); ?>

                    </div>
                </div>
                <?php endif; ?>

                <!-- Screenshots -->
                <?php if($product->screenshots && count($product->screenshots) > 0): ?>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Screenshots</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <?php $__currentLoopData = $product->screenshots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $screenshot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(Storage::url($screenshot)); ?>" target="_blank" class="block rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                            <img src="<?php echo e(Storage::url($screenshot)); ?>" alt="<?php echo e($product->name); ?> screenshot" class="w-full h-48 object-cover">
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Features -->
                <?php if($product->features && count($product->features) > 0): ?>
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Key Features</h3>
                    <ul class="space-y-3">
                        <?php $__currentLoopData = $product->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700"><?php echo e($feature); ?></span>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Quick Links -->
                <div class="bg-blue-50 rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Links</h3>
                    <div class="space-y-3">
                        <?php if($product->product_url): ?>
                        <a href="<?php echo e($product->product_url); ?>" target="_blank" class="flex items-center text-blue-600 hover:text-blue-800 font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Access Product
                        </a>
                        <?php endif; ?>
                        <?php if($product->demo_url): ?>
                        <a href="<?php echo e($product->demo_url); ?>" target="_blank" class="flex items-center text-blue-600 hover:text-blue-800 font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Try Demo
                        </a>
                        <?php endif; ?>
                        <?php if($product->documentation_url): ?>
                        <a href="<?php echo e($product->documentation_url); ?>" target="_blank" class="flex items-center text-blue-600 hover:text-blue-800 font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Documentation
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Contact CTA -->
                <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl p-6 text-white">
                    <h3 class="text-lg font-bold mb-3">Have Questions?</h3>
                    <p class="text-blue-100 text-sm mb-4">Contact us to learn more about <?php echo e($product->name); ?> or request a personalized demo.</p>
                    <a href="<?php echo e(route('contact')); ?>?product=<?php echo e($product->slug); ?>" class="inline-flex items-center px-4 py-2 bg-white text-blue-600 rounded-lg font-semibold text-sm hover:bg-blue-50 transition-colors">
                        Get in Touch
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<?php if($relatedProducts->count() > 0): ?>
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Related Products</h2>
            <p class="text-gray-600 mt-2">Explore more solutions that might interest you</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="p-6">
                    <div class="flex items-start space-x-4 mb-4">
                        <?php if($related->logo): ?>
                        <img src="<?php echo e(Storage::url($related->logo)); ?>" alt="<?php echo e($related->name); ?> logo" class="h-12 w-12 rounded-lg object-contain bg-gray-100 p-2">
                        <?php else: ?>
                        <div class="h-12 w-12 rounded-lg bg-indigo-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <?php endif; ?>
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900"><?php echo e($related->name); ?></h3>
                            <?php if($related->tagline): ?>
                            <p class="text-sm text-indigo-600 font-medium"><?php echo e($related->tagline); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4"><?php echo e(Str::limit($related->short_description, 100)); ?></p>
                    <a href="<?php echo e(route('products.show', $related)); ?>" class="text-blue-600 hover:text-blue-800 font-semibold text-sm inline-flex items-center">
                        View Details
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\onyxil\resources\views/products/show.blade.php ENDPATH**/ ?>