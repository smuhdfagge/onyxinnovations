

<?php $__env->startSection('title', 'Contact Messages - Admin'); ?>
<?php $__env->startSection('page_title', 'Contact Messages'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Contact Messages</h1>
            <p class="text-gray-600 mt-1">Manage inquiries from your website</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <form action="<?php echo e(route('admin.contacts.index')); ?>" method="GET" class="flex flex-wrap gap-4">
            <div>
                <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Statuses</option>
                    <option value="new" <?php echo e(request('status') == 'new' ? 'selected' : ''); ?>>New</option>
                    <option value="read" <?php echo e(request('status') == 'read' ? 'selected' : ''); ?>>Read</option>
                    <option value="replied" <?php echo e(request('status') == 'replied' ? 'selected' : ''); ?>>Replied</option>
                    <option value="archived" <?php echo e(request('status') == 'archived' ? 'selected' : ''); ?>>Archived</option>
                </select>
            </div>
            <div>
                <select name="type" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Types</option>
                    <option value="general" <?php echo e(request('type') == 'general' ? 'selected' : ''); ?>>General Inquiry</option>
                    <option value="demo" <?php echo e(request('type') == 'demo' ? 'selected' : ''); ?>>Demo Request</option>
                    <option value="partnership" <?php echo e(request('type') == 'partnership' ? 'selected' : ''); ?>>Partnership</option>
                    <option value="support" <?php echo e(request('type') == 'support' ? 'selected' : ''); ?>>Support</option>
                    <option value="careers" <?php echo e(request('type') == 'careers' ? 'selected' : ''); ?>>Careers</option>
                    <option value="investment" <?php echo e(request('type') == 'investment' ? 'selected' : ''); ?>>Investment</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                Filter
            </button>
            <?php if(request('status') || request('type')): ?>
            <a href="<?php echo e(route('admin.contacts.index')); ?>" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                Clear
            </a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Contacts Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php $__empty_1 = true; $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="<?php echo e($contact->status == 'new' ? 'bg-blue-50' : ''); ?>">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center text-white font-semibold">
                                <?php echo e(substr($contact->name, 0, 1)); ?>

                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900 <?php echo e($contact->status == 'new' ? 'font-bold' : ''); ?>"><?php echo e($contact->name); ?></div>
                                <div class="text-sm text-gray-500"><?php echo e($contact->email); ?></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 <?php echo e($contact->status == 'new' ? 'font-semibold' : ''); ?>"><?php echo e(Str::limit($contact->subject, 40)); ?></div>
                        <div class="text-sm text-gray-500"><?php echo e(Str::limit($contact->message, 50)); ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                            <?php echo e($contact->inquiry_type_label ?? ucfirst($contact->inquiry_type ?? 'General')); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?php
                            $statusColors = [
                                'new' => 'bg-blue-100 text-blue-800',
                                'read' => 'bg-yellow-100 text-yellow-800',
                                'replied' => 'bg-green-100 text-green-800',
                                'archived' => 'bg-gray-100 text-gray-800',
                            ];
                        ?>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo e($statusColors[$contact->status] ?? 'bg-gray-100 text-gray-800'); ?>">
                            <?php echo e($contact->status_label ?? ucfirst($contact->status)); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo e($contact->created_at->format('M d, Y')); ?>

                        <div class="text-xs text-gray-400"><?php echo e($contact->created_at->format('h:i A')); ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="<?php echo e(route('admin.contacts.show', $contact)); ?>" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                        <form action="<?php echo e(route('admin.contacts.destroy', $contact)); ?>" method="POST" class="inline" onsubmit="return confirm('Delete this message?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No messages</h3>
                        <p class="mt-1 text-sm text-gray-500">No contact messages have been received yet.</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if($contacts->hasPages()): ?>
    <div class="mt-6">
        <?php echo e($contacts->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\onyxil\resources\views/admin/contacts/index.blade.php ENDPATH**/ ?>