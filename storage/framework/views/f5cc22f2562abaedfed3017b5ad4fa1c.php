<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,700&family=Sigmar+One&display=swap"
            rel="stylesheet"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="<?php echo e(asset('create-confirm/reset.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('create-confirm/style.css')); ?>" />
    </head>
    <body>
        <header class="createheader">
            <img src="<?php echo e(asset('image/Picture2.png')); ?>" alt="" height="70" />
        </header>
        <div class="container">
            <div class="container-wrap">
                <div class="title">
                    <div class="title-text">
                        <h1>Khởi tạo website đám cưới</h1>
                        <p>
                            Sở hữu website đám cưới miễn phí trọn đời cho hai
                            bạn trong vài nốt nhạc. Một phong cách mới để lưu
                            giữ kỷ niệm, chia sẻ hình ảnh, câu chuyện tình
                            yêu,... cho ngày cưới của bạn thêm sự thú vị và hiện
                            đại.
                        </p>
                    </div>
                </div>
                <div class="create">
                    <div class="create-title">
                        <span><?php echo e($template_name); ?></span>
                        <p>
                            <?php echo e($template_description); ?>

                        </p>
                    </div>
                    <form action="<?php echo e(route('userwebs.store')); ?>" method="POST" class="form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="template_id" value="<?php echo e($template_id); ?>">
                        <div class="input-focus-effect">
                            <input type="text" placeholder="" name="groom_name" required/>
                            <label>Tên chú rễ</label>
                        </div>
                        <div class="input-focus-effect">
                            <input type="text" placeholder="" name="bride_name" required/>
                            <label>Tên cô dâu</label>
                        </div>
                        <div class="input-focus-effect" >
                            <input type="date" placeholder="" name="wedding_date" required/>
                            <label>Ngày cưới của bạn</label>
                        </div>
                        <div class="form-btn">
                            <button type="submit" class="form-btn_create">Khởi tạo website</button>
                            <a class="form-btn_change" href="<?php echo e(route('templates.index')); ?>">Chọn giao diện khác</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="line">
            !!!Bắt đầu khởi tạo website đám cưới của riêng bạn!!!
        </div>
    </body>
</html>
<?php /**PATH D:\oWeddinggit\OWedding\resources\views/template-choice/confirm.blade.php ENDPATH**/ ?>