@extends('layouts.toolweb.tools')
@section('taskPercent', number_format(30, 0, ',', '.'))
@section('budget_current', number_format(500000, 0, ',', '.'))
@section('content')
    <div style="width: 80%">
        <section class="flex bg-white rounded-3xl gap-40 border border-solid border-slate-300 mt-12 h-48 justify-center items-center">
            <div class="h-100 w-72 text-center">
                <div class="text-4xl font-bold mb-4">1</div>
                <div class="text-slate-400 font-medium text-3xl">Số khách mời</div>
            </div>
            <div class="h-100 w-72 text-center">
                <div class="text-4xl font-bold mb-4">30%</div>
                <div class="text-slate-400 font-medium text-3xl">Kế hoạch cưới</div>
            </div>
            <div class="h-100 w-72 text-center ">
                <div class="text-4xl font-bold mb-4">500.000đ</div>
                <div class="text-slate-400 font-medium text-3xl">Ngân sách cưới</div>
            </div>
        </section>
        <section class="rounded-t-3xl border border-solid border-slate-300 mt-12 overflow-hidden ">
            <div class="bg-wedding flex">
                <div class="w-full">
                    <h2 class="py-9 text-3xl text-center font-semibold text-slate-600 pl-4">
                        Chỉnh sửa thông tin website
                    </h2>
                </div>
            </div>
        </section>
        <section class="bg-white rounded-b-3xl border border-solid border-t-0 border-slate-300 mb-11 overflow-hidden py-5 px-9 grid grid-cols-3 gap-x-10 gap-y-4">
            <a class="rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5">
                Thông tin Cô Dâu & Chú Rể
            </a>
            <a class="rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5">
                Sự kiện cưới
            </a>
            <a class="rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5">
                Câu chuyện tình yêu
            </a>
            <a class="rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5">
                Quản lí khách mời
            </a>
            <a class="rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5">
                Cài đặt địa chỉ website
            </a>
            <a class="rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5">
                Tạo mã QR
            </a>
        </section>
    </div>
@endsection
