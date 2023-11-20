


@extends('layouts.toolweb.tools')

@section('title', 'the list of task')

@section('content')
<div class="content">
    <div class="content-wrap">
        <div class="plantitle">
            <div class="plantitle-top">
                <a href="#" class="plantitle-top_back">
                    <i
                        class="fa fa-arrow-circle-left"
                        aria-hidden="true"
                    ></i>
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
                    Bạn có <span>39</span> công việc cần làm cho đám
                    cưới của mình.
                </p>
                <div class="completed-content_mid">
                    <div class="completed-content_mid-progress"></div>
                </div>
                <p class="completed-content_sub">
                    Đã hoàn thành <span>10</span>%
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
            <div class="accordion">
                <div class="accordion-header">
                    <i class="fa-solid fa-ellipsis"></i>
                    <div class="accordion-header_text">
                        <span>Welcome to accordion heading 1</span>
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
                        <div class="inneritem">
                            <div class="inneritem-main">
                                <div class="round">
                                    <input
                                        class="checkbox"
                                        type="checkbox"
                                        id="checkbox1"
                                    />
                                    <label class="labelcheckbox" for="checkbox1"></label>
                                    <!-- <div class="label"></div> -->
                                </div>
                                <div class="inneritem-text">
                                    <span class="inneritem-text_main"
                                        >Viết thiệp cưới</span
                                    >
                                    <p class="inneritem-text_detail">
                                        Nhớ viết cho hết nội ngoại Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi officiis delectus minus repudiandae quod vitae architecto ducimus nulla nihil, aliquam, repellendus saepe mollitia suscipit pariatur velit voluptas, atque quam cumque!
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
                        <div class="innerbtn">
                            <button class="innerbtn-btn"><i class="fa-regular fa-square-plus"></i> Thêm công việc</button>
                        </div>                            
                    </div>
                </div>
            </div>
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
    </div>
</div>
    @forelse ($tasks as $task )
        <div>
            <a href="{{ route('tasks.show',['task' =>$task->id]) }}"
            @class(['line-through' => $task->completed])>
                {{$task->title}}
            </a>
        </div>
        @empty
            <div class="text-center" >there no tasks</div>
    @endforelse

  
@endsection