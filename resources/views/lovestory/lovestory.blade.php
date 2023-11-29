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
{{-- main content  --}}
@section('content')
    <link rel="stylesheet" href="{{ asset('lovestory/style.css') }}">
    <div class="lovestory">
        <div class="plantitle">
            <div class="plantitle-top">
                <a href="{{ route('users.managementWeb') }}" class="plantitle-top_back">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </a>
                <div class="plantitle-top_title">
                    <h2 class="">Chuyện tình yêu</h2>
                </div>
            </div>
            <div class="plantitle-bottom">
                <div class="plantitle-bottom_text">
                    Thêm và chỉnh sữa những câu chuyện tình yêu của bạn!!!
                </div>
            </div>
        </div>
        @php $i = 0; @endphp
        <form action="{{ route('loveStories.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="storyedit">
                <div class="editcontent">
                    @foreach ($loveStories as $loveStory)
                        @php
                            $i++;
                        @endphp
                        <div class="storyitem">
                            <div class="storyitem-img" id="imagePreview"
                                style="
                        background-image: url({{ asset('storage/' . $loveStory->photo) }});
                            ">
                                <div class="imgbot">
                                    <input type="file" id="inputstory{{ $i }}" class="imgbot-btn"
                                        accept=".png, .jpg, .jpeg" name="photo[]" value="0">
                                    <label for="inputstory{{ $i }}">Thay đổi</label>
                                </div>
                            </div>
                            <input type="hidden" value="" name="photoCheck[]" class="img-check">
                            <input type="hidden" value="{{ $loveStory->id }}" name="id[]">
                            <div class="input-focus-effect">
                                <input type="text" placeholder=" " name="title[]" value="{{ $loveStory->title }}"
                                    required>
                                <label>Tiêu đề</label>
                            </div>
                            <div class="input-focus-effect">
                                <input type="text" placeholder=" " name="date[]" value="{{ $loveStory->date }}"
                                    required>
                                <label>Thời gian</label>
                            </div>
                            <div class="input-focus-effect">
                                <textarea type="text" placeholder=" " name="content[]"required>{{ $loveStory->content }}</textarea>
                                <label>Nội dung</label>
                            </div>
                            <div class="storyitem-btn">
                                <button class="storyitem-btn_del"><i class="fa-regular fa-trash-can"></i></button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="editbtn">
                    <a class="editbtn-add">
                        <i class="fa-solid fa-plus"></i> Thêm câu chuyện
                    </a>
                    <button class="editbtn-save">
                        <i class="fa-regular fa-floppy-disk"></i> Lưu thông tin
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('lovestory/js.js') }}"></script>
@endsection
@else
chưa đăng nhập
@endauth
