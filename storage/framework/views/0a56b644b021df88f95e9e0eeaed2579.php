<?php $__env->startSection('brideName', $bride->full_name); ?>
<?php $__env->startSection('groomName', $groom->full_name); ?>
<?php $__env->startSection('brideImg', asset('storage/' . $bride->photo)); ?>
<?php $__env->startSection('groomImg', asset('storage/' . $groom->photo)); ?>

<?php $__env->startSection('taskPercent', $taskCount ? number_format(($completedCount / $taskCount) * 100, 0, ',', '.') : 0); ?>
<?php $__env->startSection('budget_current', number_format($currentBudget, 0, ',', '.')); ?>

<?php $__env->startSection('content'); ?>
    <div style="width: 80%">
        <section
            class="flex bg-white rounded-3xl gap-40 border border-solid border-slate-300 mt-12 h-48 justify-center items-center">
            <div class="h-100 w-72 text-center">
                <div class="text-4xl font-bold mb-4">1</div>
                <div class="text-slate-400 font-medium text-3xl">Số khách mời</div>
            </div>
            <div class="h-100 w-72 text-center">
                <div class="text-4xl font-bold mb-4">
                    <?php echo e($taskCount ? number_format(($completedCount / $taskCount) * 100, 0, ',', '.') : 0); ?>%</div>
                <div class="text-slate-400 font-medium text-3xl">Kế hoạch cưới</div>
            </div>
            <div class="h-100 w-72 text-center ">
                <div class="text-4xl font-bold mb-4"><?php echo e(number_format($currentBudget, 0, ',', '.')); ?></div>
                <div class="text-slate-400 font-medium text-3xl">Ngân sách cưới</div>
            </div>
        </section>
        <section class="rounded-t-3xl border border-solid border-slate-300 mt-12 overflow-hidden ">
            <div class="bg-wedding flex">
                <div class="w-full">
                    <h2 class="py-9 text-3xl text-center font-semibold text-slate-600 pl-4">
                        Chỉnh sửa thông tin website
                    </h2>
                </div>
            </div>
        </section>
        <section
            class="bg-white rounded-b-3xl border border-solid border-t-0 border-slate-300 mb-11 overflow-hidden py-5 px-9 grid grid-cols-3 gap-x-10 gap-y-4">
            <a class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5"
                href="<?php echo e(route('fiances.index')); ?>">
                <i class="bi bi-person-heart"></i>
                Thông tin Cô Dâu & Chú Rể
            </a>
            <a class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5"
                href="<?php echo e(route('events.index')); ?>">
                <i class="bi bi-calendar-event"></i>
                Sự kiện cưới
            </a>
            <a class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5"
                href="<?php echo e(route('loveStories.index')); ?>">
                <i class="bi bi-chat-square-heart"></i>
                Câu chuyện tình yêu
            </a>
            <a
                class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5">
                Quản lí khách mời
            </a>
            <a class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5"
                href="<?php echo e(route('slides.index')); ?>">
                <i class="bi bi-palette"></i>
                Chỉnh Sửa Giao Diện
            </a>
            <a
                class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5">
                Tạo mã QR
            </a>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.toolweb.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\oWeddinggit\OWedding\resources\views/layouts/toolweb/index.blade.php ENDPATH**/ ?>