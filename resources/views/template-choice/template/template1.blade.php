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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Shantell+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="{{ asset('template/template1/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/template1/style.css') }}" />
</head>

<body>
    <div class="header">
        <a class="header_logo" href="/">
            <img class="logo-white logoactive" width="229" height="93" src="{{ asset('image/Picture1.png') }}" />
            <img class="logo-red" width="229" height="93" src="{{ asset('image/Picture2.png') }}" />
        </a>
        <nav class="header_nav">
            <ul class="header_ul">
                <li class="header_menuitem">
                    <a href="#">Home</a>
                </li>
                <li class="header_menuitem">
                    <a href="#">Cặp đôi</a>
                </li>
                <li class="header_menuitem">
                    <a href="#">Chuyện tình yêu</a>
                </li>
                <li class="header_menuitem">
                    <a href="#">Sự kiện</a>
                </li>
                <li class="header_menuitem"><a href="#">more</a></li>
            </ul>
        </nav>
    </div>
    <!-- /////////////////////////////home -->
    @php
        if (!$bride && !$groom) {
            $bride = new stdClass();
            $bride->full_name = 'Trung Bui';
            $bride->description = "Mình học bách khoa cơ khí, sinh năm 2k4. Tự mày mò\n" . "học code rồi đi làm remote cho công ty Mỹ 2 năm nay.\n" . "Mỗi tối online 3-4 giờ là xong việc. Lương tháng\n" . "3k6. Nhưng thu nhập chính vẫn là từ nhận các project\n" . "bên ngoài làm thêm. Tuần làm 2, 3 cái nhẹ nhàng 9,\n" . "10k tiền tươi thóc thật không phải đóng thuế. Làm\n" . 'gần được 3 năm mà nhà xe đã mua đủ cả. Nghĩ mà thèm.';
            $bride->photo = 'bride-image/sample.jpeg';

            $groom = new stdClass();
            $groom->full_name = 'Asuna';
            $groom->description = "Asuna là một cô nàng nhỏ nhắn và xinh đẹp. Cô sở hữu\n" . "một mái tóc dài màu cam nâu, hạt dẻ cùng đôi mắt màu\n" . "nâu trông thật khác biệt. Trong những lần xuất hiện\n" . "đầu tiên, cô nàng luôn xuất hiện cùng với bộ trang\n" . "phục màu đỏ, được kết hợp với một chiếc giày bốt cao\n" . "tới đầu gối.Với phong cách phối đồ đầy độc lạ này,\n" . 'Asuna luôn thu hút được mọi người xung quanh.';
            $groom->photo = 'groom-image/sample.jpeg';

            $slides = [(object) ['photo' => 'slide-image/sample1.jpg'], (object) ['photo' => 'slide-image/sample2.jpg'], (object) ['photo' => 'slide-image/sample3.jpg'], (object) ['photo' => 'slide-image/sample4.jpg']];
            $wedding_date = '2023-5-11';
        }
    @endphp
    <div class="home">
        <div class="slider">
            <div class="list">
                @foreach ($slides as $slide)
                    <div class="item">
                        <img src="{{ asset('storage/' . $slide->photo) }}" alt="" />
                    </div>
                @endforeach
            </div>
            <div class="buttons">
                <button id="prev">
                </button>
                <button id="next">></button>
            </div>
            <ul class="dots">
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div class="home-wrap">
            <h3>We're Getting Married!</h3>
            <h2><span>{{ $bride->full_name }}</span> &amp; <span>{{ $groom->full_name }}</span></h2>
            <div class="home-wrap-date">
                <p>SAVE THE DATE<span>{{ $wedding_date }}</span></p>
            </div>
        </div>
        <div class="home-bottom">
            <img src="/public/image/tempate1homebottom.png" alt="" />
        </div>
    </div>

    <!-- /////////secondpage -->
    <div class="couple">
        <div class="couple-wrap">
            <div class="couple-wrap_title">
                <h2 class="">Cặp đôi</h2>
            </div>
        </div>
        <div class="couple-content">
            <!-- ////////////////////////// -->
            <div class="couple-content_male">
                <div class="couple-text">
                    <div class="couple-text_top">
                        <div class="couple-text_top__icon">
                            <a href="">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </div>
                        <span>{{ $bride->full_name }}</span>
                    </div>
                    <div class="couple-text_bottom">
                        {{ $bride->description }}
                    </div>
                </div>
                <div class="couple-img">
                    <img src="{{ asset('storage/' . $bride->photo) }}" alt="" />
                </div>
            </div>
            <!-- ////////////////////////// -->
            <div class="couple-content_female">
                <div class="couple-img">
                    <img src="{{ asset('storage/' . $groom->photo) }}" alt="" />
                </div>
                <div class="couple-text">
                    <div class="couple-text_top">
                        <span>{{ $groom->full_name }}</span>
                        <div class="couple-text_top__icon">
                            <a href="">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div class="couple-text_bottom">
                        {{ $groom->description }}
                    </div>
                </div>
            </div>
        </div>
        <div class="couple-line"></div>
    </div>
    <!-- /////////////////////lovestory -->
    <div class="lovestory">
        <div class="couple-wrap">
            <div class="couple-wrap_title">
                <h2 class="">Chuyện tình yêu</h2>
            </div>
        </div>
        <div class="lovestory-content">
            <div class="lovestory-content_left">
                <div class="lovestory-content_left__img">
                    <img src="{{ asset('image/wedd3.jpg') }}" alt="" />
                </div>
            </div>
            <div class="lovestory-content_right">
                <div class="lovestory-content_right__text">
                    <h3 class="lovestory__text-title">
                        Bạn Có Tin Vào Tình Yêu Online Không?
                    </h3>
                    <p class="lovestory__text-day">December 12 2015</p>
                    <div class="lovestory__text-des">
                        <p>
                            Tôi đã từng không tin vào tình yêu online. Đã
                            từng nghĩ làm sao có thể thích một người chưa
                            từng gặp mặt? Vậy mà giờ đây tôi lại đang như
                            vậy, bây giờ tôi đã hiểu: thế giới ảo tình yêu
                            thật đấy!!! Ngày ấy vu vơ đăng một dòng status
                            trên facebook than thở, vu vơ đùa giỡn nói
                            chuyện với một người xa lạ chưa từng quen. Mà
                            nào hay biết, 4 năm sau người ấy lại là chồng
                            mình.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="lovestory-content">
            <div class="lovestory-content_left">
                <div class="lovestory-content_left__img">
                    <img src="{{ asset('image/wedd3.jpg') }}" alt="" />
                </div>
            </div>
            <div class="lovestory-content_right">
                <div class="lovestory-content_right__text">
                    <h3 class="lovestory__text-title">
                        Bạn Có Tin Vào Tình Yêu Online Không?
                    </h3>
                    <p class="lovestory__text-day">December 12 2015</p>
                    <div class="lovestory__text-des">
                        <p>
                            Tôi đã từng không tin vào tình yêu online. Đã
                            từng nghĩ làm sao có thể thích một người chưa
                            từng gặp mặt? Vậy mà giờ đây tôi lại đang như
                            vậy, bây giờ tôi đã hiểu: thế giới ảo tình yêu
                            thật đấy!!! Ngày ấy vu vơ đăng một dòng status
                            trên facebook than thở, vu vơ đùa giỡn nói
                            chuyện với một người xa lạ chưa từng quen. Mà
                            nào hay biết, 4 năm sau người ấy lại là chồng
                            mình.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="counter">
        <div class="counter-wrap">
            <div class="counter-title">
                <h1 class="counter-title_main">The big day</h1>
                <h1 class="counter-title_pass">has passed</h1>
            </div>
            <ul id="countdown">
                <li id="days">
                    <div class="number">00</div>
                    <div class="label">Days</div>
                </li>
                <li id="hours">
                    <div class="number">00</div>
                    <div class="label">Hours</div>
                </li>
                <li id="minutes">
                    <div class="number">00</div>
                    <div class="label">Minutes</div>
                </li>
                <li id="seconds">
                    <div class="number">00</div>
                    <div class="label">Seconds</div>
                </li>
            </ul>
        </div>
    </div>
    <div class="event">
        <div class="couple-wrap">
            <div class="couple-wrap_title">
                <h2 class="">Sự kiện cưới</h2>
            </div>
        </div>
        <div class="event-content">
            <div class="event-left">
                <img src="https://cdn.biihappy.com/ziiweb/default/template/62ef3cfd4c248a18ec5a9b5a/8cf390dccd7f841cc2fea94f1f2ad7a1.jpg"
                    alt="">
            </div>
            <div class="event-right">
                @if ($events)
                    @foreach ($events as $event)
                        <div class="event-item">
                            <h3 class="event-item_title">{{$event->name}}</h3>
                            <div class="event-item_content">
                                <div class="event-item_img">
                                    <img src="{{ asset('storage/' . $event->photo) }}" alt="">
                                </div>
                                <div class="event-item_main">
                                    <div class="datetime">
                                        <div class="eventday"><i
                                                class="fa-regular fa-calendar-check"></i><span>{{$event->date}}</span></div>
                                        <div class="eventtime"><i class="fa-regular fa-clock"></i><span>{{$event->time}}</span>
                                        </div>
                                    </div>
                                    <div class="address">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p>{{$event->address}}</p>
                                    </div>
                                    <div class="link">
                                        <a href="{{$event->link}}" target="_blank">Xem bản đồ</a>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="event-item">
                        <h3 class="event-item_title">LỄ CƯỚI NHÀ NỮ</h3>
                        <div class="event-item_content">
                            <div class="event-item_img">
                                <img src="{{ asset('image/wedd3.jpg') }}" alt="">
                            </div>
                            <div class="event-item_main">
                                <div class="datetime">
                                    <div class="eventday"><i
                                            class="fa-regular fa-calendar-check"></i><span>2023-02-10</span></div>
                                    <div class="eventtime"><i class="fa-regular fa-clock"></i><span>11:30 AM</span>
                                    </div>
                                </div>
                                <div class="address">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p> 187 Hà Huy Tập, P. Hoà Khê, Quận Thanh Khê, Đà Nẵng</p>
                                </div>
                                <div class="link">
                                    <a href="#">Xem bản đồ</a>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="{{ asset('template/template1/js.js') }}"></script>
</body>

</html>
