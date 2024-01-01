<?php if(auth()->guard()->check()): ?>



<?php $__env->startSection('brideName', $bride->full_name); ?>
<?php $__env->startSection('groomName', $groom->full_name); ?>
<?php $__env->startSection('brideImg', asset("storage/" . $bride->photo)); ?>
<?php $__env->startSection('groomImg', asset("storage/" . $groom->photo)); ?>

<?php $__env->startSection('taskPercent', $taskCount ? number_format(($completedCount / $taskCount) * 100, 0, ',', '.') : 0); ?>
<?php $__env->startSection('budget_current', number_format($currentBudget, 0, ',', '.')); ?>
<?php $__env->startSection('totalGuest', number_format($totalGuest, 0, ',', '.')); ?>

<?php $__env->startSection('content'); ?>
    <div style="width: 80%" class="font-['Quicksand']">
        <section class="rounded-t-3xl border border-solid border-slate-300 mt-12 overflow-hidden ">
            <div class="bg-wedding flex">
                <a href="<?php echo e(route('users.managementWeb')); ?>" class="pl-7 text-3xl pt-8 transition">
                    <i class="fa fa-arrow-circle-left text-slate-600 hover:text-red-500" aria-hidden="true"></i>
                </a>
                <div class="w-full">
                    <h2 class="py-9 text-3xl text-center font-semibold text-slate-600 pl-4">
                        Thông tin Cô dâu & Chú rể
                    </h2>
                </div>
            </div>
        </section>
        <form action="<?php echo e(route('fiances.update', 11)); ?>" method="POST" enctype="multipart/form-data"
            class="rounded-b-3xl border border-solid border-slate-300 mb-11 overflow-hidden py-12 px-12 shadow-xl grid grid-cols-2 gap-10 relative">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="border border-soli  d border-slate-300 p-5 rounded-2xl shadow-2xl mb-32 husbandinfor">
                <p class="text-3xl font-semibold text-center py-4">THÔNG TIN CHÚ RỂ </p>
                <div class="w-full h-img rounded-xl overflow-hidden relative">

                    <!-- <img src="<?php echo e(asset('storage/' . $groom->photo)); ?>" alt="" class="object-cover object-center	h-full w-full" > -->
                    <div class="object-cover object-center bg-cover bg-center bg-no-repeat h-full w-full" id="imagePreview" style="background-image: url(<?php echo e(asset('storage/' . $groom->photo)); ?>)"></div>
                    <div class="absolute bg-black-transparent h-24 bottom-0 w-full flex justify-center items-center">
                        <label for="husbandimginput"
                            class="bg-white px-4 py-3 rounded-xl  font-semibold cursor-pointer">
                            Thay đổi hình ảnh
                            <input type="file"
                                    name="bride_photo"
                                    placeholder="Upload File"
                                    accept="image/*" 
                                    class="opacity-0 absolute top-50 left-80 hidden"
                                    id="husbandimginput">
                        </label>
                    </div>
                </div>
                <input type="hidden" value="<?php echo e($groom->id); ?>" name="bride_id">
                <div class="input-focus-effect my-5">
                    <input type="text" placeholder="" name="bride_full_name" value="<?php echo e($groom->full_name); ?>" required />
                    <label>Tên chú rễ</label>
                </div>
                <div class="input-focus-effect">
                    <input type="text" placeholder="" name="bride_second_name" value="<?php echo e($groom->second_name); ?>"
                        required />
                    <label>Tên ngắn gọn</label>
                </div>
                <div class="input-focus-effect">
                    <input type="text" placeholder="" name="bride_birthday" value="<?php echo e($groom->birthday); ?>" required />
                    <label>Ngày sinh</label>
                </div>
                <div class="input-focus-effect">
                    <textarea name="bride_description" id="" class="h-52 resize-none" required><?php echo e($groom->description); ?></textarea>
                    <label>Giới thiệu</label>
                </div>
            </div>
            <div class="border border-solid border-slate-300 p-5 rounded-2xl shadow-2xl mb-32 wifeinfor">
                <p class="text-3xl font-semibold text-center py-4 text-red-600">THÔNG TIN CÔ DÂU </p>
                <div class="w-full h-img rounded-xl overflow-hidden relative">
                    <!-- <img src="<?php echo e(asset('storage/' . $bride->photo)); ?>" alt="" class="object-cover object-center	h-full w-full"> -->
                    <div class="object-cover object-center bg-cover bg-center bg-no-repeat h-full w-full" id="imagePreview" style="background-image: url(<?php echo e(asset('storage/' . $bride->photo)); ?>)"></div>
                    <div class="absolute bg-black-transparent h-24 bottom-0 w-full flex justify-center items-center">
                        <label for="wifeimginput"
                            class="bg-white px-4 py-3 rounded-xl opacity-100 cursor-pointer font-semibold">
                            Thay đổi hình ảnh
                            <input type="file"
                                    name="groom_photo"
                                    placeholder="Upload File"
                                    accept="image/*" 
                                    class="opacity-0 absolute top-50 left-80 hidden"
                                    id="wifeimginput">
                                    
                        </label>
                    </div>
                </div>
                <input type="hidden" name="groom_id" value="<?php echo e($bride->id); ?>">
                <div class="input-focus-effect my-5">
                    <input type="text" placeholder="" name="groom_full_name" value="<?php echo e($bride->full_name); ?>" required />
                    <label>Tên cô dâu</label>
                </div>
                <div class="input-focus-effect">
                    <input type="text" placeholder="" name="groom_second_name" value="<?php echo e($bride->second_name); ?>"
                        required />
                    <label>Tên ngắn gọn</label>
                </div>
                <div class="input-focus-effect">
                    <input type="text" placeholder="" name="groom_birthday" value="<?php echo e($bride->birthday); ?>" required />
                    <label>Ngày sinh</label>
                </div>
                <div class="input-focus-effect">
                    <textarea name="groom_description" id="" class="h-52 resize-none" required><?php echo e($bride->description); ?></textarea>
                    <label>Giới thiệu</label>
                </div>
            </div>
            <div class="w-full absolute bottom-12 px-12">
                <button type="submit"
                    class="bg-rose-500 w-full text-white rounded-xl py-5 hover:bg-rose-600 text-3xl font-semibold">
                    <i class="fa-solid fa-download"></i>
                    Lưu thông tin
                </button>
            </div>
        </form>
    </div>
    <script src="<?php echo e(asset('wedding-fiance/fiancejs.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php else: ?>
Chưa đăng nhập
<?php endif; ?>

<?php echo $__env->make('layouts.toolweb.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\trung\oWedding-project\resources\views/wedding-fiance/fiance.blade.php ENDPATH**/ ?>