

<?php $__env->startSection('title', 'Careers - Onyx Innovations Ltd'); ?>
<?php $__env->startSection('meta_description', 'Join our team at Onyx Innovations. Explore exciting career opportunities in software development, cloud computing, AI, and more.'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="<?php echo e(asset('header.jpg')); ?>" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Join Our Team</h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto">
            Build your career with us. We're looking for talented individuals who share our passion for technology and innovation.
        </p>
    </div>
</section>

<!-- Why Join Us -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Join Onyx Innovations?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We offer more than just a job – we offer a career where you can grow, innovate, and make a real impact.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Career Growth</h3>
                <p class="text-gray-600">Clear career paths with opportunities for advancement and leadership roles.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Learning & Development</h3>
                <p class="text-gray-600">Continuous learning with certifications, training, and conference opportunities.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Work Flexibility</h3>
                <p class="text-gray-600">Flexible work arrangements including remote work and flexible hours.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Benefits Package</h3>
                <p class="text-gray-600">Competitive salaries, health insurance, retirement plans, and more.</p>
            </div>
        </div>
    </div>
</section>

<!-- Open Positions -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Open Positions</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Find your perfect role and start your journey with us.
            </p>
        </div>

        <!-- Filters -->
        <div class="mb-12 flex flex-wrap gap-4 justify-center">
            <form method="GET" class="flex flex-wrap gap-4 items-center">
                <select name="category" onchange="this.form.submit()" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="">All Departments</option>
                    <?php $__currentLoopData = $categories ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->slug); ?>" <?php echo e(request('category') == $category->slug ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <select name="type" onchange="this.form.submit()" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="">All Types</option>
                    <option value="full-time" <?php echo e(request('type') == 'full-time' ? 'selected' : ''); ?>>Full-time</option>
                    <option value="part-time" <?php echo e(request('type') == 'part-time' ? 'selected' : ''); ?>>Part-time</option>
                    <option value="contract" <?php echo e(request('type') == 'contract' ? 'selected' : ''); ?>>Contract</option>
                    <option value="internship" <?php echo e(request('type') == 'internship' ? 'selected' : ''); ?>>Internship</option>
                </select>
                <select name="location" onchange="this.form.submit()" class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="">All Locations</option>
                    <option value="remote" <?php echo e(request('location') == 'remote' ? 'selected' : ''); ?>>Remote</option>
                    <option value="onsite" <?php echo e(request('location') == 'onsite' ? 'selected' : ''); ?>>On-site</option>
                    <option value="hybrid" <?php echo e(request('location') == 'hybrid' ? 'selected' : ''); ?>>Hybrid</option>
                </select>
                <?php if(request()->hasAny(['category', 'type', 'location'])): ?>
                <a href="<?php echo e(route('careers.index')); ?>" class="text-blue-600 hover:text-blue-700 font-medium">Clear Filters</a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Jobs List -->
        <div class="space-y-6">
            <?php $__empty_1 = true; $__currentLoopData = $jobs ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('careers.show', $job)); ?>" class="block bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all border border-gray-100 group">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex flex-wrap items-center gap-3 mb-2">
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors"><?php echo e($job->title); ?></h3>
                            <?php if($job->is_featured): ?>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Featured</span>
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-wrap items-center gap-4 text-gray-600">
                            <?php if($job->category): ?>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <?php echo e($job->category->name); ?>

                            </span>
                            <?php endif; ?>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <?php echo e($job->location); ?>

                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <?php echo e(ucfirst($job->employment_type)); ?>

                            </span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <?php if($job->salary_range): ?>
                        <span class="text-gray-500"><?php echo e($job->salary_range); ?></span>
                        <?php endif; ?>
                        <span class="inline-flex items-center text-blue-600 font-semibold group-hover:translate-x-1 transition-transform">
                            View Details
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Default jobs when database is empty -->
            <?php
            $defaultJobs = [
                ['title' => 'Senior Full Stack Developer', 'dept' => 'Engineering', 'location' => 'Remote', 'type' => 'Full-time'],
                ['title' => 'Cloud Solutions Architect', 'dept' => 'Cloud Services', 'location' => 'Hybrid', 'type' => 'Full-time'],
                ['title' => 'DevOps Engineer', 'dept' => 'Engineering', 'location' => 'Remote', 'type' => 'Full-time'],
                ['title' => 'UX/UI Designer', 'dept' => 'Design', 'location' => 'On-site', 'type' => 'Full-time'],
                ['title' => 'Machine Learning Engineer', 'dept' => 'AI & Data', 'location' => 'Hybrid', 'type' => 'Full-time'],
                ['title' => 'Project Manager', 'dept' => 'Management', 'location' => 'Hybrid', 'type' => 'Full-time'],
            ];
            ?>
            <?php $__currentLoopData = $defaultJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo e($job['title']); ?></h3>
                        <div class="flex flex-wrap items-center gap-4 text-gray-600">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <?php echo e($job['dept']); ?>

                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <?php echo e($job['location']); ?>

                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <?php echo e($job['type']); ?>

                            </span>
                        </div>
                    </div>
                    <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-colors">
                        Apply Now
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <?php if(isset($jobs) && $jobs->hasPages()): ?>
        <div class="mt-12">
            <?php echo e($jobs->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Our Culture -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Culture</h2>
                <p class="text-xl text-gray-600 mb-8">
                    At Onyx Innovations, we foster a culture of creativity, collaboration, and continuous improvement. We believe that great ideas can come from anyone, and we encourage our team members to push boundaries and explore new possibilities.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Collaborative and inclusive work environment</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Work on cutting-edge technology projects</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Regular team events and social activities</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-700">Focus on work-life balance and employee wellbeing</span>
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <div class="bg-blue-100 rounded-2xl h-48"></div>
                    <div class="bg-gray-100 rounded-2xl h-32"></div>
                </div>
                <div class="space-y-4 pt-8">
                    <div class="bg-gray-100 rounded-2xl h-32"></div>
                    <div class="bg-blue-100 rounded-2xl h-48"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-blue-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Don't See the Right Role?</h2>
        <p class="text-xl text-blue-100 mb-10">
            We're always looking for talented individuals. Send us your resume and we'll keep you in mind for future opportunities.
        </p>
        <a href="<?php echo e(route('contact')); ?>?type=careers" class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition-colors shadow-lg">
            Submit Your Resume
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\onyxil\resources\views/careers/index.blade.php ENDPATH**/ ?>