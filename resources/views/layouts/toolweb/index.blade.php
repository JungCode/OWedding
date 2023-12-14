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
{{-- main content  --}}
@section('content')
    <div style="width: 80%" class="font-['Quicksand']">
        <section
            class="flex bg-white rounded-3xl gap-40 border border-solid border-slate-300 mt-12 h-48 justify-center items-center">
            <div class="h-100 w-72 text-center">
                <div class="text-4xl font-bold mb-4">{{$totalGuest}}</div>
                <div class="text-slate-400 font-medium text-3xl">Số khách mời</div>
            </div>
            <div class="h-100 w-72 text-center">
                <div class="text-4xl font-bold mb-4">
                    {{ $taskCount ? number_format(($completedCount / $taskCount) * 100, 0, ',', '.') : 0 }}%</div>
                <div class="text-slate-400 font-medium text-3xl">Kế hoạch cưới</div>
            </div>
            <div class="h-100 w-72 text-center ">
                <div class="text-4xl font-bold mb-4">{{ number_format($currentBudget, 0, ',', '.') }}</div>
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
        <section
            class="bg-white rounded-b-3xl border border-solid border-t-0 border-slate-300 mb-11 overflow-hidden py-5 px-9 grid grid-cols-3 gap-x-10 gap-y-4">
            <a class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5"
                href="{{ route('fiances.index') }}">
                <i class="bi bi-person-heart"></i>
                Thông tin Cô Dâu & Chú Rể
            </a>
            <a class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5"
                href="{{ route('events.index') }}">
                <i class="bi bi-calendar-event"></i>
                Sự kiện cưới
            </a>
            <a class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5"
                href="{{ route('loveStories.index') }}">
                <i class="bi bi-chat-square-heart"></i>
                Câu chuyện tình yêu
            </a>
            <a href="{{route('guest.index')}}"
                class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5">
                <i class="bi bi-people"></i>
                Quản lí khách mời
            </a>
            <a class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5"
                href="{{ route('slides.index') }}">
                <i class="bi bi-palette"></i>
                Chỉnh Sửa Giao Diện
            </a>
            <a
                class="cursor-pointer rounded-xl bg-slate-100 hover:bg-slate-200 transition border border-solid border-slate-300 text-slate-600 font-semibold py-3 px-5">
                <i class="bi bi-qr-code-scan"></i>
                Tạo mã QR
            </a>
        </section>
    </div>
@endsection
