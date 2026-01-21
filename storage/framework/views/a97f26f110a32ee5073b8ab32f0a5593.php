<nav x-data="{ open: false }" 
     class="fixed w-full z-50 bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center space-x-3">
                    <img src="<?php echo e(asset('logo.png')); ?>" alt="Onyx Innovations" class="h-10 w-auto">
                    
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex lg:items-center lg:space-x-8">
                <a href="<?php echo e(route('home')); ?>" class="font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300 <?php echo e(request()->routeIs('home') ? 'text-blue-600' : ''); ?>">Home</a>
                <a href="<?php echo e(route('about')); ?>" class="font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300 <?php echo e(request()->routeIs('about') ? 'text-blue-600' : ''); ?>">About</a>
                
                <!-- Services Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false" class="font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300 inline-flex items-center <?php echo e(request()->routeIs('services.*') ? 'text-blue-600' : ''); ?>">
                        Services
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 mt-3 w-64 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50" style="display: none;">
                        <a href="<?php echo e(route('services.index')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">All Services</a>
                        <a href="<?php echo e(route('services.show', 'software-development')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Software Development</a>
                        <a href="<?php echo e(route('services.show', 'web-mobile-applications')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Web & Mobile Apps</a>
                        <a href="<?php echo e(route('services.show', 'enterprise-systems')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Enterprise Systems</a>
                        <a href="<?php echo e(route('services.show', 'ict-consulting')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">ICT Consulting</a>
                        <a href="<?php echo e(route('services.show', 'cloud-infrastructure')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Cloud & Infrastructure</a>
                        <a href="<?php echo e(route('services.show', 'data-analytics-automation')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Data & Analytics</a>
                    </div>
                </div>

                <a href="<?php echo e(route('portfolio.index')); ?>" class="font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300 <?php echo e(request()->routeIs('portfolio.*') ? 'text-blue-600' : ''); ?>">Portfolio</a>
                <a href="<?php echo e(route('products.index')); ?>" class="font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300 <?php echo e(request()->routeIs('products.*') ? 'text-blue-600' : ''); ?>">Products</a>
                <a href="<?php echo e(route('investors')); ?>" class="font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300 <?php echo e(request()->routeIs('investors') ? 'text-blue-600' : ''); ?>">Investors</a>
                <a href="<?php echo e(route('careers.index')); ?>" class="font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300 <?php echo e(request()->routeIs('careers.*') ? 'text-blue-600' : ''); ?>">Careers</a>
                <a href="<?php echo e(route('blog.index')); ?>" class="font-medium text-gray-900 hover:text-blue-600 transition-colors duration-300 <?php echo e(request()->routeIs('blog.*') ? 'text-blue-600' : ''); ?>">Blog</a>
                
                <a href="<?php echo e(route('contact')); ?>" class="bg-blue-600 text-white px-6 py-2.5 rounded-full font-semibold hover:bg-blue-700 transition-colors shadow-lg hover:shadow-xl">
                    Contact Us
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center lg:hidden">
                <button @click="open = !open" class="p-2 rounded-md text-gray-900 transition-colors">
                    <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="lg:hidden bg-white shadow-xl border-t" style="display: none;">
        <div class="px-4 py-4 space-y-2">
            <a href="<?php echo e(route('home')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">Home</a>
            <a href="<?php echo e(route('about')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">About</a>
            <a href="<?php echo e(route('services.index')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">Services</a>
            <a href="<?php echo e(route('portfolio.index')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">Portfolio</a>
            <a href="<?php echo e(route('products.index')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">Products</a>
            <a href="<?php echo e(route('investors')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">Investors</a>
            <a href="<?php echo e(route('careers.index')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">Careers</a>
            <a href="<?php echo e(route('blog.index')); ?>" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">Blog</a>
            <a href="<?php echo e(route('contact')); ?>" class="block px-4 py-3 bg-blue-600 text-white text-center rounded-lg font-semibold hover:bg-blue-700 transition-colors">Contact Us</a>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\onyxil\resources\views/components/public/navbar.blade.php ENDPATH**/ ?>