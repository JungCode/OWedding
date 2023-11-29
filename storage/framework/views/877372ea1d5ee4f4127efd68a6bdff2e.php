<?php if(auth()->guard()->check()): ?>


<?php $__env->startSection('brideName', $bride->full_name); ?>
<?php $__env->startSection('groomName', $groom->full_name); ?>
<?php $__env->startSection('brideImg', asset('storage/' . $bride->photo)); ?>
<?php $__env->startSection('groomImg', asset('storage/' . $groom->photo)); ?>

<?php $__env->startSection('taskPercent', number_format(30, 0, ',', '.')); ?>
<?php $__env->startSection('budget_current', number_format(500000, 0, ',', '.')); ?>
<?php $__env->startSection('content'); ?>
    <div style="width: 80%">
        <section class="rounded-t-3xl border border-solid border-slate-300 mt-12 overflow-hidden ">
            <div class="bg-wedding flex">
                <a href="<?php echo e(route('users.managementWeb')); ?>" class="pl-7 text-3xl pt-8">
                    <i class="fa fa-arrow-circle-left text-slate-600" aria-hidden="true"></i>
                </a>
                <div class="w-full">
                    <h2 class="py-9 text-3xl text-center font-semibold text-slate-600 pl-4">
                        Sự kiện cưới
                    </h2>
                </div>
            </div>
        </section>
        <section
            class="rounded-b-3xl border border-solid border-slate-300 mb-11 overflow-hidden py-5 px-9 shadow-xl grid grid-cols-2 gap-4">
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex gap-5 border border-solid border-slate-300 p-3 rounded-2xl">
                    <div class="w-60 h-60 overflow-hidden rounded-2xl">
                        <img class="h-full object-cover object-center w-full" src="<?php echo e(asset('storage/' . $event->photo)); ?>"
                            alt="">
                    </div>
                    <div>
                        <p class="text-3xl font-semibold text-slate-600 mb-5"><?php echo e($event->name); ?></p>
                        <p class="text-slate-600 mb-2"><?php echo e($event->date); ?></p>
                        <p class="text-slate-600 mb-2"><?php echo e($event->time); ?></p>
                        <p class="text-slate-600 w-full overflow-hidden h-12"><?php echo e($event->address); ?></p>
                        <div>
                            <button
                                class="bg-slate-200 hover:bg-slate-300 py-1 px-2 text-slate-600 transition rounded-md show-event-modal"
                                data-id="<?php echo e($event->id); ?>" data-name="<?php echo e($event->name); ?>"
                                data-time="<?php echo e($event->time); ?>" data-date="<?php echo e($event->date); ?>"
                                data-address="<?php echo e($event->address); ?>" data-link="<?php echo e($event->link); ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <form action="<?php echo e(route('events.destroy', $event->id)); ?>" method="POST" class="inline-block">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                    class="bg-red-200 hover:bg-red-300 py-1 px-2 text-slate-600 transition rounded-md">
                                    <i class="fa-solid fa-trash text-red-400"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="h-64 border border-dashed border-slate-300 p-3 rounded-2xl hover:border-red-300 cursor-pointer hover:text-red-300 show-event-modal"
                data-id="" data-name="" data-time="" data-date="" data-address="" data-link="">
                <div class="flex justify-center items-center h-full">
                    <div>
                        <i class="fa-solid fa-plus "></i>
                        Thêm sự kiện
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <div
        class="z-10 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden event-modal opacity ">
        <div class=" bg-white rounded-lg shadow-lg w-1/3">
            
            <div class="h-20 border-b border-solid border-slate-300 px-7 py-2 bg-rose-500 rounded-t-lg relative">
                <h3 class="text-white h-full text-3xl py-3">Thông tin công việc</h3>
                <i
                    class="text-white fa-solid fa-circle-xmark absolute right-5 top-3 text-3xl opacity-50 hover:opacity-100 cursor-pointer closeEM">
                </i>
            </div>
            
            <div class="px-7">
                <form id="form" method="POST" action="" class="my-5" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" id="methodField" value="">
                    <input type="hidden" name="user_web_id" id="event-id" value="<?php echo e($userWebId); ?>">
                    <label for="" class="my-5 block flex justify-center items-center">
                        <div class="relative w-40 h-40">
                            <img src="<?php echo e(asset('image\avartar.jpg')); ?>" class="object-cover w-100" alt="">
                            <input type="file" class="absolute bottom-0 opacity-70" placeholder="Upload File"
                                accept="image/*" name="photo">
                        </div>
                    </label>
                    <label for="item-name" class="my-5 block">
                        <span class="block mb-1">Tên sự kiên</span>
                        <input type="text" placeholder="Nhập tên sự kiện" id="event-name" name="name"
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                            required>
                    </label>
                    <label for="item-name" class="my-5 block">
                        <span class="block mb-1">Giờ</span>
                        <input type="time" id="event-time" name="time"
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                            required>
                    </label>
                    <label for="item-name" class="my-5 block">
                        <span class="block mb-1">Ngày</span>
                        <input type="date" id="event-date" name="date"
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                            required>
                    </label>
                    <label for="item-name" class="my-5 block">
                        <span class="block mb-1">Địa chỉ</span>
                        <input type="text" placeholder="Nhập địa chỉ" id="event-address" name="address"
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                            required>
                    </label>
                    <label for="item-name" class="my-5 block">
                        <span class="block mb-1">Link googlemaps</span>
                        <input type="text" placeholder="Nhập link" id="event-link" name="link"
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                            required>
                    </label>
                    <button type="submit" id="btn-submit"
                        class="mt-7 transition duration-300 py-5 bg-gray-700 hover:bg-gray-900 px-3 rounded text-white mr-1 w-full">
                        <i class="fa-solid fa-plus"></i>
                        Lưu thông tin
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        // adding-modal
        const EventModal = document.querySelector('.event-modal');
        const childElementEventModal = EventModal.querySelector(':first-child');
        const showEventModal = document.querySelectorAll('.show-event-modal');
        const eventIdM = document.querySelector('#event-id');
        const eventNameM = document.querySelector('#event-name');
        const eventTimeM = document.querySelector('#event-time');
        const eventDateM = document.querySelector('#event-date');
        const eventAddressM = document.querySelector('#event-address');
        const eventLinkM = document.querySelector('#event-link');
        const btnSubmit = document.querySelector('#btn-submit');
        showEventModal.forEach(function(element) {
            element.addEventListener('click', function() {
                eventId = element.dataset.id;
                eventName = element.dataset.name;
                eventTime = element.dataset.time;
                eventDate = element.dataset.date;
                eventLink = element.dataset.link;
                eventAddress = element.dataset.address;
                var methodField = document.querySelector('#methodField');
                var form = document.querySelector('#form');
                if (eventId == '') {
                    methodField.setAttribute('value', 'POST');
                    form.setAttribute('action', `<?php echo e(route('events.store')); ?>`);
                    btnSubmit.innerHTML = "<i class=\"fa-solid fa-plus\"></i> Thêm mới";
                } else {
                    methodField.setAttribute('value', 'PUT');
                    form.setAttribute('action', `<?php echo e(route('events.update', ':eventID')); ?>`.replace(
                        ':eventID',
                        eventId));
                    btnSubmit.innerHTML = "<i class=\"fa-regular fa-floppy-disk\"></i> Lưu thông tin";
                }
                eventNameM.setAttribute('value', eventName);
                eventTimeM.value = eventTime;
                eventDateM.value = eventDate;
                eventLinkM.value = eventLink;
                eventAddressM.setAttribute('value', eventAddress);
                EventModal.classList.remove('hidden');
                EventModal.classList.remove('modal-close');
                EventModal.classList.add('modal-open');
                childElementEventModal.classList.remove('slide-up');
                childElementEventModal.classList.add('slide-down');
            });
        });
        const closeEventModal = document.querySelector('.closeEM');
        EventModal.addEventListener('click', closeEM);
        closeEventModal.addEventListener('click', closeEM);

        function closeEM(e) {
            if (!childElementEventModal.contains(e.target) || closeEventModal.contains(e.target)) {
                EventModal.classList.remove('modal-open');
                EventModal.classList.add('modal-close');
                childElementEventModal.classList.add('slide-up');
                childElementEventModal.classList.remove('slide-down');
                setTimeout(() => {
                    EventModal.classList.add('hidden');
                }, 250);
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php else: ?>
 Chưa đăng nhập
<?php endif; ?>
<?php echo $__env->make('layouts.toolweb.tools', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\trung\oWedding-project\resources\views/weddingEvent/event.blade.php ENDPATH**/ ?>