@auth
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,700&family=Sigmar+One&display=swap"
            rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
            rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('template-choice/reset.css') }}" />
        {{-- <link rel="stylesheet" href="{{ asset('toolweb/style.css') }}" /> --}}
        <link rel="stylesheet" href="{{ asset('template-choice/style.css') }}" />
    </head>

    <body>
        <div class="header">
            <div class="header_logo">
                <a href="{{ route('users.index') }}"><img class="logo-white logoactive" width="229" height="93" src="{{ asset('image/Picture1.png') }}" /></a>
                <a href="{{ route('users.index') }}"><img class="logo-red" width="229" height="93" src="{{ asset('image/Picture2.png') }}" /></a>
            </div>
            <nav class="header_nav">
                <ul class="header_ul">
                    <li class="header_menuitem">
                        <a href="#4">Xem hướng dẫn</a>
                    </li>
                    <li class="header_menuitem">
                        <a href="#2">Công cụ lập kế hoạch</a>
                    </li>
                    <li class="header_menuitem">
                        <a href="#5">Cặp đôi</a>
                    </li>
                    <li class="header_menuitem">
                        <a href="#3">Điểm nổi bật</a>
                    </li>
    
                </ul>
            </nav>
            <?php
            $user = session('user');
            ?>
            @auth
                <button class="header-btn">{{ $user['name'] }}</button>
            </div>
            <div class="dropdown__wrapper hide dropdown__wrapper--fade-in none">
                <div class="dropdown__group">
                    <div class="dropdown__group-username">{{ $user['name'] }}</div>
                    <div class="dropdown__group-email">{{ $user['email'] }}</div>
                </div>
                <form action="{{ route('users.logout') }}" method="POST">
                    <div class="dropdown-btn">
                        @csrf
                        <a href="{{ route('users.showProfile') }}" class="dropdown-btn_website">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Thiết lập tài khoản</span>
                        </a>
                        @if ($userWeb)
                            <a href="{{ route('users.managementWeb') }}" class="dropdown-btn_website">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span>Quản lý website</span>
                            </a>
                        @else
                            <a href="{{ route('templates.index') }}" class="dropdown-btn_website">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span>Quản lý website</span>
                            </a>
                        @endif
                        <button type="submit" class="dropdown-btn_logout">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span>Đăng xuất</span>
                        </button>
                    </div>
                </form>
            </div>
        @else
            <a class="header-btn" href="{{ route('users.showlogin') }}">Đăng nhập</a>
            </div>
        @endauth
        <section class="main">
            <div class="main-bgr">
                <img src="{{ asset('/image/tempatebgr.jpeg') }}" alt="">
            </div>
            <div class="main-content">
                <h2 class="main-content_top">
                    oWedding
                </h2>
                <h1 class="main-content_mid">Kho giao diện website đám cưới</h1>
                <p class="main-content_bottom">Hãy chọn cho mình một giao diện miễn phí và chuyên nghiệp cho ngày trọng đại
                    của bạn.</p>
            </div>
            <div class="main-bottom">
                <img src="{{ asset('image/choice-line.svg') }}" alt="">
            </div>
        </section>
        <div class="template-wrap">
            <div class="template__list">
                @foreach ($data as $item)
                    <div class="template__item">
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="" class="template__image">
                        <div class="template__content">
                            <div class="template__text">
                                <p class="template__title">{{ $item->name }}</p>
                                <p class="template__des">{{ $item->description }}</p>
                            </div>
                            <div class="template__btn">
                                <a type="submit" class="template__btn-view"
                                    href="{{ route('templates.show', $item->id) }}">Xem trước</a>
                                <a class="template__btn-create" href="{{ route('templates.confirm', $item->id) }}">Tạo
                                    website</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="line">
            !!!Bắt đầu khởi tạo website đám cưới của riêng bạn!!!
        </div>
        <script src="{{ asset('template-choice/js.js') }}"></script>
    </body>

    </html>
@else
    chưa đăng nhập
@endauth