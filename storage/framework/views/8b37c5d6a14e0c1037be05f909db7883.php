
<?php if(auth()->guard()->check()): ?>

<?php $__env->startSection('taskPercent', $taskCount ? number_format(($completedCount / $taskCount) * 100, 0, ',', '.') : 0); ?>
<?php $__env->startSection('budget_current', number_format($currentBudget, 0, ',', '.')); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('editui/reset.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('editui/style.css')); ?>" />
<div class="editui">
    <div class="plantitle">
        <div class="plantitle-top">
            <a href="#" class="plantitle-top_back">
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
    <div class="uiitemwrapper">
        <div class="edituiitem">
            <div class="edituiitem-title">Hình ảnh slide 1</div>
            <div class="edituiitem-content">
                <div class="edituiitem-img">
                    <div id="imagePreview"
                        style="
                                    background-image: url(/public/image/wedd3.jpg);
                                ">
                    </div>
                </div>
                <div class="edituiitem-btn">
                    <input type="file" id="slider1" class="imgUpload" accept=".png, .jpg, .jpeg" />
                    <label for="slider1" class="imgUploadlable">Thay đổi hình ảnh</label>
                </div>
                <p>Kích thước khuyến nghị: 1920x1080px</p>
            </div>
        </div>
        <div class="edituiitem">
            <div class="edituiitem-title">Hình ảnh slide 2</div>
            <div class="edituiitem-content">
                <div class="edituiitem-img">
                    <div id="imagePreview"
                        style="
                                    background-image: url(/public/image/wedd3.jpg);
                                ">
                    </div>
                </div>
                <div class="edituiitem-btn">
                    <input type="file" id="slider2" class="imgUpload" accept=".png, .jpg, .jpeg" />
                    <label for="slider2" class="imgUploadlable">Thay đổi hình ảnh</label>
                </div>
                <p>Kích thước khuyến nghị: 1920x1080px</p>
            </div>
        </div>
        <div class="edituiitem">
            <div class="edituiitem-title">Hình ảnh slide 3</div>
            <div class="edituiitem-content">
                <div class="edituiitem-img">
                    <div id="imagePreview"
                        style="
                                    background-image: url(/public/image/wedd3.jpg);
                                ">
                    </div>
                </div>
                <div class="edituiitem-btn">
                    <input type="file" id="slider3" class="imgUpload" accept=".png, .jpg, .jpeg" />
                    <label for="slider3" class="imgUploadlable">Thay đổi hình ảnh</label>
                </div>
                <p>Kích thước khuyến nghị: 1920x1080px</p>
            </div>
        </div>
        <div class="edituiitem">
            <div class="edituiitem-title">Hình ảnh slide 3</div>
            <div class="edituiitem-content">
                <div class="edituiitem-img">
                    <div id="imagePreview"
                        style="
                                    background-image: url(/public/image/wedd3.jpg);
                                ">
                    </div>
                </div>
                <div class="edituiitem-btn">
                    <input type="file" id="slider4" class="imgUpload" accept=".png, .jpg, .jpeg" />
                    <label for="slider4" class="imgUploadlable">Thay đổi hình ảnh</label>
                </div>
                <p>Kích thước khuyến nghị: 1920x1080px</p>
            </div>
        </div>
        <div class="edituiitem">
            <div class="edituiitem-title">Hình ảnh nền khối "Sự kiện cưới"</div>
            <div class="edituiitem-content">
                <div class="edituiitem-img">
                    <div id="imagePreview"
                        style="
                                    background-image: url(/public/image/wedd3.jpg);
                                ">
                    </div>
                </div>
                <div class="edituiitem-btn">
                    <input type="file" id="weddingevent" class="imgUpload" accept=".png, .jpg, .jpeg" />
                    <label for="weddingevent" class="imgUploadlable">Thay đổi hình ảnh</label>
                </div>
                <p>Kích thước khuyến nghị: 1920x1080px</p>
            </div>
        </div>
    </div>
    <div class="btnsave">
        <button><i class="fas fa-save"></i> Lưu thông tin</button>
    </div>
</div>
<script src="js.js"></script>
<?php $__env->stopSection(); ?>
<?php else: ?>
Chưa đăng nhập
<?php endif; ?>

<?php echo $__env->make('layouts.toolweb.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\trung\oWedding-project\resources\views/slide/index.blade.php ENDPATH**/ ?>