@extends('layouts.toolweb.tools')
@section('taskPercent', ($completedCount / $taskCount) * 100)
@section('title', 'the list of task')
@section('budget_current', number_format($currentBudget, 0, ',', '.'))
@section('content')
    <div class="content">
        <div class="content-wrap">
            <div class="plantitle">
                <div class="plantitle-top">
                    <a href="#" class="plantitle-top_back">
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
                        Bạn có <span>{{ $taskCount }}</span> công việc cần làm cho đám
                        cưới của mình.
                    </p>
                    <div class="completed-content_mid">
                        <div class="completed-content_mid-progress"></div>
                    </div>
                    <p class="completed-content_sub">
                        Đã hoàn thành <span>{{ ($completedCount / $taskCount) * 100 }}</span>%
                    </p>
                </div>
                <div class="completed-button">
                    <button class="btnaddfirst">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Thêm danh mục công việc
                    </button>
                </div>
            </div>
            <!-- //////// -->
            <div class="acorrdian-wrap">
                @php
                    $idCheckBox = 0;
                @endphp
                @for ($i = 0; $i < 7; $i++)
                    <div class="accordion">
                        <div class="accordion-header">
                            <i class="fa-solid fa-ellipsis"></i>
                            @php
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
                            @endphp
                            <div class="accordion-header_text">
                                <span>{{ $period }}</span>
                            </div>

                            <div class="accordion-header-icon">
                                <div class="accordion-header-icon_edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </div>
                                <div class="accordion-header-icon_delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                </div>
                                <div class="accordion-header-icon_drop">
                                    <i class="down fa fa-angle-down icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-content">
                            <div class="accordion-content-inner">
                                @forelse ($tasks as $task)
                                    @php
                                        $idCheckBox++;
                                    @endphp
                                    {{-- <div>
                                        <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                                            @class(['line-through' => $task->completed])>
                                            {{ $task->title }}
                                        </a>
                                    </div> --}}
                                    @if ($task->period == $period)
                                        <div class="inneritem">
                                            <div class="inneritem-main">
                                                <div class="round">
                                                    <input class="checkbox" type="checkbox"
                                                        id="checkbox{{ $idCheckBox }}" {{($task->completed) ? "checked" : null}}/>
                                                    <label class="labelcheckbox" for="checkbox{{ $idCheckBox }}"></label>
                                                    <!-- <div class="label"></div> -->
                                                </div>
                                                <div class="inneritem-text">
                                                    <span class="inneritem-text_main">{{ $task->title }}</span>
                                                    <p class="inneritem-text_detail">
                                                        {{ $task->description }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="inneritem-icon editlist">
                                                <i class="fa-regular fa-pen-to-square" aria-hidden="true"></i>
                                            </div>
                                            <div class="inneritem-icon deletelist">
                                                <!-- <i class="fa-solid fa-info"></i> -->
                                                <i class="fa-solid fa-trash-can removelist" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <div class="text-center w-full">there no tasks</div>
                                @endforelse
                                <div class="innerbtn">
                                    <button class="innerbtn-btn"><i class="fa-regular fa-square-plus"></i> Thêm công
                                        việc</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
                <div class="completed-button btnsub">
                    <button class="btnaddfirst">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Thêm danh mục công việc
                    </button>
                    <!-- <button>
                                                                    <i class="fas fa-save    "></i>
                                                                    SAVE
                                                                </button> -->
                </div>
            </div>
            @forelse ($tasks as $task)
                <div>
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>
                        {{ $task->title }}
                    </a>
                </div>
            @empty
                <div class="text-center w-full">there no tasks</div>
            @endforelse
        </div>
    </div>
    <!-- //////modal -->
    <!-- //////////////////////modalfist -->
    <div class="modaladdfirst">
        <header class="modaladdfirst-header">
            <h3>Thêm mới danh mục công việc</h3>
            <div class="modaladdfirst-header_close">
                <i class="close fa fa-times"></i>
            </div>
        </header>
        <div class="modaladdfirst-body">
            <input type="text" placeholder="Nhận tên danh mục" />
            <button><i class="fa fa-plus" aria-hidden="true"></i>Thêm mới</button>
        </div>
    </div>
    <!-- ///////////////edit -->
    <div class="modaleditfirst">
        <header class="modaleditfirst-header">
            <h3>Cập nhật danh mục công việc</h3>
            <div class="modaleditfirst-header_close">
                <i class="close fa fa-times"></i>
            </div>
        </header>
        <div class="modaleditfirst-body">
            <input type="text" placeholder="Nhận tên danh mục" />
            <button><i class="fa-regular fa-floppy-disk"></i> Lưu thông tin</button>
        </div>
    </div>
    <!-- //////////////////delete -->
    <div class="modaldeletefirst">
        <header class="modaldeletefirst-header">
            <h3>Bạn thực sự muốn xoá danh mục này?</h3>
            <p>Sau khi đã xoá, dữ liệu sẽ không thể khôi phục lại được. Vậy nên, xin vui lòng chắc chắn hành động của mình.
            </p>
        </header>
        <div class="modaldeletefirst-body">
            <button class="modaldeletefirst-body_confirm">Xác nhận</button>
            <button class="modaldeletefirst-body_cancel">Hủy</button>
        </div>
    </div>
    <!-- ///////////////////////modalsecond -->
    <div class="modaladdsecond">
        <header class="modaladdsecond-header">
            <h3>Thêm mới công việc</h3>
            <div class="modaladdsecond-header_close">
                <i class="close fa fa-times"></i>
            </div>
        </header>
        <div class="modaladdsecond-body">
            <div class="modaladdsecond-check">
                <div class="round">
                    <input class="checkbox" type="checkbox" id="checkboxmodal" />
                    <label class="labelcheckbox" for="checkboxmodal"></label>
                    <!-- <div class="label"></div> -->
                </div>
                <div class="modaladdsecond-check_text">
                    <span>Đã hoàn thành</span>
                </div>
            </div>
            <div class="modaladdsecond-title">
                <span>Tiêu đề công việc</span>
                <input type="text" placeholder="Nhập tiêu đề công việc..">
            </div>
            <div class="modaladdsecond-note">
                <span>Ghi chú</span>
                <textarea name="textarea" placeholder="Bạn có thể mô tả chi tiết về công việc mình phải làm..."></textarea>
            </div>
            <button><i class="fa fa-plus" aria-hidden="true"></i>Thêm mới</button>
        </div>
    </div>
    <!-- ////////////edit -->
    <div class="modaleditsecond">
        <header class="modaleditsecond-header">
            <h3>Thông tin công việc</h3>
            <div class="modaleditsecond-header_close">
                <i class="close fa fa-times"></i>
            </div>
        </header>
        <div class="modaleditsecond-body">
            <div class="modaleditsecond-check">
                <div class="round">
                    <input class="checkbox" type="checkbox" id="checkboxmodalsecond" />
                    <label class="labelcheckbox" for="checkboxmodalsecond"></label>
                    <!-- <div class="label"></div> -->
                </div>
                <div class="modaleditsecond-check_text">
                    <span>Đã hoàn thành</span>
                </div>
            </div>
            <div class="modaleditsecond-title">
                <span>Tiêu đề công việc</span>
                <input type="text" placeholder="Nhập tiêu đề công việc..">
            </div>
            <div class="modaleditsecond-note">
                <span>Ghi chú</span>
                <textarea name="textarea" placeholder="Bạn có thể mô tả chi tiết về công việc mình phải làm..."></textarea>
            </div>
            <button><i class="fa-regular fa-floppy-disk"></i> Lưu thông tin</button>
        </div>
    </div>
    <!-- ////////delete -->
    <div class="modaldeletesecond">
        <header class="modaldeletesecond-header">
            <h3>Bạn thực sự muốn xoá công việc này?</h3>
            <p>Sau khi đã xoá, dữ liệu sẽ không thể khôi phục lại được. Vậy nên, xin vui lòng chắc chắn hành động của mình.
            </p>
        </header>
        <div class="modaldeletesecond-body">
            <button class="modaldeletesecond-body_confirm">Xác nhận</button>
            <button class="modaldeletesecond-body_cancel">Hủy</button>
        </div>
    </div>
    <div class="modal-bg"></div>
    <script src="{{ asset('todolist/js.js') }}"></script>
@endsection
