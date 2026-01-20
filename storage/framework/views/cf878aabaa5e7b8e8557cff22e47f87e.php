

<?php $__env->startSection('title', 'Onyx Innovations Ltd - Your Trusted Technology Partner'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="<?php echo e(asset('cover.jpg')); ?>" alt="Hero Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/80 via-blue-800/70 to-indigo-900/80"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-20">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
            Transforming Ideas Into
            <span class="bg-gradient-to-r from-blue-400 to-cyan-400 text-transparent bg-clip-text">Digital Reality</span>
        </h1>
        <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
            We are your trusted technology partner, delivering innovative software solutions that drive business growth and digital transformation.
        </p>
        
        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
            <a href="<?php echo e(route('contact')); ?>?type=demo" class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-900 rounded-full font-semibold text-lg hover:bg-blue-50 transition-all shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Request a Demo
            </a>
            <a href="<?php echo e(route('contact')); ?>?type=partnership" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-full font-semibold text-lg hover:bg-white hover:text-blue-900 transition-all">
                Partner With Us
            </a>
            <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 text-white rounded-full font-semibold text-lg hover:bg-blue-700 transition-all">
                Contact Us
            </a>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2"><?php echo e($stats['projects']); ?>+</div>
                <div class="text-blue-200">Projects Delivered</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2"><?php echo e($stats['clients']); ?>+</div>
                <div class="text-blue-200">Happy Clients</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2"><?php echo e($stats['sectors']); ?>+</div>
                <div class="text-blue-200">Sectors Served</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-white mb-2"><?php echo e($stats['years']); ?>+</div>
                <div class="text-blue-200">Years Experience</div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Services Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">What We Do</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">Our Core Services</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                We deliver comprehensive technology solutions tailored to your business needs.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group border border-gray-100">
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                    <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo e($service->title); ?></h3>
                <p class="text-gray-600 mb-4 leading-relaxed"><?php echo e(Str::limit($service->short_description, 120)); ?></p>
                <a href="<?php echo e(route('services.show', $service)); ?>" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 group-hover:translate-x-2 transition-transform">
                    Learn More
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Default services if none in database -->
            <?php $__currentLoopData = [
                ['title' => 'Software Development', 'desc' => 'Custom software solutions designed to solve your unique business challenges and drive efficiency.'],
                ['title' => 'Web & Mobile Apps', 'desc' => 'Beautiful, responsive applications that deliver exceptional user experiences across all devices.'],
                ['title' => 'Enterprise Systems', 'desc' => 'Scalable enterprise solutions including ERP, CRM, and business process automation.'],
                ['title' => 'ICT Consulting', 'desc' => 'Strategic technology consulting to help you make informed decisions and maximize ROI.'],
                ['title' => 'Cloud & Infrastructure', 'desc' => 'Modern cloud solutions for enhanced scalability, security, and operational efficiency.'],
                ['title' => 'Data & Analytics', 'desc' => 'Transform your data into actionable insights with our advanced analytics solutions.'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $defaultService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group border border-gray-100">
                <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                    <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo e($defaultService['title']); ?></h3>
                <p class="text-gray-600 mb-4 leading-relaxed"><?php echo e($defaultService['desc']); ?></p>
                <a href="<?php echo e(route('services.index')); ?>" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 group-hover:translate-x-2 transition-transform">
                    Learn More
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('services.index')); ?>" class="inline-flex items-center px-8 py-4 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-all shadow-lg">
                View All Services
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Why Choose Us</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-6">Your Success Is Our Priority</h2>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    At Onyx Innovations, we combine technical expertise with a deep understanding of business needs. Our team of experienced professionals is dedicated to delivering solutions that drive real results.
                </p>

                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Proven Track Record</h3>
                            <p class="text-gray-600">150+ successful projects delivered across 12 industry sectors.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Agile Development</h3>
                            <p class="text-gray-600">Fast, iterative development with continuous client collaboration.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Security First</h3>
                            <p class="text-gray-600">Enterprise-grade security standards in all our solutions.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">24/7 Support</h3>
                            <p class="text-gray-600">Dedicated support team available around the clock.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-8 text-white">
                    <div class="grid grid-cols-2 gap-8">
                        <div class="text-center p-6 bg-white/10 rounded-2xl backdrop-blur">
                            <div class="text-4xl font-bold mb-2">99%</div>
                            <div class="text-blue-200">Client Satisfaction</div>
                        </div>
                        <div class="text-center p-6 bg-white/10 rounded-2xl backdrop-blur">
                            <div class="text-4xl font-bold mb-2">50+</div>
                            <div class="text-blue-200">Expert Team</div>
                        </div>
                        <div class="text-center p-6 bg-white/10 rounded-2xl backdrop-blur">
                            <div class="text-4xl font-bold mb-2">24/7</div>
                            <div class="text-blue-200">Support Available</div>
                        </div>
                        <div class="text-center p-6 bg-white/10 rounded-2xl backdrop-blur">
                            <div class="text-4xl font-bold mb-2">100%</div>
                            <div class="text-blue-200">Project Delivery</div>
                        </div>
                    </div>
                </div>
                <!-- Decorative elements -->
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-yellow-400 rounded-full opacity-80"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-blue-300 rounded-full opacity-60"></div>
            </div>
        </div>
    </div>
</section>

<!-- Technology Stack -->
<section class="py-24 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-blue-400 font-semibold text-sm uppercase tracking-wider">Our Technology Stack</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Built With Modern Technologies</h2>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                We leverage cutting-edge technologies to build robust, scalable solutions.
            </p>
        </div>

        <div class="grid grid-cols-3 md:grid-cols-6 gap-8 items-center opacity-70">
            <?php $__currentLoopData = ['Laravel', 'React', 'Vue.js', 'Node.js', 'Python', 'AWS', 'Azure', 'Docker', 'PostgreSQL', 'MongoDB', 'Flutter', 'Kubernetes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="text-center p-4 hover:opacity-100 transition-opacity">
                <div class="bg-gray-800 rounded-xl p-4 hover:bg-gray-700 transition-colors">
                    <span class="text-sm font-medium"><?php echo e($tech); ?></span>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Portfolio Preview -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Our Work</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">Featured Projects</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Explore some of our successful projects that have transformed businesses.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="group relative overflow-hidden rounded-2xl shadow-lg">
                <div class="aspect-w-16 aspect-h-12">
                    <?php if($portfolio->featured_image): ?>
                    <img src="<?php echo e(Storage::url($portfolio->featured_image)); ?>" alt="<?php echo e($portfolio->title); ?>" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <?php else: ?>
                    <div class="w-full h-64 bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center">
                        <span class="text-white text-xl font-semibold"><?php echo e($portfolio->title); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-xl font-bold text-white mb-2"><?php echo e($portfolio->title); ?></h3>
                        <p class="text-gray-300 text-sm mb-4"><?php echo e(Str::limit($portfolio->short_description, 80)); ?></p>
                        <a href="<?php echo e(route('portfolio.show', $portfolio)); ?>" class="inline-flex items-center text-blue-400 font-semibold hover:text-blue-300">
                            View Project
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Default portfolio items -->
            <?php $__currentLoopData = [
                ['title' => 'Government Portal System', 'desc' => 'Comprehensive e-government platform for citizen services'],
                ['title' => 'Banking Mobile App', 'desc' => 'Secure mobile banking solution for financial institution'],
                ['title' => 'Healthcare Management', 'desc' => 'Hospital information system with patient management'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group relative overflow-hidden rounded-2xl shadow-lg">
                <div class="w-full h-64 bg-gradient-to-br <?php echo e($index % 3 == 0 ? 'from-blue-600 to-indigo-700' : ($index % 3 == 1 ? 'from-indigo-600 to-purple-700' : 'from-cyan-600 to-blue-700')); ?> flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                    <span class="text-white/50 text-6xl font-bold"><?php echo e($index + 1); ?></span>
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-xl font-bold text-white mb-2"><?php echo e($item['title']); ?></h3>
                        <p class="text-gray-300 text-sm mb-4"><?php echo e($item['desc']); ?></p>
                        <a href="<?php echo e(route('portfolio.index')); ?>" class="inline-flex items-center text-blue-400 font-semibold hover:text-blue-300">
                            View Project
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('portfolio.index')); ?>" class="inline-flex items-center px-8 py-4 border-2 border-blue-600 text-blue-600 rounded-full font-semibold hover:bg-blue-600 hover:text-white transition-all">
                View All Projects
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Testimonials</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">What Our Clients Say</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="flex items-center mb-4">
                    <?php for($i = 0; $i < $testimonial->rating; $i++): ?>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-600 mb-6 italic">"<?php echo e($testimonial->content); ?>"</p>
                <div class="flex items-center">
                    <?php if($testimonial->client_photo): ?>
                    <img src="<?php echo e(Storage::url($testimonial->client_photo)); ?>" alt="<?php echo e($testimonial->client_name); ?>" class="w-12 h-12 rounded-full object-cover">
                    <?php else: ?>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 font-semibold text-lg"><?php echo e(substr($testimonial->client_name, 0, 1)); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900"><?php echo e($testimonial->client_name); ?></h4>
                        <p class="text-gray-500 text-sm"><?php echo e($testimonial->client_position); ?>, <?php echo e($testimonial->client_company); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Default testimonials -->
            <?php $__currentLoopData = [
                ['name' => 'John Smith', 'position' => 'CTO', 'company' => 'TechCorp Inc.', 'content' => 'Onyx Innovations transformed our entire digital infrastructure. Their team delivered beyond expectations.'],
                ['name' => 'Sarah Johnson', 'position' => 'Director of IT', 'company' => 'Global Finance', 'content' => 'The mobile banking app they built for us has received outstanding feedback from our customers.'],
                ['name' => 'Michael Chen', 'position' => 'CEO', 'company' => 'HealthFirst', 'content' => 'Professional, reliable, and innovative. Onyx is our go-to technology partner for all projects.'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="flex items-center mb-4">
                    <?php for($i = 0; $i < 5; $i++): ?>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-600 mb-6 italic">"<?php echo e($t['content']); ?>"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 font-semibold text-lg"><?php echo e(substr($t['name'], 0, 1)); ?></span>
                    </div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900"><?php echo e($t['name']); ?></h4>
                        <p class="text-gray-500 text-sm"><?php echo e($t['position']); ?>, <?php echo e($t['company']); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Client Logos -->
<section class="py-16 bg-white border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-gray-500 mb-8 text-sm uppercase tracking-wider font-semibold">Trusted by Leading Organizations</p>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center">
            <?php $__empty_1 = true; $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all">
                <img src="<?php echo e(Storage::url($partner->logo)); ?>" alt="<?php echo e($partner->name); ?>" class="h-12 object-contain">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php for($i = 1; $i <= 6; $i++): ?>
            <div class="flex items-center justify-center p-4">
                <div class="bg-gray-200 rounded-lg h-12 w-32 flex items-center justify-center text-gray-400 text-sm">Client <?php echo e($i); ?></div>
            </div>
            <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Investor Confidence Banner -->
<section class="py-24 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="bg-white/20 px-4 py-1 rounded-full text-sm font-semibold">Investment Ready</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-4 mb-6">Partner With a Growing Technology Leader</h2>
                <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                    Onyx Innovations is positioned for significant growth in the rapidly expanding technology sector. Join us in shaping the future of digital transformation.
                </p>
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="bg-white/10 rounded-xl p-4 backdrop-blur">
                        <div class="text-3xl font-bold mb-1">35%</div>
                        <div class="text-blue-200 text-sm">YoY Revenue Growth</div>
                    </div>
                    <div class="bg-white/10 rounded-xl p-4 backdrop-blur">
                        <div class="text-3xl font-bold mb-1">$5M+</div>
                        <div class="text-blue-200 text-sm">Annual Revenue</div>
                    </div>
                </div>
                <a href="<?php echo e(route('investors')); ?>" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition-all shadow-lg">
                    Explore Investment Opportunities
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
            <div class="hidden lg:block">
                <div class="bg-white/10 rounded-3xl p-8 backdrop-blur">
                    <h3 class="text-xl font-semibold mb-6">Growth Highlights</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Expanding presence across 5 countries</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>85+ enterprise clients and growing</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Strategic partnerships with global tech leaders</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Recurring revenue model with high retention</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Blog Posts -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Latest Insights</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">From Our Blog</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="bg-white rounded-2xl overflow-hidden shadow-lg group">
                <?php if($post->featured_image): ?>
                <img src="<?php echo e(Storage::url($post->featured_image)); ?>" alt="<?php echo e($post->title); ?>" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <?php else: ?>
                <div class="w-full h-48 bg-gradient-to-br from-blue-600 to-indigo-700"></div>
                <?php endif; ?>
                <div class="p-6">
                    <?php if($post->category): ?>
                    <span class="text-blue-600 text-sm font-semibold"><?php echo e($post->category->name); ?></span>
                    <?php endif; ?>
                    <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3 group-hover:text-blue-600 transition-colors">
                        <a href="<?php echo e(route('blog.show', $post)); ?>"><?php echo e($post->title); ?></a>
                    </h3>
                    <p class="text-gray-600 mb-4"><?php echo e(Str::limit($post->excerpt ?? strip_tags($post->content), 100)); ?></p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-sm"><?php echo e($post->published_at->format('M d, Y')); ?></span>
                        <span class="text-gray-400 text-sm"><?php echo e($post->reading_time); ?></span>
                    </div>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Default blog posts -->
            <?php $__currentLoopData = [
                ['title' => 'The Future of AI in Enterprise Software', 'category' => 'Technology', 'date' => 'Jan 15, 2026'],
                ['title' => 'Cloud Migration Best Practices for 2026', 'category' => 'Cloud', 'date' => 'Jan 10, 2026'],
                ['title' => 'Digital Transformation Success Stories', 'category' => 'Business', 'date' => 'Jan 5, 2026'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="bg-white rounded-2xl overflow-hidden shadow-lg group">
                <div class="w-full h-48 bg-gradient-to-br from-blue-600 to-indigo-700"></div>
                <div class="p-6">
                    <span class="text-blue-600 text-sm font-semibold"><?php echo e($post['category']); ?></span>
                    <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3 group-hover:text-blue-600 transition-colors">
                        <a href="<?php echo e(route('blog.index')); ?>"><?php echo e($post['title']); ?></a>
                    </h3>
                    <p class="text-gray-600 mb-4">Discover the latest trends and insights in technology that are shaping the future of business.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-sm"><?php echo e($post['date']); ?></span>
                        <span class="text-gray-400 text-sm">5 min read</span>
                    </div>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('blog.index')); ?>" class="inline-flex items-center px-8 py-4 border-2 border-blue-600 text-blue-600 rounded-full font-semibold hover:bg-blue-600 hover:text-white transition-all">
                View All Articles
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Ready to Transform Your Business?</h2>
        <p class="text-xl text-gray-600 mb-10">
            Let's discuss how Onyx Innovations can help you achieve your technology goals. Our team is ready to listen and deliver.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 text-white rounded-full font-semibold text-lg hover:bg-blue-700 transition-all shadow-lg">
                Get Started Today
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
            <a href="<?php echo e(route('services.index')); ?>" class="inline-flex items-center justify-center px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-full font-semibold text-lg hover:border-blue-600 hover:text-blue-600 transition-all">
                Explore Our Services
            </a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\onyxil\resources\views/home.blade.php ENDPATH**/ ?>