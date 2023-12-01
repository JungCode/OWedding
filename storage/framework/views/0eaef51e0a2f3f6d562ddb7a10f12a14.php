<?php if(auth()->guard()->check()): ?>
    
    
    <?php $__env->startSection('brideName', $bride->full_name); ?>
<?php $__env->startSection('groomName', $groom->full_name); ?>
<?php $__env->startSection('brideImg', asset('storage/' . $bride->photo)); ?>
<?php $__env->startSection('groomImg', asset('storage/' . $groom->photo)); ?>

<?php $__env->startSection('taskPercent', $taskCount ? number_format(($completedCount / $taskCount) * 100, 0, ',', '.') : 0); ?>
<?php $__env->startSection('budget_current', number_format($currentBudget, 0, ',', '.')); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('lovestory/style.css')); ?>">
    <div class="lovestory">
        <div class="plantitle">
            <div class="plantitle-top">
                <a href="<?php echo e(route('users.managementWeb')); ?>" class="plantitle-top_back">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </a>
                <div class="plantitle-top_title">
                    <h2 class="">Chuyện tình yêu</h2>
                </div>
            </div>
            <div class="plantitle-bottom">
                <div class="plantitle-bottom_text">
                    Thêm và chỉnh sữa những câu chuyện tình yêu của bạn!!!
                </div>
            </div>
        </div>
        <?php $i = 0; ?>
        <form action="<?php echo e(route('loveStories.store')); ?>" method="POST" class="w-full" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="storyedit">
                <div class="editcontent">
                    <?php $__currentLoopData = $loveStories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loveStory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $i++;
                        ?>
                        <div class="storyitem">
                            <div class="storyitem-img" id="imagePreview"
                                style="
                        background-image: url(<?php echo e(asset('storage/' . $loveStory->photo)); ?>);
                            ">
                                <div class="imgbot">
                                    <input type="file" id="inputstory<?php echo e($i); ?>" class="imgbot-btn"
                                        accept=".png, .jpg, .jpeg" name="photo[]" value="0">
                                    <label for="inputstory<?php echo e($i); ?>">Thay đổi</label>
                                </div>
                            </div>
                            <input type="hidden" value="" name="photoCheck[]" class="img-check">
                            <input type="hidden" value="<?php echo e($loveStory->id); ?>" name="id[]">
                            <div class="input-focus-effect">
                                <input type="text" placeholder=" " name="title[]" value="<?php echo e($loveStory->title); ?>"
                                    required>
                                <label>Tiêu đề</label>
                            </div>
                            <div class="input-focus-effect">
                                <input type="text" placeholder=" " name="date[]" value="<?php echo e($loveStory->date); ?>"
                                    required>
                                <label>Thời gian</label>
                            </div>
                            <div class="input-focus-effect">
                                <textarea type="text" placeholder=" " name="content[]"required><?php echo e($loveStory->content); ?></textarea>
                                <label>Nội dung</label>
                            </div>
                            <div class="storyitem-btn">
                                <button class="storyitem-btn_del"><i class="fa-regular fa-trash-can"></i></button>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="editbtn">
                    <a class="editbtn-add">
                        <i class="fa-solid fa-plus"></i> Thêm câu chuyện
                    </a>
                    <button class="editbtn-save">
                        <i class="fa-regular fa-floppy-disk"></i> Lưu thông tin
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script src="<?php echo e(asset('lovestory/js.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php else: ?>
chưa đăng nhập
<?php endif; ?>

<?php echo $__env->make('layouts.toolweb.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\trung\oWedding-project\resources\views/lovestory/lovestory.blade.php ENDPATH**/ ?>