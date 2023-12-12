@auth
    @extends('layouts.toolweb.tools')
    {{-- bride groom information  --}}
    @section('brideName', $bride->full_name)
@section('groomName', $groom->full_name)
@section('brideImg', asset('storage/' . $bride->photo))
@section('groomImg', asset('storage/' . $groom->photo))
{{-- layout information  --}}
@section('taskPercent', $taskCount ? number_format(($completedCount / $taskCount) * 100, 0, ',', '.') : 0)
@section('budget_current', number_format($currentBudget, 0, ',', '.'))
@section('totalGuest', number_format($totalGuest, 0, ',', '.'))
@section('content')
    <div style="width: 80%">
        <section class="rounded-t-3xl border border-solid border-slate-300 mt-12 overflow-hidden ">
            <div class="bg-wedding flex">
                <a href="{{ route('users.managementWeb') }}" class="pl-7 text-3xl pt-8">
                    <i class="fa fa-arrow-circle-left text-slate-600" aria-hidden="true"></i>
                </a>
                <div class="w-full">
                    <h2 class="py-9 text-3xl text-center font-semibold text-slate-600 pl-4">
                        Quản lý ngân khách mời
                    </h2>
                </div>
            </div>
            <div class="py-5 px-9 font-semibold">
                <p class="text-slate-500 text-3xl">
                    Danh sách khách mời
                    <i class="fa-regular fa-circle-question"></i>
                </p>
            </div>
        </section>
        <section class="rounded-b-3xl border border-solid border-slate-300 mb-11 overflow-hidden py-5 px-9 shadow-xl">
            <div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                    <div class="relative">
                        <input type="text" placeholder="Tìm kiếm khách mời" id="searchbar"
                            class="pl-10 w-full border border-solid border-slate-300 rounded-lg py-3 ">
                        <i class="fa-solid fa-magnifying-glass absolute top-5 left-3 text-slate-300"></i>
                    </div>
                    <select name="" id="selector5"
                        class="border border-solid border-slate-300 rounded-lg py-3 selector">
                        <option value="">Tất cả sự kiện</option>
                        @foreach ($events as $event)
                            <option value="{{ $event->name }}">{{ $event->name }}</option>
                        @endforeach
                    </select>
                    <select name="" id="selector6"
                        class="border border-solid border-slate-300 rounded-lg py-3 selector">
                        <option value="">Tất cả các nhóm</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group['group_name'] }}">{{ $group['group_name'] }}</option>
                        @endforeach
                    </select>
                    <select name="" id="selector7" class="border border-solid border-slate-300 rounded-lg selector">
                        <option value="">Trạng thái tham gia</option>
                        <option value="Có">Có</option>
                        <option value="Chưa">Chưa</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-20">
                    <button class="rounded-lg py-3 bg-green-wedding text-white show-guest-adding-modal" data-event=""
                        data-email="" data-guestid="" data-guestname="" data-phone="" data-groupguest=""
                        data-gowith="">Thêm khách
                        mời</button>
                    <button class="rounded-lg py-3 bg-purple-wedding text-white show-guest-group-modal">Quản lý
                        nhóm</button>
                    <button class="rounded-lg py-3 bg-red-wedding text-white">Cài đặt thiệp mời</button>
                    <button class="rounded-lg py-3 bg-gray-wedding text-white">Xuất danh sách</button>
                </div>
            </div>
            <div class="mb-2">
                <div class="inline-block mr-4">
                    <i class="fa-solid fa-circle text-blue-700"></i>
                    Tổng số khách mời: {{ $totalGuest }}
                </div>
                <div class="inline-block mr-4">
                    <i class="fa-solid fa-circle text-indigo-700"></i>
                    Tham gia: {{ $comingGuest }}
                </div>
                <div class="inline-block mr-4">
                    <i class="fa-solid fa-circle text-pink-700"></i>
                    Không tham gia: {{ $notComingGuest }}
                </div>
                <div class="inline-block mr-4">
                    <i class="fa-solid fa-circle text-slate-500"></i>
                    Không xác nhận: {{ $notConfirmGuest }}
                </div>
                <div class="inline-block mr-4">
                    <i class="fa-solid fa-circle text-green-wedding"></i>
                    Tiền mừng: {{ $totalWeddingMoney }}đ
                </div>
            </div>
            <div class="rounded-xl border-2 border-solid border-slate-300 h-80 text-xl overflow-auto">
                <table class="w-full border-collapse" id="table">
                    <thead>
                        <tr class="border-b-2 border-solid border-slate-300">
                            <th class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">#</th>
                            <th class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">Thiệp</th>
                            <th class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">Mã KM</th>
                            <th class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">Tên khách mời</th>
                            <th class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">Điện thoại</th>
                            <th class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">Sự kiện</th>
                            <th class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">Nhóm khách mời</th>
                            <th class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">Tham gia</th>
                            <th class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">Đi cùng</th>
                            <th class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">Mừng cưới</th>
                            <th class="text-center">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guests as $guest)
                            <tr class="border-b-2 border-solid border-slate-300 bg-slate-100">
                                <td class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">
                                    {{ $loop->iteration }}</td>
                                <td class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">
                                    <a href="{{ route('guest.show', $guest['id']) }}">a</a>
                                </td>
                                <td class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">
                                    {{ $guest['invitation_id'] }}</td>
                                <td class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">
                                    {{ $guest['name'] }}</td>
                                <td class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">
                                    {{ $guest['phone_number'] }}</td>
                                <td class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">
                                    <div class="bg-slate-500 rounded-lg text-white font-bold">
                                        {{ $guest['event'] }}
                                    </div>
                                </td>
                                <td class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">
                                    <div class="bg-purple-wedding rounded-lg text-white font-bold">
                                        @foreach ($groups as $group)
                                            @if ($guest['group_id'] == $group['id'])
                                                {{ $group['group_name'] }}
                                            @endif
                                        @endforeach
                                    </div>
                                </td>
                                <td class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">
                                    {{ $guest['confirmation'] }}</td>
                                <td class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">
                                    {{ $guest['go_with'] }}
                                    <i class="fa-solid fa-user text-gray-400"></i>
                                </td>
                                <td class="border-r-2 border-solid border-gray-100 text-center py-5 px-3">
                                    <i class="fa-solid fa-sack-dollar text-gray-400"></i>
                                    {{ $guest['wedding_money'] }}
                                </td>
                                <td class="text-center">
                                    <button class="mr-3 transition hover:text-slate-500 show-guest-adding-modal"
                                        data-event="{{ $guest['event'] }}" data-email="{{ $guest['wedding_money'] }}"
                                        data-guestid="{{ $guest['id'] }}" data-guestname="{{ $guest['name'] }}"
                                        data-phone="{{ $guest['phone_number'] }}"
                                        data-groupguest="{{$guest['group_id']}}"
                                        data-gowith="{{ $guest['go_with'] }}">
                                        <i class="fa-solid fa-pen "></i>
                                    </button>
                                    <button class="transition hover:text-slate-500"><i
                                            class="fa-solid fa-trash"></i></button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    {{-- guest-adding-modal --}}
    <div
        class="z-10 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden guest-adding-modal opacity ">
        <div class=" bg-white rounded-lg shadow-lg w-1/3">
            {{-- HEADER OF MODAL  --}}
            <div class="h-20 border-b border-solid border-slate-300 px-7 py-2 bg-rose-500 rounded-t-lg relative">
                <h3 class="text-white h-full text-3xl py-3">Thông tin công việc</h3>
                <i
                    class="text-white fa-solid fa-circle-xmark absolute right-5 top-3 text-3xl opacity-50 hover:opacity-100 cursor-pointer closeGAM">
                </i>
            </div>

            {{-- BODY OF MODALS  --}}
            <div class="px-7">
                <form id="form" method="POST" action="" class="my-5">
                    @csrf
                    <input type="hidden" name="_method" id="methodField" value="">
                    <input type="hidden" name="id" id="guest-id" value="">
                    <label for="block" class="my-5 block">
                        <span class="block mb-1">Sự kiện</span>
                        <select name="event" id="guest-event"
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1">
                            @foreach ($events as $event)
                                <option value="{{ $event->name }}">{{ $event->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="item-name" class="my-5 block">
                        <span class="block mb-1">Tên khách mời</span>
                        <input type="text" placeholder="Nhập tên khách mời" id="guest-name" name="name"
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1">
                    </label>
                    <label for="item-name" class="my-5 block">
                        <span class="block mb-1">Số điện thoại</span>
                        <input type="text" placeholder="Nhập số điện thoại khách mời" id="guest-phone"
                            name="phone_number"
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1">
                    </label>
                    <label for="block" class="my-5 block">
                        <span class="block mb-1">Chọn nhóm khách mời <span
                                class="text-blue-700 show-guest-group-modal cursor-pointer"> [Quản lý nhóm] </span></span>
                        <select name="group_id" id="guest-group"
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1" >
                            <option value="">Chọn nhóm khách mời</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group['id'] }}">{{ $group['group_name'] }}</option>
                            @endforeach

                        </select>
                    </label>
                    <label for="block" class="my-5 block">
                        <span class="block mb-1">Đi cùng</span>
                        <select name="go_with" id="guest-gowith"
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1">
                            <option value="">Không có</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </label>
                    <label for="item-name" class="my-5 block">
                        <span class="block mb-1">Wedding money</span>
                        <input type="text" placeholder="Nhập số tiền mừng cưới" id="guest-email" name="wedding_money"
                            class="h-20 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1">
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
    {{-- guest-group-modal --}}
    <div
        class="z-10 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden guest-group-modal opacity">
        <div class=" bg-white rounded-lg shadow-lg w-1/3">
            {{-- HEADER OF MODAL  --}}
            <div class="h-20 border-b border-solid border-slate-300 px-7 py-2 bg-rose-500 rounded-t-lg relative">
                <h3 class="text-white h-full text-3xl py-3">Quản lý nhóm khách mời</h3>
                <i
                    class="text-white fa-solid fa-circle-xmark absolute right-5 top-3 text-3xl opacity-50 hover:opacity-100 cursor-pointer closeGGM">
                </i>
            </div>
            {{-- BODY OF MODALS  --}}
            <div class="px-7 bg-slate-200">
                <form id="" method="POST" action="{{ route('guestGroups.store') }}"
                    class="py-5 bg-slate-200">
                    @csrf
                    <div class="flex">
                        <label for="" class="mr-4 w-8/12">
                            <input placeholder="Nhập tên nhóm" type="text" name="group_name"
                                class="px-4 py-5 border border-solid border-slate-300 rounded-lg w-full">
                        </label>
                        <button type="submit" id="btn-submit"
                            class="transition duration-300 py-5 bg-blue-600 hover:bg-blue-800 px-3 rounded text-white mr-1 w-4/12">
                            <i class="fa-solid fa-plus"></i>
                            Thêm mới
                        </button>
                    </div>
                </form>
            </div>
            <div class="rounded-b-lg overflow-hidden">
                <table class="w-full table-collapse">
                    <tr class="border border-solid border-slate-300">
                        <th class="border border-solid border-slate-300 py-4 px-4 text-center w-2/12">#</th>
                        <th class="border border-solid border-slate-300 py-4 px-4 text-left w-8/12">Tên nhóm</th>
                        <th class="border border-solid border-slate-300 py-4 px-4 text-center w-2/12">#</th>
                    </tr>
                    @foreach ($groups as $group)
                        <tr class="border border-solid border-slate-300 rowedit">
                            <td class="border border-solid border-slate-300 py-4 px-4 text-center w-2/12">
                                {{ $loop->iteration }}</td>
                            <td class="border border-solid border-slate-300 py-4 px-4 text-left w-8/12"
                                id="{{ 'adu' . $loop->iteration }}">
                                <?php
                                $groupid = $group['id'];
                                ?>
                                <form id="" method="POST"
                                    action="{{ route('guestGroups.update', $groupid) }}">
                                    @csrf
                                    @method('PUT')
                                    <input name="group_name" class="w-8/12 input" type="text"
                                        value="{{ $group['group_name'] }}" readonly>
                                    <button
                                        class="bg-blue-600 hover:bg-blue-800 transition rounded text-white px-2 py-1 hidden save-button">Lưu</button>
                                </form>

                                <button
                                    class="bg-gray-wedding hover:bg-gray-500 transition rounded text-white px-2 py-1 hidden cancel-button">Hủy</button>

                            </td>
                            <td class=" flex justify-center items-center py-4 px-4">
                                <button class="inline-block transition hover:text-slate-500 editbtn"
                                    id="{{ 'adu' . $loop->iteration }}"><i class="fa-solid fa-pen mr-4"></i></button>
                                <button class="inline-block transition hover:text-slate-500"><i
                                        class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('guest-tool/js.js') }}"></script>
    <script>
        // adding-modal
        const guestAddingModal = document.querySelector('.guest-adding-modal');
        const childElementGuestAddingModal = guestAddingModal.querySelector(':first-child');
        const showGuestAddingModal = document.querySelectorAll('.show-guest-adding-modal');
        const guestIdM = document.querySelector('#guest-id');
        const guestEventM = document.querySelector('#guest-event');
        const guestNameM = document.querySelector('#guest-name');
        const guestEmailM = document.querySelector('#guest-email');
        const guestPhoneM = document.querySelector('#guest-phone');
        const guestGroupM = document.querySelector('#guest-group');
        const guestGowithM = document.querySelector('#guest-gowith');
        const btnSubmit = document.querySelector('#btn-submit');
        showGuestAddingModal.forEach(function(element) {
            element.addEventListener('click', function() {
                guestEvent = element.dataset.event;
                guestId = element.dataset.guestid;
                guestName = element.dataset.guestname;
                guestEmail = element.dataset.email;
                guestPhone = element.dataset.phone;
                guestGroup = element.dataset.groupguest;
                guestGowith = element.dataset.gowith;
                var methodField = document.querySelector('#methodField');
                var form = document.querySelector('#form');
                if (guestId == '') {
                    methodField.setAttribute('value', 'POST');
                    form.setAttribute('action', `{{ route('guest.store') }}`);
                    btnSubmit.innerHTML = "<i class=\"fa-solid fa-plus\"></i> Thêm mới";
                } else {
                    methodField.setAttribute('value', 'PUT');
                    form.setAttribute('action', `{{ route('guest.update', ':guestID') }}`.replace(
                        ':guestID',
                        guestId));
                    btnSubmit.innerHTML = "<i class=\"fa-regular fa-floppy-disk\"></i> Lưu thông tin";
                }
                guestAddingModal.classList.remove('hidden');
                guestAddingModal.classList.remove('modal-close');
                guestAddingModal.classList.add('modal-open');
                guestNameM.setAttribute('value', guestName);
                guestIdM.setAttribute('value', guestId);
                guestEventM.value = guestEvent;
                guestEmailM.setAttribute('value', guestEmail);
                guestPhoneM.setAttribute('value', guestPhone);
                guestGroupM.value = guestGroup;
                guestGowithM.value = guestGowith
                childElementGuestAddingModal.classList.remove('slide-up');
                childElementGuestAddingModal.classList.add('slide-down');
            });
        });
        const closeGuestAddingModal = document.querySelector('.closeGAM');
        guestAddingModal.addEventListener('click', closeGAM);
        closeGuestAddingModal.addEventListener('click', closeGAM);

        function closeGAM(e) {
            if (!childElementGuestAddingModal.contains(e.target) || closeGuestAddingModal.contains(e.target)) {
                guestAddingModal.classList.remove('modal-open');
                guestAddingModal.classList.add('modal-close');
                childElementGuestAddingModal.classList.add('slide-up');
                childElementGuestAddingModal.classList.remove('slide-down');
                setTimeout(() => {
                    guestAddingModal.classList.add('hidden');
                }, 250);
            }
        }
    </script>
@endsection

@endauth
