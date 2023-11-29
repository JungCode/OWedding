<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,700&family=Sigmar+One&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('budget-tool/tailwindcss.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('toolheader/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('todolist/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('progress-spinner/style.css')); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
</head>

<body>
    <div class="header">
        <div class="header_logo">
            <a href="<?php echo e(route('users.index')); ?>">
                <img class="logo-red" width="180" height="93" src="<?php echo e(asset('image\Picture2.png')); ?>" />
            </a>
        </div>
        <div class="btn-wrap">
            <div class="btn-choicewrap">
                <div class="btn-choice">
                    <i class="fa-solid fa-gear"></i>
                    Quản lý Website
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
                <div class="btn-choicelist">
                    <a class="choicelist">
                        <i class="bi bi-grid-1x2-fill"></i>
                        Bảng Chính
                    </a>
                    <a class="choicelist">
                        <i class="bi bi-person-heart"></i>
                        Cô Dâu & Chú Rể
                    </a>
                    <a class="choicelist">
                        <i class="bi bi-calendar-event"></i>
                        Sự Kiện cưới
                    </a>
                    <a class="choicelist">
                        <i class="bi bi-chat-square-heart"></i>
                        Chuyện tình yêu
                    </a>
                    <a class="choicelist">
                        <i class="bi bi-palette"></i>
                        Chỉnh Sữa Giao Diện
                    </a>
                </div>
            </div>
            <button class="btn-header">Username</button>
        </div>
    </div>
    <div class="dropdown__wrapper hide dropdown__wrapper--fade-in none">
        <div class="dropdown__group">
            <div class="dropdown__group-username">User Name</div>
            <div class="dropdown__group-email">Usergmail@gmail.com</div>
        </div>
        <div class="dropdown-btn">
            <button class="dropdown-btn_account">
                <i class="fa-regular fa-circle-user"></i><span>Thiết lập tài khoảng</span>
            </button>
            <button class="dropdown-btn_website">
                <i class="fa fa-globe" aria-hidden="true"></i>
                <span>Quản lý website</span>
            </button>
            <button class="dropdown-btn_logout">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span>Đăng xuất</span>
            </button>
        </div>
    </div>
    <div class="headline">
        <div class="headline-broom">
            <span class="headline_name">
                <?php echo $__env->yieldContent('brideName'); ?>
            </span>
            <div class="headline_img">
                <img src="<?php echo $__env->yieldContent('brideImg'); ?>" alt="">
            </div>
        </div>
        <div class="headline-heart"><i class="fa fa-heart" aria-hidden="true"></i></div>
        <div class="headline-bride">
            <div class="headline_img">
                <img src="<?php echo $__env->yieldContent('groomImg'); ?>" alt="">
            </div>
            <span class="headline_name"><?php echo $__env->yieldContent('groomName'); ?></span>
        </div>
    </div>
    <div class="viewline">
        <div class="viewline-website">
            <i class="fas fa-globe"></i>
            <?php
                $user = session('user');
            ?>
            <a href="<?php echo e(route('userwebs.index', $user)); ?>">Xem Website</a>
        </div>
        <i class="fa fa-dot-circle" aria-hidden="true"></i>
        <div class="viewline-album">
            <i class="fas fa-images"></i>
            <a href="<?php echo e(route('slides.index')); ?>">Xem Album</a>
        </div>
    </div>
    <div class="btnline">
        <a href="/tool/guest" class="btnchoice">
            <h5 class="btnchoice-top">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>DANH SÁCH KHÁCH MỜI</span>
            </h5>
            <span class="btnchoice-sub">Bạn có khách mời</span>
        </a>
        <a href="<?php echo e(route('tasks.index')); ?>" class="btnchoice green">
            <h5 class="btnchoice-top">
                <i class="fa fa-list" aria-hidden="true"></i>
                <span>Kế hoạch cưới</span>
            </h5>
            <span class="btnchoice-sub">Đã hoàn thành <?php echo $__env->yieldContent('taskPercent'); ?> %</span>
        </a>
        <a href="<?php echo e(route('budgetCategories.index')); ?>" class="btnchoice blue">
            <h5 class="btnchoice-top">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>Ngân sách cưới</span>
            </h5>
            <span class="btnchoice-sub">Đã chi <?php echo $__env->yieldContent('budget_current'); ?> đ</span>
        </a>
        <a href="#" class="btnchoice gray">
            <h5 class="btnchoice-top">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>Tạo mã QR</span>
            </h5>
            <span class="btnchoice-sub">Mã QR cho website</span>
        </a>
    </div>
    <div class="line">
        !!! Những công cụ hỗ trợ cho website của bạn dễ dàng hơn !!!
    </div>
    <div style="width: 100%" class="flex justify-center ">
        <?php echo $__env->yieldContent('content'); ?>
    </div>









    <script src="<?php echo e(asset('toolheader/js.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\Users\trung\oWedding-project\resources\views/layouts/toolweb/tools.blade.php ENDPATH**/ ?>