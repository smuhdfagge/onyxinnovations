

<?php $__env->startSection('title', 'About Us - Onyx Innovations Ltd'); ?>
<?php $__env->startSection('meta_description', 'Learn about Onyx Innovations Ltd, a leading technology company delivering innovative solutions. Meet our team and discover our mission, vision, and values.'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="<?php echo e(asset('header.jpg')); ?>" alt="Header Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 via-blue-800/80 to-indigo-900/85"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">About Onyx Innovations</h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto">
            We are a team of passionate technologists dedicated to transforming businesses through innovative digital solutions.
        </p>
    </div>
</section>

<!-- Company Overview -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Our Story</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-6">Building the Future of Technology</h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    Founded with a vision to democratize technology and make it accessible to businesses of all sizes, Onyx Innovations has grown from a small startup to a trusted technology partner serving clients across multiple industries.
                </p>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    Our journey began with a simple belief: that technology should solve real business problems and create tangible value. Today, we continue to uphold that belief while pushing the boundaries of what's possible.
                </p>
                <p class="text-lg text-gray-600 leading-relaxed">
                    With a team of experienced professionals and a commitment to excellence, we have successfully delivered hundreds of projects that have transformed how businesses operate and serve their customers.
                </p>
            </div>
            <div class="relative">
                <div class="bg-gradient-to-br from-blue-100 to-indigo-100 rounded-3xl p-8">
                    <img src="<?php echo e(asset('logo.png')); ?>" alt="Onyx Innovations" class="w-full max-w-md mx-auto">
                </div>
                <div class="absolute -bottom-6 -right-6 bg-blue-600 text-white rounded-2xl p-6 shadow-xl">
                    <div class="text-4xl font-bold">8+</div>
                    <div class="text-blue-200">Years of Excellence</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission, Vision, Values -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Mission -->
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">
                    To empower businesses with innovative technology solutions that drive growth, efficiency, and competitive advantage. We are committed to delivering excellence in every project we undertake.
                </p>
            </div>

            <!-- Vision -->
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
                <p class="text-gray-600 leading-relaxed">
                    To become a globally recognized technology leader, known for innovation, reliability, and transformative impact. We envision a world where technology serves as a catalyst for positive change.
                </p>
            </div>

            <!-- Values -->
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Values</h3>
                <ul class="text-gray-600 space-y-2">
                    <li class="flex items-center"><span class="w-2 h-2 bg-blue-600 rounded-full mr-3"></span>Innovation & Creativity</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-blue-600 rounded-full mr-3"></span>Integrity & Transparency</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-blue-600 rounded-full mr-3"></span>Client-Centric Approach</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-blue-600 rounded-full mr-3"></span>Excellence in Delivery</li>
                    <li class="flex items-center"><span class="w-2 h-2 bg-blue-600 rounded-full mr-3"></span>Continuous Learning</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Team -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Leadership</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">Meet Our Team</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Our leadership team brings decades of combined experience in technology and business.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $leadership; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg group">
                <?php if($member->photo): ?>
                <img src="<?php echo e(Storage::url($member->photo)); ?>" alt="<?php echo e($member->name); ?>" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                <?php else: ?>
                <div class="w-full h-64 bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center">
                    <span class="text-6xl text-white font-bold"><?php echo e(substr($member->name, 0, 1)); ?></span>
                </div>
                <?php endif; ?>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-900 mb-1"><?php echo e($member->name); ?></h3>
                    <p class="text-blue-600 font-medium mb-3"><?php echo e($member->position); ?></p>
                    <?php if($member->linkedin || $member->twitter): ?>
                    <div class="flex justify-center space-x-3">
                        <?php if($member->linkedin): ?>
                        <a href="<?php echo e($member->linkedin); ?>" target="_blank" class="text-gray-400 hover:text-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <?php endif; ?>
                        <?php if($member->twitter): ?>
                        <a href="<?php echo e($member->twitter); ?>" target="_blank" class="text-gray-400 hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Default leadership -->
            <?php $__currentLoopData = [
                ['name' => 'James Anderson', 'position' => 'Chief Executive Officer'],
                ['name' => 'Sarah Williams', 'position' => 'Chief Technology Officer'],
                ['name' => 'Michael Chen', 'position' => 'Chief Operations Officer'],
                ['name' => 'Emily Roberts', 'position' => 'Chief Financial Officer'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg group">
                <div class="w-full h-64 bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center">
                    <span class="text-6xl text-white font-bold"><?php echo e(substr($member['name'], 0, 1)); ?></span>
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-900 mb-1"><?php echo e($member['name']); ?></h3>
                    <p class="text-blue-600 font-medium"><?php echo e($member['position']); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Corporate Credentials -->
<section class="py-24 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-blue-400 font-semibold text-sm uppercase tracking-wider">Credibility</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Corporate Registration & Compliance</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-gray-800 rounded-2xl p-8 text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Registered Company</h3>
                <p class="text-gray-400">Fully registered and compliant with all corporate regulations</p>
            </div>

            <div class="bg-gray-800 rounded-2xl p-8 text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">ISO Certified</h3>
                <p class="text-gray-400">Quality management systems meeting international standards</p>
            </div>

            <div class="bg-gray-800 rounded-2xl p-8 text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Data Security</h3>
                <p class="text-gray-400">Compliant with GDPR and data protection regulations</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Want to Join Our Journey?</h2>
        <p class="text-xl text-gray-600 mb-10">
            Whether as a client, partner, or team member, we'd love to connect with you.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-all shadow-lg">
                Contact Us
            </a>
            <a href="<?php echo e(route('careers.index')); ?>" class="inline-flex items-center justify-center px-8 py-4 border-2 border-blue-600 text-blue-600 rounded-full font-semibold hover:bg-blue-600 hover:text-white transition-all">
                View Careers
            </a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\onyxil\resources\views/about.blade.php ENDPATH**/ ?>