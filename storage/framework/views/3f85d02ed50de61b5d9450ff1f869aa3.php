<?php if(auth()->guard()->check()): ?>
    
    
    <?php $__env->startSection('brideName', $bride->full_name); ?>
<?php $__env->startSection('groomName', $groom->full_name); ?>
<?php $__env->startSection('brideImg', asset('storage/' . $bride->photo)); ?>
<?php $__env->startSection('groomImg', asset('storage/' . $groom->photo)); ?>

<?php $__env->startSection('taskPercent', $taskCount ? number_format(($completedCount / $taskCount) * 100, 0, ',', '.') : 0); ?>
<?php $__env->startSection('budget_current', number_format($currentBudget, 0, ',', '.')); ?>
<?php $__env->startSection('totalGuest', number_format($totalGuest, 0, ',', '.')); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('editui/reset.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('editui/style.css')); ?>" />
    <div class="editui">
        <div class="plantitle">
            <div class="plantitle-top">
                <a href="<?php echo e(route('users.managementWeb')); ?>" class="plantitle-top_back">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </a>
                <div class="plantitle-top_title">
                    <h2 class="">Chỉnh sữa giao diện</h2>
                </div>
            </div>
            <div class="plantitle-bottom">
                <div class="plantitle-bottom_text">
                    Thay đổi giao diện cảu trang web đúng với mong muốn của bạn!
                </div>
            </div>
        </div>
        <form class="uiitemwrapper" method="POST" action="<?php echo e(route('slides.update', 1)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php
                $i = 0;
            ?>
            <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $i++;
                ?>
                <div class = "edituiitem">
                    <div class="edituiitem-title">Hình ảnh slide <?php echo e($i); ?></div>
                    <div class="edituiitem-content">
                        <div class="edituiitem-img">
                            <div id="imagePreview"
                                style="
                                    background-image: url(<?php echo e(asset('storage/' . $slide->photo)); ?>);
                                ">
                            </div>
                        </div>
                        <div class="edituiitem-btn">
                            <input type="file" id="slider<?php echo e($i); ?>" class="imgUpload"
                                accept=".png, .jpg, .jpeg" name="slide<?php echo e($i); ?>" placeholder="Upload File" />
                            <label for="slider<?php echo e($i); ?>" class="imgUploadlable">Thay đổi hình ảnh</label>
                        </div>
                        <p>Kích thước khuyến nghị: 1920x1080px</p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="btnsave">
                <button type="submit"><i class="fas fa-save"></i> Lưu thông tin</button>
            </div>
        </form>
    </div>
    <script src="<?php echo e(asset('editui/js.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php else: ?>
Chưa đăng nhập
<?php endif; ?>

<?php echo $__env->make('layouts.toolweb.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\trung\oWedding-project\resources\views/slide/slide.blade.php ENDPATH**/ ?>