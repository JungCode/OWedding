<?php $__env->startSection('taskPercent', number_format($taskPercent, 0, ',', '.')); ?>

<?php if(auth()->guard()->check()): ?>
    <?php $__env->startSection('budget_current', number_format($currentBudget, 0, ',', '.')); ?>
<?php $__env->startSection('content'); ?>
    <div style="width: 80%">
        <?php
            if ($currentBudget == 0) {
                $value1 = 0;
                $value2 = 0;
            } else {
                $value1 = ($total_all_ec / $currentBudget) * 100;
                $value2 = ($total_all_ac / $currentBudget) * 100;
            }
        ?>
        <section class="rounded-3xl border border-solid border-slate-300 mt-12 mb-11 overflow-hidden ">
            <div class="bg-wedding flex">
                <a href="<?php echo e(route('users.managementWeb')); ?>" class="pl-7 text-3xl pt-8 transition">
                    <i class="fa fa-arrow-circle-left text-slate-600 hover:text-red-500" aria-hidden="true"></i>
                </a>
                <div class="w-full">
                    <h2 class="py-9 text-3xl text-center font-semibold text-slate-600 pl-4">
                        Quản lí ngân sách cưới
                    </h2>
                </div>
            </div>
            <div class="py-5">
                <div class="spendandpayspinner-wrap">
                    <div class="spend">
                        <div class="spend-text">
                            <div class="spend-text_top">
                                Tổng mục cần chi tiêu <span><?php echo e($count); ?></span>
                            </div>
                            <div class="spend-text_mid">Chi phí dự kiến</div>
                            <div class="spend-text_sub"><?php echo e(number_format($total_all_ec, 0, ',', '.')); ?> <span>đ</span></div>
                        </div>
                        <div class="spend-spinner" value="<?php echo e($value1); ?>">
                            <div class="progress-circle">
                                <div class="outer">
                                    <div class="half spinner"></div>
                                    <div class="half filler"></div>
                                    <div class="mask"></div>
                                </div>
                                <div class="inner"></div>
                                <div class="shadow"></div>
                                <div class="percentage percentage1">
                                    <span>7</span>%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pay">
                        <div class="pay-spinner" value="<?php echo e($value2); ?>">
                            <div class="progress-circle spinner2">
                                <div class="outer">
                                    <div class="half spinner"></div>
                                    <div class="half filler"></div>
                                    <div class="mask"></div>
                                </div>
                                <div class="inner"></div>
                                <div class="shadow"></div>
                                <div class="percentage percentage2">
                                    <span>7</span>%
                                </div>
                            </div>
                        </div>
                        <div class="pay-text">
                            <div class="pay-text_top">
                                Tổng mục cần chi tiêu <span><?php echo e($count); ?></span>
                            </div>
                            <div class="pay-text_mid">Chi phí dự kiến</div>
                            <div class="pay-text_sub"><?php echo e(number_format($total_all_ac, 0, ',', '.')); ?><span>đ</span></div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <button
                        class="bg-gray-200 py-5 px-10 text-md text-slate-600 rounded-lg hover:text-white hover:bg-slate-600 transition showModalCurrentBudget"
                        data-currentbudget = "<?php echo e($currentBudget); ?>">
                        Ngân sách:
                        <?php echo e(number_format($currentBudget, 0, ',', '.')); ?>

                        đ
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </div>
            </div>
        </section>
        
        <div class="flex justify-end">
            <button
                class="showModalCategory transition bg-gray-700 hover:bg-gray-900 duration-300 px-12 py-2 rounded-lg text-slate-50 mb-3 "
                data-userid="<?php echo e($userid); ?>" data-idcategory="" data-namecategory="">
                <i class="fa-solid fa-plus"></i>
                Thêm danh mục
            </button>
        </div>
        
        <?php $__empty_1 = true; $__currentLoopData = $budgetCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $budgetCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="accordion">
                
                <?php
                    $total_expected_cost = 0;
                    $total_actual_cost = 0;
                ?>
                <div class="accordion-header">
                    <i class="fa-solid fa-ellipsis"></i>
                    <div class="accordion-header_text">
                        <span><?php echo e($budgetCategory['budget_category_name']); ?></span>
                    </div>
                    <div class="accordion-header-icon">
                        <div class="accordion-header-icon_edit">
                            <button class="showModalCategory"
                                data-namecategory="<?php echo e($budgetCategory['budget_category_name']); ?>"
                                data-idcategory="<?php echo e($budgetCategory['id']); ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>
                        <div class="accordion-header-icon_delete">
                            <form action="<?php echo e(route('budgetCategories.destroy', $budgetCategory['id'])); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        <div class="accordion-header-icon_drop">
                            <i class="down fa fa-angle-down icon"></i>
                        </div>
                    </div>
                </div>
                <div class="accordion-content">
                    <table class="w-full">
                        <tr class="border-solid border border-wedding">
                            <td class="text-left pl-4 py-6 text-slate-600 ">MỤC CHI TIÊU</th>
                            <td class="text-right pl-4 py-6 text-slate-600">CHI PHÍ DỰ KIẾN</th>
                            <td class="text-right pl-4 py-6 text-slate-600">CHI PHÍ THỰC TẾ</th>
                        </tr>
                        
                        <?php $__currentLoopData = $budgetCategory['budgetItems']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $total_expected_cost += $item['expected_cost'];
                                $total_actual_cost += $item['actual_cost'];
                            ?>
                            <tr class="border-solid border border-wedding font-medium">
                                
                                <td class="text-slate-600 pl-4 py-6"><?php echo e($item['item_name']); ?></td>
                                
                                <td class="text-right pl-4 py-6 text-slate-600">
                                    <?php echo e(number_format($item['expected_cost'], 0, ',', '.')); ?> đ
                                </td>
                                
                                <td class="text-right pl-4 py-6 text-slate-600">
                                    <?php echo e(number_format($item['actual_cost'], 0, ',', '.')); ?> đ
                                </td>
                                
                                <td class="text-slate-600 flex justify-center py-6">
                                    <div class="w-10 h-10 hover:bg-slate-200 flex justify-center rounded-full">
                                        <button class="showModal" data-id="<?php echo e($item['id']); ?>"
                                            data-name="<?php echo e($item['item_name']); ?>"
                                            data-expected="<?php echo e($item['expected_cost']); ?>"
                                            data-actual="<?php echo e($item['actual_cost']); ?>"
                                            data-idcategory="<?php echo e($budgetCategory['id']); ?>">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </div>
                                    <div class="w-10 h-10 hover:bg-slate-200 flex justify-center rounded-full">
                                        <form action="<?php echo e(route('budgetItems.destroy', $item['id'])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr class="border-solid border border border-wedding">
                            <td class="pl-4 py-6">
                                <button class="text-sky-500 hover:text-rose-500	showModal" data-id="" data-name=""
                                    data-expected="" data-actual="" data-idcategory="<?php echo e($budgetCategory['id']); ?>">
                                    <i class="fa-regular fa-square-plus "></i>
                                    thêm mục chi tiêu
                                </button>
                            </td>
                            <td class="text-right pl-4 py-6 text-slate-600"></td>
                            <td class="text-right pl-4 py-6 text-slate-600"></td>
                            <td class="text-right pl-4 py-6 text-white">
                                <i class="fa-solid fa-trash"></i>
                                <i class="fa-solid fa-trash"></i>
                            </td>
                        </tr>
                        
                        <tr class="border-solid border border-wedding">
                            <td class="pl-4 font-semibold text-slate-600 py-6 text-slate-600">TỔNG</td>
                            <td class="text-right pl-4 py-6 text-slate-600 font-semibold">
                                <?php echo e(number_format($total_expected_cost, 0, ',', '.')); ?> đ
                            </td>
                            <td class="text-right pl-4 py-6 text-slate-600 font-semibold">
                                <?php echo e(number_format($total_actual_cost, 0, ',', '.')); ?> đ
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center my-20">Chưa có danh mục nào</p>
        <?php endif; ?>


        
        <div
            class="z-10 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden modal opacity">
            <div class=" bg-white rounded-lg shadow-lg w-1/2">
                
                <div class="h-20 border-b border-solid border-slate-300 px-7 py-2 bg-rose-500 rounded-t-lg relative">
                    <h3 class="text-white h-full text-3xl py-3">Thông tin chi tiêu</h3>
                    <i
                        class="text-white fa-solid fa-circle-xmark absolute right-5 top-3 text-3xl opacity-50 hover:opacity-100 cursor-pointer closeModal ">
                    </i>
                </div>
                
                <div class="px-7">
                    <form id="form" method="POST" action="" class="my-5">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" id="methodField" value="POST">
                        <input type="hidden" name="id" id="item-id" value="">
                        <input type="hidden" name="id_category" id="category-id" value="">
                        <label for="item-name block">
                            <span class="block mb-3">Tiêu đề chi tiêu</span>
                            <input
                                class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                                placeholder="Nhập tiêu đề công việc..." type="text" name="iname" id="item-name"
                                value="" required>
                        </label>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mb-8">
                            <label for="item-expected block">
                                <span class="block mt-5 mb-2">Chi phí dự kiến</span>
                                <div class="grid grid-cols-12">
                                    <input
                                        class="h-20 col-span-10 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 inline-block w-full rounded-l-md focus:ring-1"
                                        placeholder="Chi phí dự kiến" type="text" name="item_expected"
                                        id="item-expected" value="">
                                    <div
                                        class="inline-block col-span-2 text-center pt-5 border border-l-0 border-slate-300 rounded-r-md border-solid shadow-sm text-slate-500">
                                        VND
                                    </div>
                                </div>
                            </label>
                            <label for="item-actual block">
                                <span class="block mt-5 mb-2 ">Chi phí thực tế</span>
                                <div class="grid grid-cols-12">
                                    <input
                                        class="h-20 col-span-10 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 inline-block w-full rounded-l-md focus:ring-1"
                                        placeholder="Chi phí thực tế" type="text" name="item_actual" id="item-actual"
                                        value="">
                                    <div
                                        class="inline-block col-span-2 text-center pt-5 border border-l-0 border-slate-300 rounded-r-md border-solid shadow-sm text-slate-500">
                                        VND
                                    </div>
                                </div>
                            </label>
                        </div>
                        <button type="submit" id="btn-submit"
                            class="transition duration-300 py-5 bg-gray-700 hover:bg-gray-900 px-3 py-1 rounded text-white mr-1 w-full">
                            <i class="fa-regular fa-floppy-disk"></i>
                            Lưu thông tin
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div
            class="z-10 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden modalCategory opacity">
            <div class=" bg-white rounded-lg shadow-lg w-1/2">
                
                <div class="h-20 border-b border-solid border-slate-300 px-7 py-2 bg-rose-500 rounded-t-lg relative">
                    <h3 class="text-white h-full text-3xl py-3">Thông tin danh mục</h3>
                    <i
                        class="text-white fa-solid fa-circle-xmark absolute right-5 top-3 text-3xl opacity-50 hover:opacity-100 cursor-pointer closeModalCategory"></i>
                </div>
                
                <div class="px-7">
                    <form id="formCategory" method="POST" action="" class="my-7">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" id="methodFieldCategory" value="POST">
                        <input type="hidden" name="id_category" id="category-id-forcategory" value="">
                        <input type="hidden" name="id_user" id="" value="<?php echo e($userid); ?>">
                        <label for="item-name block">
                            <span class="block mb-3">Tên danh mục</span>
                            <input
                                class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                                placeholder="Nhập tên danh mục..." type="text" name="cname" id="category-name"
                                value="" required>
                        </label>
                        <button type="submit" id="btn-submit-category"
                            class="mt-7 transition duration-300 py-5 bg-gray-700 hover:bg-gray-900 px-3 py-1 rounded text-white mr-1 w-full">
                            <i class="fa-regular fa-floppy-disk"></i>
                            Lưu thông tin
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div
            class="z-10 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 modalCurrentBudget opacity hidden">
            <div class=" bg-white rounded-lg shadow-lg w-1/2">
                
                <div class="h-20 border-b border-solid border-slate-300 px-7 py-2 rounded-t-lg relative">
                    <h3 class="text-center h-full text-3xl py-3">THIẾT LẬP NGÂN SÁCH CHI TIÊU</h3>
                    <i
                        class="text-gray-300 hover:text-gray-500 fa-solid fa-circle-xmark absolute right-5 top-3 text-3xl  cursor-pointer closeModalCurrentBudget"></i>
                </div>
                
                <div class="px-7">
                    <form method="POST" action="<?php echo e(route('users.updateCurrentBudget', $userid)); ?>" class="my-5">
                        <?php echo csrf_field(); ?>
                        <label for="item-name block">
                            <span class="block mb-5 text-center">Bạn dự trù ngân sách tối đa cho đám cưới của mình là bao
                                nhiêu?</span>
                            <input type="hidden" value="<?php echo e($userid); ?>" name="userid">
                            <input
                                class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                                placeholder="200,000,000" type="text" name="current_budget_money"
                                id="current-budget-money" value="10">
                        </label>
                        <button type="submit" id="btn-submit-category"
                            class="mt-7 transition duration-300 py-5 bg-gray-700 hover:bg-gray-900 px-3 py-1 rounded text-white mr-1 w-full">
                            <i class="fa-regular fa-floppy-disk"></i>
                            Lưu thông tin
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('progress-spinner/progress-spinner.js')); ?>"></script>
    <script>
        // for item modal 
        const modal = document.querySelector('.modal');
        const childElementItem = modal.querySelector(':first-child');
        const modalItemID = document.querySelector('#item-id');
        const modalCategoryID = document.querySelector('#category-id');
        const modalItemName = document.querySelector('#item-name');
        const modalItemExpected = document.querySelector('#item-expected');
        const modalItemActual = document.querySelector('#item-actual');
        const showModal = document.querySelectorAll('.showModal');
        const btnSubmit = document.querySelector('#btn-submit');
        showModal.forEach(function(element) {
            element.addEventListener('click', function() {
                itemID = element.dataset.id;
                itemName = element.dataset.name;
                itemExpected = element.dataset.expected;
                itemActual = element.dataset.actual;
                categoryID = element.dataset.idcategory;
                var methodField = document.querySelector('#methodField');
                var form = document.querySelector('#form');
                if (itemID == '') {
                    methodField.setAttribute('value', 'POST');
                    form.setAttribute('action', `<?php echo e(route('budgetItems.store')); ?>`);
                    btnSubmit.innerHTML = "<i class=\"fa-solid fa-plus\"></i> Thêm mới";
                } else {
                    methodField.setAttribute('value', 'PUT');
                    form.setAttribute('action', `<?php echo e(route('budgetItems.update', ':itemID')); ?>`.replace(
                        ':itemID',
                        itemID));
                    btnSubmit.innerHTML = "<i class=\"fa-regular fa-floppy-disk\"></i> Lưu thông tin";
                }
                modalItemExpected.setAttribute('value', itemExpected);
                modalItemActual.setAttribute('value', itemActual);
                modalItemName.setAttribute('value', itemName);
                modalItemID.setAttribute('value', itemID);
                modalCategoryID.setAttribute('value', categoryID);
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
        // for category modal 
        const modalCategory = document.querySelector('.modalCategory');
        const childElementCategory = modalCategory.querySelector(':first-child');
        const modalCategoryIDForCategory = document.querySelector('#category-id-forcategory');
        const modalCategoryName = document.querySelector('#category-name');
        const showModalCategory = document.querySelectorAll('.showModalCategory');
        const btnSubmitCategory = document.querySelector('#btn-submit-category');
        showModalCategory.forEach(function(element) {
            element.addEventListener('click', function() {
                categoryIDForCategory = element.dataset.idcategory;
                categoryName = element.dataset.namecategory;
                var methodField = document.querySelector('#methodFieldCategory');
                var form = document.querySelector('#formCategory');
                if (categoryIDForCategory == '') {
                    methodField.setAttribute('value', 'POST');
                    form.setAttribute('action', "<?php echo e(route('budgetCategories.store')); ?>");
                    btnSubmitCategory.innerHTML = "<i class=\"fa-solid fa-plus\"></i> Thêm mới";
                } else {
                    methodField.setAttribute('value', 'PUT');
                    form.setAttribute('action', `<?php echo e(route('budgetCategories.update', ':categoryID')); ?>`
                        .replace(':categoryID', categoryIDForCategory));
                    btnSubmitCategory.innerHTML =
                        "<i class=\"fa-regular fa-floppy-disk\"></i> Lưu thông tin";
                }
                modalCategoryName.setAttribute('value', categoryName);
                modalCategoryIDForCategory.setAttribute('value', categoryIDForCategory);
                modalCategory.classList.remove('hidden');
                modalCategory.classList.remove('modal-close');
                modalCategory.classList.add('modal-open');
                childElementCategory.classList.add('slide-down');
                childElementCategory.classList.remove('slide-up');

            });
        });
        const closeModalCategory = document.querySelector('.closeModalCategory');
        modalCategory.addEventListener('click', closeModalCate);
        closeModalCategory.addEventListener('click', closeModalCate);

        function closeModalCate(e) {
            if (!childElementCategory.contains(e.target) || closeModalCategory.contains(e.target)) {
                modalCategory.classList.remove('modal-open');
                modalCategory.classList.add('modal-close');
                childElementCategory.classList.add('slide-up');
                childElementCategory.classList.remove('slide-down');
                setTimeout(() => {
                    modalCategory.classList.add('hidden');
                }, 250);
            }
        }
        //for current budget of user
        const modalCurrentBudget = document.querySelector('.modalCurrentBudget');
        const childElementBudget = modalCurrentBudget.querySelector(':first-child');
        const modalCurrentBudgetMoney = document.querySelector('#current-budget-money');
        const showModalCurrentBudget = document.querySelectorAll('.showModalCurrentBudget');
        showModalCurrentBudget.forEach(function(element) {
            element.addEventListener('click', function() {
                CurrentBudgetMoney = element.dataset.currentbudget;
                modalCurrentBudgetMoney.setAttribute('value', CurrentBudgetMoney);
                modalCurrentBudget.classList.remove('hidden');
                modalCurrentBudget.classList.remove('modal-close');
                modalCurrentBudget.classList.add('modal-open');
                childElementBudget.classList.add('slide-down');
                childElementBudget.classList.remove('slide-up');

            });
        });

        const closeModalCurrentBudget = document.querySelector('.closeModalCurrentBudget');
        modalCurrentBudget.addEventListener('click', closeModalBud);
        closeModalCurrentBudget.addEventListener('click', closeModalBud);

        function closeModalBud(e) {
            if (!childElementBudget.contains(e.target) || closeModalCurrentBudget.contains(e.target)) {
                modalCurrentBudget.classList.remove('modal-open');
                modalCurrentBudget.classList.add('modal-close');
                childElementBudget.classList.add('slide-up');
                childElementBudget.classList.remove('slide-down');
                setTimeout(() => {
                    modalCurrentBudget.classList.add('hidden');
                }, 250);
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php else: ?>
Chưa đăng nhập
<?php endif; ?>

<?php echo $__env->make('layouts.toolweb.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\oWeddinggit\OWedding\resources\views/weddingBudget/budget.blade.php ENDPATH**/ ?>