@extends('layouts.toolweb.tools')
@auth
    @section('content')
        <div class="flex justify-end">
            <button
                class="showModalCategory transition bg-gray-700 hover:bg-gray-900 duration-300 pl-12 pr-12 pt-2 pb-2 rounded-lg text-slate-50 mb-5 "
                data-userid="{{ $userid }}" data-idcategory="" data-namecategory="">
                <i class="fa-solid fa-plus"></i>
                Thêm danh mục
            </button>
        </div>
        @forelse ($budgetCategories as $budgetCategory)
            <div>
                @php
                    $total_expected_cost = 0;
                    $total_actual_cost = 0;
                @endphp
                <table class="border-solid border border-slate-300 w-full mb-20 ">
                    <tr>
                        <td colspan="4">
                            <div
                                class="pt-6 pb-6 text-3xl bg-slate-200 text-3xl text-center font-semibold text-slate-600 pl-4 relative z-0">
                                {{ $budgetCategory['budget_category_name'] }}
                                <div
                                    class="w-10 h-10 hover:bg-slate-300 flex justify-center rounded-full absolute right-16 top-5 ">
                                    <button class="showModalCategory"
                                        data-namecategory="{{ $budgetCategory['budget_category_name'] }}"
                                        data-idcategory="{{ $budgetCategory['id'] }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </div>
                                <div
                                    class="w-10 h-10 hover:bg-slate-300 flex justify-center rounded-full absolute right-5 top-5">
                                    <form action="{{ route('budgetCategories.destroy',$budgetCategory['id']) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="" type="submit" >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-solid border-b-2 border-slate-300">
                        <td class="text-left text-xl pl-4 pt-6 pb-6 text-slate-600 ">MỤC CHI TIÊU</th>
                        <td class="text-right text-xl pl-4 pt-6 pb-6 text-slate-600">CHI PHÍ DỰ KIẾN</th>
                        <td class="text-right text-xl pl-4 pt-6 pb-6 text-slate-600">CHI PHÍ THỰC TẾ</th>
                    </tr>
                    @foreach ($budgetCategory['budgetItems'] as $item)
                        @php
                            $total_expected_cost += $item['expected_cost'];
                            $total_actual_cost += $item['actual_costs'];
                        @endphp
                        <tr class="border-solid border border-slate-300">
                            <td class="text-slate-600 pl-4 pt-6 pb-6">{{ $item['item_name'] }}</td>
                            <td class="text-right pl-4 pt-6 pb-6 text-slate-600">
                                {{ number_format($item['expected_cost'], 0, ',', '.') }} đ
                            </td>
                            <td class="text-right pl-4 pt-6 pb-6 text-slate-600">
                                {{ number_format($item['actual_costs'], 0, ',', '.') }} đ
                            </td>
                            <td class="text-slate-600 flex justify-center">
                                <div class="w-10 h-10 hover:bg-slate-200 flex justify-center rounded-full">
                                    <button class="showModal" data-id="{{ $item['id'] }}" data-name="{{ $item['item_name'] }}"
                                        data-expected="{{ $item['expected_cost'] }}" data-actual="{{ $item['actual_costs'] }}"
                                        data-idcategory="{{ $budgetCategory['id'] }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </div>
                                <div class="w-10 h-10 hover:bg-slate-200 flex justify-center rounded-full">
                                    <form action="{{ route('budgetItems.destroy', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="border-solid border-t-2 border border-slate-300">
                        <td class="pl-4 pt-6 pb-6">
                            <button class="text-sky-500 hover:text-rose-500	showModal" data-id="" data-name=""
                                data-expected="" data-actual="" data-idcategory="{{ $budgetCategory['id'] }}">
                                <i class="fa-regular fa-square-plus "></i>
                                thêm mục chi tiêu
                            </button>
                        </td>
                        <td class="text-right pl-4 pt-6 pb-6 text-slate-600"></td>
                        <td class="text-right pl-4 pt-6 pb-6 text-slate-600"></td>
                        <td class="text-right pl-4 pt-6 pb-6 text-white">
                            <i class="fa-solid fa-trash"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    <tr class="border-solid border-b-2 border-slate-300">
                        <td class="pl-4 font-semibold text-slate-600 pt-6 pb-6 text-slate-600">TỔNG</td>
                        <td class="text-right pl-4 pt-6 pb-6 text-slate-600 font-semibold">
                            {{ number_format($total_expected_cost, 0, ',', '.') }} đ
                        </td>
                        <td class="text-right pl-4 pt-6 pb-6 text-slate-600 font-semibold">
                            {{ number_format($total_actual_cost, 0, ',', '.') }} đ
                        </td>
                    </tr>
                </table>
            </div>
        @empty
            <p>chua co gi</p>
        @endforelse


        {{-- modals for item --}}
        <div
            class="z-10 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden modal opacity">
            <div class=" bg-white rounded-lg shadow-lg w-1/2">
                <div class="h-20 border-b border-solid border-slate-300 px-7 py-2 bg-rose-500 rounded-t-lg relative">
                    <h3 class="text-white h-full text-3xl py-3">Thông tin chi tiêu</h3>
                    <i
                        class="text-white fa-solid fa-circle-xmark absolute right-5 top-3 text-3xl opacity-50 hover:opacity-100 cursor-pointer closeModal "></i>
                </div>
                <div class="px-7">
                    <form id="form" method="POST" action="" class="my-5">
                        @csrf
                        <input type="hidden" name="_method" id="methodField" value="POST">
                        <input type="hidden" name="id" id="item-id" value="">
                        <input type="hidden" name="id_category" id="category-id" value="">
                        <label for="item-name block">
                            <span class="block mb-3">Tiêu đề chi tiêu</span>
                            <input
                                class="h-20 mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                                placeholder="Nhập tiêu đề công việc..." type="text" name="iname" id="item-name"
                                value="">
                        </label>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mb-8">
                            <label for="item-expected block">
                                <span class="block mt-5 mb-2">Chi phí dự kiến</span>
                                <div class="grid grid-cols-12">
                                    <input
                                        class="h-20 col-span-10 mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 inline-block w-full rounded-l-md focus:ring-1"
                                        placeholder="Chi phí dự kiến" type="text" name="item_expected" id="item-expected"
                                        value="">
                                    <div
                                        class="inline-block mt-1 col-span-2 text-center pt-5 border border-l-0 border-slate-300 rounded-r-md border-solid shadow-sm text-slate-500">
                                        VND
                                    </div>
                                </div>
                            </label>
                            <label for="item-actual block">
                                <span class="block mt-5 mb-2 ">Chi phí thực tế</span>
                                <div class="grid grid-cols-12">
                                    <input
                                        class="h-20 col-span-10 mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 inline-block w-full rounded-l-md focus:ring-1"
                                        placeholder="Chi phí thực tế" type="text" name="item_actual" id="item-actual"
                                        value="">
                                    <div
                                        class="inline-block mt-1 col-span-2 text-center pt-5 border border-l-0 border-slate-300 rounded-r-md border-solid shadow-sm text-slate-500">
                                        VND
                                    </div>
                                </div>
                            </label>
                        </div>
                        <button type="submit" id="btn-submit"
                            class="transition duration-300 py-5 bg-gray-700 hover:bg-gray-900 px-3 py-1 rounded text-white mr-1 w-full">
                            <i class=\fa-regular fa-floppy-disk\></i>
                            Lưu thông tin
                        </button>
                    </form>
                </div>
            </div>
        </div>
        {{-- modals for category --}}
        <div
            class="z-10 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden modalCategory opacity">
            <div class=" bg-white rounded-lg shadow-lg w-1/2">
                <div class="h-20 border-b border-solid border-slate-300 px-7 py-2 bg-rose-500 rounded-t-lg relative">
                    <h3 class="text-white h-full text-3xl py-3">Thông tin danh mục</h3>
                    <i
                        class="text-white fa-solid fa-circle-xmark absolute right-5 top-3 text-3xl opacity-50 hover:opacity-100 cursor-pointer closeModalCategory"></i>
                </div>
                <div class="px-7">
                    <form id="formCategory" method="POST" action="" class="my-5">
                        @csrf
                        <input type="hidden" name="_method" id="methodFieldCategory" value="POST">
                        <input type="hidden" name="id_category" id="category-id-forcategory" value="">
                        <input type="hidden" name="id_user" id="" value="{{ $userid }}">
                        <label for="item-name block">
                            <span class="block mb-3">Tên danh mục</span>
                            <input
                                class="h-20 mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md focus:ring-1"
                                placeholder="Nhập tên danh mục..." type="text" name="cname" id="category-name"
                                value="">
                        </label>
                        <button type="submit" id="btn-submit-category"
                            class="mt-7 transition duration-300 py-5 bg-gray-700 hover:bg-gray-900 px-3 py-1 rounded text-white mr-1 w-full">
                            <i class=\fa-regular fa-floppy-disk\></i>
                            Lưu thông tin
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
@else
    chua co gi
@endauth
