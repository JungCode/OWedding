<?php if(auth()->guard()->check()): ?>

<?php $__env->startSection('brideName', $bride->full_name); ?>
<?php $__env->startSection('groomName', $groom->full_name); ?>
<?php $__env->startSection('brideImg', asset('storage/' . $bride->photo)); ?>
<?php $__env->startSection('groomImg', asset('storage/' . $groom->photo)); ?>


<?php $__env->startSection('taskPercent', $taskCount ? number_format(($completedCount / $taskCount) * 100, 0, ',', '.') : 0); ?>
<?php $__env->startSection('budget_current', number_format($currentBudget, 0, ',', '.')); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="content-wrap">
            <div class="plantitle">
                <div class="plantitle-top">
                    <a href="<?php echo e(route('users.managementWeb')); ?>" class="plantitle-top_back">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                    </a>
                    <div class="plantitle-top_title">
                        <h2 class="">Quản lí kế hoạch cưới</h2>
                    </div>
                </div>
                <div class="plantitle-bottom">
                    <div class="plantitle-bottom_text">
                        Nhiều cô dâu chú rể băn khoăn không biết phải chuẩn
                        bị đám cưới như thế nào: Nên bắt đầu từ đâu?. Cần
                        chuẩn bị những gì?. Trước ngày trọng đại bao lâu?.
                        Dưới đây là những gợi ý giúp bạn có một kế hoạch
                        cưới chu toàn, bạn cũng có thể chỉnh sửa để phù hợp
                        hơn với kế hoạch của mình!.
                    </div>
                </div>
            </div>
            <!-- //// -->
            <div class="completed">
                <div class="completed-content">
                    <p class="completed-content_top">
                        Bạn có <span><?php echo e($taskCount); ?></span> công việc cần làm cho đám
                        cưới của mình.
                    </p>
                    <div class="completed-content_mid">
                        <div class="completed-content_mid-progress"></div>
                    </div>
                    <p class="completed-content_sub">
                        Đã hoàn thành
                        <span><?php echo e($taskCount ? number_format(($completedCount / $taskCount) * 100, 0, ',', '.') : 0); ?></span>%
                    </p>
                </div>
                <div class="completed-button">
                    <button class="btnaddfirst">
                        Theo dõi tiến độ công việc
                    </button>
                </div>
            </div>
            <!-- //////// -->
            <div class="acorrdian-wrap">
                <?php
                    $idCheckBox = 0;
                ?>
                <?php for($i = 0; $i < 7; $i++): ?>
                    <div class="accordion">
                        <div class="accordion-header">
                            <i class="fa-solid fa-ellipsis"></i>
                            <?php
                                $period = '';
                                switch ($i) {
                                    case 0:
                                        $period = 'TRƯỚC NGÀY CƯỚI 9 - 12 THÁNG';
                                        break;
                                    case 1:
                                        $period = 'TRƯỚC NGÀY CƯỚI 6 THÁNG';
                                        break;
                                    case 2:
                                        $period = 'TRƯỚC NGÀY CƯỚI 3 THÁNG';
                                        break;
                                    case 3:
                                        $period = 'TRƯỚC NGÀY CƯỚI 2 THÁNG';
                                        break;
                                    case 4:
                                        $period = 'TRƯỚC NGÀY CƯỚI 1 THÁNG';
                                        break;
                                    case 5:
                                        $period = 'TRƯỚC NGÀY CƯỚI 1 NGÀY';
                                        break;
                                    case 6:
                                        $period = 'NGÀY ĐÁM CƯỚI';
                                        break;
                                }
                            ?>
                            <div class="accordion-header_text">
                                <span><?php echo e($period); ?></span>
                            </div>

                            <div class="accordion-header-icon">
                                <div class="accordion-header-icon_drop">
                                    <i class="down fa fa-angle-down icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-content">
                            <div class="accordion-content-inner">
                                <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php
                                        $idCheckBox++;
                                    ?>
                                    <?php if($task->period == $period): ?>
                                        <div class="inneritem">
                                            <div class="inneritem-main">
                                                <div class="round">
                                                    <input class="checkbox" type="checkbox" id="checkbox<?php echo e($idCheckBox); ?>"
                                                        <?php echo e($task->completed ? 'checked' : null); ?>

                                                        data-taskid="<?php echo e($task->id); ?>" />
                                                    <label class="labelcheckbox" for="checkbox<?php echo e($idCheckBox); ?>"></label>
                                                    <!-- <div class="label"></div> -->
                                                </div>
                                                <div class="inneritem-text">
                                                    <span class="inneritem-text_main"><?php echo e($task->title); ?></span>
                                                    <p class="inneritem-text_detail">
                                                        <?php echo e($task->description); ?>

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="inneritem-tool">
                                            <button data-id="<?php echo e($task->id); ?>" data-title="<?php echo e($task->title); ?>"
                                                data-description="<?php echo e($task->description); ?>"
                                                data-completed="<?php echo e($task->completed); ?>" data-period="<?php echo e($period); ?>"
                                                class="inneritem-icon editlist showModal">
                                                <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                            </button>
                                            <form action="<?php echo e(route('tasks.destroy', $task)); ?>" method="post">
                                                <button type="submit">
                                                    <div class="inneritem-icon deletelist">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <i class="fa-solid fa-trash-can removelist" aria-hidden="true"></i>
                                                        <!-- <i class="fa-solid fa-info"></i> -->
                                                    </div>
                                                </button>
                                            </form>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                                <div class="innerbtn">
                                    <button class="innerbtn-btn showModal" data-id="" data-description="" data-title=""
                                        data-completed="0" data-period = "<?php echo e($period); ?>">
                                        <i class="fa-regular fa-square-plus"></i>
                                        Thêm công việc
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
                <div class="completed-button btnsub">
                    <form action="<?php echo e(route('tasks.toggleCompleteTasks', 1)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="" id="inputIdItems" name="IdItems">
                        <button>
                            <i class="fas fa-save"></i>
                            SAVE
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div
        class="z-10 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden modal opacity">
        <div class=" bg-white rounded-lg shadow-lg w-1/2">
            
            <div class="h-20 border-b border-solid border-slate-300 px-7 py-2 bg-rose-500 rounded-t-lg relative">
                <h3 class="text-white h-full text-3xl py-3">Thông tin công việc</h3>
                <i
                    class="text-white fa-solid fa-circle-xmark absolute right-5 top-3 text-3xl opacity-50 hover:opacity-100 cursor-pointer closeModal ">
                </i>
            </div>
            
            <div class="px-7">
                <form id="form" method="POST" action="" class="my-5">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" id="methodField" value="">
                    <input type="hidden" name="id" id="task-id" value="">
                    <input type="hidden" name="period" id="task-period" value="">
                    <div class="round h-7 mb-11">
                        <input class="checkbox" type="checkbox" id="modalcheckbox" name="completed" />
                        <label class="labelcheckbox" for="modalcheckbox"></label>
                        <!-- <div class="label"></div> -->
                        <span class="ml-7 mt-1 h-10 inline-block">Hoàn thành</span>
                    </div>
                    <label for="item-name block" class="my-5">
                        <span class="block mb-3">Tiêu đề công việc</span>
                        <input
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                            placeholder="Nhập tiêu đề công việc..." type="text" name="title" id="task-title"
                            value="" required>
                    </label>
                    <label for="item-name block">
                        <span class="block mb-3 mt-7">Ghi chú</span>
                        <textarea
                            class="h-52 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                            placeholder="Nhập ghi chú công việc..." name="description" id="task-Description" required>
                        </textarea>

                    </label>
                    <button type="submit" id="btn-submit"
                        class="mt-7 transition duration-300 py-5 bg-gray-700 hover:bg-gray-900 px-3 rounded text-white mr-1 w-full">
                        <i class="fa-regular fa-floppy-disk"></i>
                        Lưu thông tin
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('todolist/js.js')); ?>"></script>
    <script>
        // for item modal 
        const modal = document.querySelector('.modal');
        const childElementItem = modal.querySelector(':first-child');
        const modalTaskID = document.querySelector('#task-id');
        const modalTitle = document.querySelector('#task-title');
        const modalPeriod = document.querySelector('#task-period');
        const modalDescription = document.querySelector('#task-Description');
        const modalCompleted = document.querySelector('#modalcheckbox');
        const showModal = document.querySelectorAll('.showModal');
        const btnSubmit = document.querySelector('#btn-submit');
        showModal.forEach(function(element) {
            element.addEventListener('click', function() {
                taskID = element.dataset.id;
                taskTitle = element.dataset.title;
                taskDescription = element.dataset.description;
                taskCompleted = element.dataset.completed;
                taskPeriod = element.dataset.period;
                var methodField = document.querySelector('#methodField');
                var form = document.querySelector('#form');
                if (taskID == '') {
                    methodField.setAttribute('value', 'POST');
                    form.setAttribute('action', `<?php echo e(route('tasks.store')); ?>`);
                    btnSubmit.innerHTML = "<i class=\"fa-solid fa-plus\"></i> Thêm mới";
                } else {
                    methodField.setAttribute('value', 'PUT');
                    form.setAttribute('action', `<?php echo e(route('tasks.update', ':itemID')); ?>`.replace(
                        ':itemID',
                        taskID));
                    btnSubmit.innerHTML = "<i class=\"fa-regular fa-floppy-disk\"></i> Lưu thông tin";
                }
                modalTitle.setAttribute('value', taskTitle);
                modalTaskID.setAttribute('value', taskID);
                modalDescription.innerHTML = taskDescription;
                modalPeriod.setAttribute('value', taskPeriod);
                modalCompleted.checked = (taskCompleted == "1") ? 1 : 0;
                modal.classList.remove('hidden');
                modal.classList.remove('modal-close');
                modal.classList.add('modal-open');
                childElementItem.classList.remove('slide-up');
                childElementItem.classList.add('slide-down');
            });
        });
        const closeModal = document.querySelector('.closeModal');
        modal.addEventListener('click', closeModalItem);
        closeModal.addEventListener('click', closeModalItem);

        function closeModalItem(e) {
            if (!childElementItem.contains(e.target) || closeModal.contains(e.target)) {
                modal.classList.remove('modal-open');
                modal.classList.add('modal-close');
                childElementItem.classList.add('slide-up');
                childElementItem.classList.remove('slide-down');

                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 250);
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php else: ?>
chưa đăng nhập
<?php endif; ?>

<?php echo $__env->make('layouts.toolweb.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\trung\oWedding-project\resources\views/task/index.blade.php ENDPATH**/ ?>