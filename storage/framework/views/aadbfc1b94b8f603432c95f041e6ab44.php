

<?php $__env->startSection('title', ($industry->meta_title ?? $industry->name) . ' - Industries - Onyx Innovations Ltd'); ?>
<?php $__env->startSection('meta_description', $industry->meta_description ?? $industry->short_description); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative pt-32 pb-20 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.4\"%3E%3Ccircle cx=\"30\" cy=\"30\" r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm mb-6">
            <a href="<?php echo e(route('industries.index')); ?>" class="text-blue-200 hover:text-white">Industries</a>
            <span class="text-blue-300 mx-2">/</span>
            <span class="text-white"><?php echo e($industry->name); ?></span>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6"><?php echo e($industry->name); ?></h1>
        <p class="text-xl text-blue-100 max-w-3xl"><?php echo e($industry->short_description); ?></p>
    </div>
</section>

<!-- Overview -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <?php if($industry->image): ?>
                <img src="<?php echo e(Storage::url($industry->image)); ?>" alt="<?php echo e($industry->name); ?>" class="w-full rounded-2xl shadow-xl">
                <?php else: ?>
                <div class="w-full h-80 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl flex items-center justify-center">
                    <?php if($industry->icon): ?>
                    <span class="text-8xl text-white opacity-50"><?php echo $industry->icon; ?></span>
                    <?php else: ?>
                    <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Transforming <?php echo e($industry->name); ?></h2>
                <div class="prose prose-lg text-gray-600">
                    <?php if($industry->description): ?>
                    <?php echo $industry->description; ?>

                    <?php else: ?>
                    <p>We bring cutting-edge technology solutions specifically designed for the <?php echo e(strtolower($industry->name)); ?> sector. Our deep understanding of industry challenges, regulations, and best practices enables us to deliver solutions that drive real business value.</p>
                    <p>From digital transformation initiatives to custom software development, we partner with organizations to modernize operations, enhance customer experiences, and achieve sustainable growth.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Challenges We Solve -->
<?php if($industry->challenges): ?>
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Challenges We Help You Overcome</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We understand the unique challenges facing the <?php echo e(strtolower($industry->name)); ?> industry and have the expertise to address them.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = explode("\n", $industry->challenges); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $challenge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(trim($challenge)): ?>
            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <p class="text-gray-700"><?php echo e(trim($challenge)); ?></p>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Our Solutions for This Industry -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Solutions for <?php echo e($industry->name); ?></h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Comprehensive technology solutions tailored to your industry needs.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $industry->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('services.show', $service)); ?>" class="group bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl hover:border-blue-200 transition-all">
                <?php if($service->icon): ?>
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                    <span class="text-3xl group-hover:brightness-0 group-hover:invert transition-all"><?php echo $service->icon; ?></span>
                </div>
                <?php endif; ?>
                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors"><?php echo e($service->title); ?></h3>
                <p class="text-gray-600 mb-4"><?php echo e(Str::limit($service->short_description, 100)); ?></p>
                <span class="inline-flex items-center text-blue-600 font-semibold">
                    Learn More
                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php
            $defaultSolutions = [
                ['title' => 'Custom Software Development', 'desc' => 'Tailored applications built specifically for your business processes and requirements.'],
                ['title' => 'Digital Transformation', 'desc' => 'Modernize legacy systems and embrace digital-first strategies for competitive advantage.'],
                ['title' => 'Cloud Solutions', 'desc' => 'Scalable, secure cloud infrastructure and migration services for your organization.'],
                ['title' => 'Data Analytics', 'desc' => 'Turn your data into actionable insights with advanced analytics and visualization.'],
                ['title' => 'System Integration', 'desc' => 'Seamlessly connect your applications and data across your enterprise ecosystem.'],
                ['title' => 'Consulting Services', 'desc' => 'Strategic technology guidance from experienced industry consultants.'],
            ];
            ?>
            <?php $__currentLoopData = $defaultSolutions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo e($solution['title']); ?></h3>
                <p class="text-gray-600"><?php echo e($solution['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Related Case Studies -->
<?php if($industry->portfolios->count() > 0): ?>
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Success Stories</h2>
            <p class="text-xl text-gray-600">See how we've helped organizations in <?php echo e(strtolower($industry->name)); ?> achieve their goals.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $industry->portfolios->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('portfolio.show', $portfolio)); ?>" class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all">
                <?php if($portfolio->featured_image): ?>
                <img src="<?php echo e(Storage::url($portfolio->featured_image)); ?>" alt="<?php echo e($portfolio->title); ?>" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <?php else: ?>
                <div class="w-full h-48 bg-gradient-to-br from-blue-600 to-indigo-700"></div>
                <?php endif; ?>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors"><?php echo e($portfolio->title); ?></h3>
                    <p class="text-gray-600 text-sm mb-4"><?php echo e(Str::limit($portfolio->short_description, 80)); ?></p>
                    <span class="inline-flex items-center text-blue-600 font-semibold text-sm">
                        View Case Study
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </span>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($industry->portfolios->count() > 3): ?>
        <div class="text-center mt-12">
            <a href="<?php echo e(route('portfolio.index', ['industry' => $industry->slug])); ?>" class="inline-flex items-center justify-center px-6 py-3 border-2 border-blue-600 text-blue-600 rounded-full font-semibold hover:bg-blue-600 hover:text-white transition-colors">
                View All Case Studies
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<section class="py-24 bg-blue-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Ready to Transform Your <?php echo e($industry->name); ?> Organization?</h2>
        <p class="text-xl text-blue-100 mb-10">
            Let's discuss how our expertise can help you achieve your business objectives.
        </p>
        <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition-colors shadow-lg">
            Schedule a Consultation
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\onyxil\resources\views/industries/show.blade.php ENDPATH**/ ?>