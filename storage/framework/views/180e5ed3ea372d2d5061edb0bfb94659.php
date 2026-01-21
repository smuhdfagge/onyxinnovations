

<?php $__env->startSection('title', 'Our Products - Onyx Innovations Ltd'); ?>
<?php $__env->startSection('meta_description', 'Explore our suite of innovative software products designed to transform your business operations and drive growth.'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="<?php echo e(asset('header.jpg')); ?>" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Our Products</h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto">
            Discover our suite of innovative software solutions designed to transform your business operations and accelerate growth.
        </p>
    </div>
</section>

<!-- Featured Products -->
<?php if($featuredProducts->count() > 0): ?>
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Featured</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Flagship Products</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 group">
                <?php if($product->featured_image): ?>
                <div class="relative h-48 overflow-hidden">
                    <img src="<?php echo e(Storage::url($product->featured_image)); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <?php if($product->logo): ?>
                    <img src="<?php echo e(Storage::url($product->logo)); ?>" alt="<?php echo e($product->name); ?> logo" class="absolute bottom-4 left-4 h-12 w-12 rounded-lg bg-white p-1 shadow-lg">
                    <?php endif; ?>
                </div>
                <?php else: ?>
                <div class="h-48 bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center">
                    <?php if($product->logo): ?>
                    <img src="<?php echo e(Storage::url($product->logo)); ?>" alt="<?php echo e($product->name); ?> logo" class="h-20 w-20 rounded-lg bg-white p-2">
                    <?php else: ?>
                    <svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xl font-bold text-gray-900"><?php echo e($product->name); ?></h3>
                        <?php if($product->category): ?>
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-indigo-100 text-indigo-700"><?php echo e($product->category); ?></span>
                        <?php endif; ?>
                    </div>
                    <?php if($product->tagline): ?>
                    <p class="text-indigo-600 font-medium text-sm mb-2"><?php echo e($product->tagline); ?></p>
                    <?php endif; ?>
                    <p class="text-gray-600 mb-4"><?php echo e(Str::limit($product->short_description, 100)); ?></p>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="<?php echo e(route('products.show', $product)); ?>" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center">
                            Learn More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <?php if($product->product_url || $product->demo_url): ?>
                        <div class="flex items-center space-x-2">
                            <?php if($product->demo_url): ?>
                            <a href="<?php echo e($product->demo_url); ?>" target="_blank" class="px-4 py-2 text-sm font-medium text-indigo-600 hover:text-indigo-800 border border-indigo-200 rounded-lg hover:bg-indigo-50 transition-colors">
                                Demo
                            </a>
                            <?php endif; ?>
                            <?php if($product->product_url): ?>
                            <a href="<?php echo e($product->product_url); ?>" target="_blank" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                Access
                            </a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- All Products -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">All Products</h2>
            <p class="text-xl text-gray-600 mt-4 max-w-3xl mx-auto">
                Browse our complete range of software solutions
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                <div class="p-6">
                    <div class="flex items-start space-x-4 mb-4">
                        <?php if($product->logo): ?>
                        <img src="<?php echo e(Storage::url($product->logo)); ?>" alt="<?php echo e($product->name); ?> logo" class="h-14 w-14 rounded-lg object-contain bg-gray-100 p-2">
                        <?php else: ?>
                        <div class="h-14 w-14 rounded-lg bg-indigo-100 flex items-center justify-center">
                            <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <?php endif; ?>
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900"><?php echo e($product->name); ?></h3>
                            <?php if($product->tagline): ?>
                            <p class="text-sm text-indigo-600 font-medium"><?php echo e($product->tagline); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <p class="text-gray-600 text-sm mb-4"><?php echo e(Str::limit($product->short_description, 120)); ?></p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <?php if($product->category): ?>
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-gray-100 text-gray-700"><?php echo e($product->category); ?></span>
                        <?php endif; ?>
                        <?php if($product->platform): ?>
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-blue-100 text-blue-700"><?php echo e($product->platform); ?></span>
                        <?php endif; ?>
                        <?php if($product->version): ?>
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-green-100 text-green-700">v<?php echo e($product->version); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="<?php echo e(route('products.show', $product)); ?>" class="text-blue-600 hover:text-blue-800 font-semibold text-sm inline-flex items-center">
                            View Details
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <?php if($product->product_url): ?>
                        <a href="<?php echo e($product->product_url); ?>" target="_blank" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                            Access
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-3 text-center py-16">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">No products available yet</h3>
                <p class="mt-2 text-gray-500">Check back soon for our innovative software solutions.</p>
            </div>
            <?php endif; ?>
        </div>

        <?php if($products->hasPages()): ?>
        <div class="mt-12">
            <?php echo e($products->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-br from-blue-900 to-indigo-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Need a Custom Solution?</h2>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto mb-8">
            Don't see what you're looking for? We can build a custom software solution tailored to your specific business needs.
        </p>
        <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center px-8 py-4 bg-white text-blue-900 rounded-full font-semibold text-lg hover:bg-blue-50 transition-all shadow-xl hover:shadow-2xl">
            Contact Us
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\onyxil\resources\views/products/index.blade.php ENDPATH**/ ?>