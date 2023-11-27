@auth
@extends('layouts.toolweb.tools')
@section('taskPercent', $taskCount ? number_format(($completedCount / $taskCount) * 100, 0, ',', '.') : 0)
@section('budget_current', number_format($currentBudget, 0, ',', '.'))
@section('content')
    <div style="width: 80%">
        <section class="rounded-t-3xl border border-solid border-slate-300 mt-12 overflow-hidden ">
            <div class="bg-wedding flex">
                <a href="{{route('users.managementWeb')}}" class="pl-7 text-3xl pt-8 transition">
                    <i class="fa fa-arrow-circle-left text-slate-600 hover:text-red-500" aria-hidden="true"></i>
                </a>
                <div class="w-full">
                    <h2 class="py-9 text-3xl text-center font-semibold text-slate-600 pl-4">
                        Thông tin Cô dâu & Chú rể
                    </h2>
                </div>
            </div>
        </section>
        <form action="{{ route('fiances.update', 11) }}" method="POST" enctype="multipart/form-data"
            class="rounded-b-3xl border border-solid border-slate-300 mb-11 overflow-hidden py-12 px-12 shadow-xl grid grid-cols-2 gap-10 relative">
            @csrf
            @method('PUT')
            <div class="border border-soli  d border-slate-300 p-5 rounded-2xl shadow-2xl mb-32">
                <p class="text-3xl font-semibold text-center py-4">THÔNG TIN CHÚ RỂ </p>
                <div class="w-full h-img rounded-xl overflow-hidden relative">
                    <img src="{{ asset('storage/' . $bride->photo) }}" alt="" class="object-cover object-center	h-full w-full">
                    <div class="absolute bg-black-transparent h-24 bottom-0 w-full flex justify-center items-center">
                        <label for="input-file relative"
                            class="bg-white px-4 py-3 rounded-xl cursor-pointer font-semibold">
                            Thay đổi hình ảnh
                            <input type="file"
                                    name="bride_photo"
                                    placeholder="Upload File"
                                    accept="image/*" 
                                    class="opacity-0 absolute top-50 left-80">
                        </label>
                    </div>
                </div>
                <input type="hidden" value="{{ $bride->id }}" name="bride_id">
                <div class="input-focus-effect my-5">
                    <input type="text" placeholder="" name="bride_full_name" value="{{ $bride->full_name }}" required />
                    <label>Tên chú rễ</label>
                </div>
                <div class="input-focus-effect">
                    <input type="text" placeholder="" name="bride_second_name" value="{{ $bride->second_name }}"
                        required />
                    <label>Tên ngắn gọn</label>
                </div>
                <div class="input-focus-effect">
                    <input type="text" placeholder="" name="bride_birthday" value="{{ $bride->birthday }}" required />
                    <label>Ngày sinh</label>
                </div>
                <div class="input-focus-effect">
                    <textarea name="bride_description" id="" class="h-52" required>{{ $bride->description }}</textarea>
                    <label>Giới thiệu</label>
                </div>
            </div>
            <div class="border border-solid border-slate-300 p-5 rounded-2xl shadow-2xl mb-32">
                <p class="text-3xl font-semibold text-center py-4 text-red-600">THÔNG TIN CÔ DÂU </p>
                <div class="w-full h-img rounded-xl overflow-hidden relative">
                    <img src="{{ asset('storage/' . $groom->photo) }}" alt="" class="object-cover object-center	h-full w-full">
                    <div class="absolute bg-black-transparent h-24 bottom-0 w-full flex justify-center items-center">
                        <label for="input-file relative"
                            class="bg-white px-4 py-3 rounded-xl opacity-100 cursor-pointer font-semibold">
                            Thay đổi hình ảnh
                            <input type="file"
                                    name="groom_photo"
                                    placeholder="Upload File"
                                    accept="image/*" 
                                    class="opacity-0 absolute top-50 left-80">
                        </label>
                    </div>
                </div>
                <input type="hidden" name="groom_id" value="{{$groom->id}}">
                <div class="input-focus-effect my-5">
                    <input type="text" placeholder="" name="groom_full_name" value="{{ $groom->full_name }}" required />
                    <label>Tên cô dâu</label>
                </div>
                <div class="input-focus-effect">
                    <input type="text" placeholder="" name="groom_second_name" value="{{ $groom->second_name }}"
                        required />
                    <label>Tên ngắn gọn</label>
                </div>
                <div class="input-focus-effect">
                    <input type="text" placeholder="" name="groom_birthday" value="{{ $groom->birthday }}" required />
                    <label>Ngày sinh</label>
                </div>
                <div class="input-focus-effect">
                    <textarea name="groom_description" id="" class="h-52" required>{{ $groom->description }}</textarea>
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
@endsection
@else
Chưa đăng nhập
@endauth
