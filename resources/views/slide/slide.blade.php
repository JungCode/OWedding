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
    <link rel="stylesheet" href="{{ asset('editui/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('editui/style.css') }}" />
    <div class="editui">
        <div class="plantitle">
            <div class="plantitle-top">
                <a href="{{ route('users.managementWeb') }}" class="plantitle-top_back">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                </a>
                <div class="plantitle-top_title">
                    <h2 class="">Chỉnh sữa giao diện</h2>
                </div>
            </div>
            <div class="plantitle-bottom">
                <div class="plantitle-bottom_text">
                    Thay đổi giao diện cảu trang web đúng với mong muốn của bạn!
                </div>
            </div>
        </div>
        <form class="uiitemwrapper" method="POST" action="{{ route('slides.update', 1) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @php
                $i = 0;
            @endphp
            @foreach ($slides as $slide)
                @php
                    $i++;
                @endphp
                <div class = "edituiitem">
                    <div class="edituiitem-title">Hình ảnh slide {{ $i }}</div>
                    <div class="edituiitem-content">
                        <div class="edituiitem-img">
                            <div id="imagePreview"
                                style="
                                    background-image: url({{ asset('storage/' . $slide->photo) }});
                                ">
                            </div>
                        </div>
                        <div class="edituiitem-btn">
                            <input type="file" id="slider{{ $i }}" class="imgUpload"
                                accept=".png, .jpg, .jpeg" name="slide{{ $i }}" placeholder="Upload File" />
                            <label for="slider{{ $i }}" class="imgUploadlable">Thay đổi hình ảnh</label>
                        </div>
                        <p>Kích thước khuyến nghị: 1920x1080px</p>
                    </div>
                </div>
            @endforeach
            <div class="btnsave">
                <button type="submit"><i class="fas fa-save"></i> Lưu thông tin</button>
            </div>
        </form>
    </div>
    <script src="{{ asset('editui/js.js') }}"></script>
@endsection
@else
Chưa đăng nhập
@endauth
