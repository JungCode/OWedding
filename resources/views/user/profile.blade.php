<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,700&family=Sigmar+One&display=swap"
            rel="stylesheet"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="{{asset('profile/reset.css')}}" />
        <link rel="stylesheet" href="{{asset('profile/style.css')}}" />
    </head>
    <body>
        <div class="header">
            <div class="header_logo">
                <a href="{{route('users.index')}}">
                    <img
                        class="logo-white"
                        width="229"
                        height="93"
                        src="{{asset('image/Picture2.png')}}"
                    />
                </a>
            </div>
            <nav class="header_nav">
                <ul class="header_ul">
                    <li class="header_menuitem">
                        <a href="#">Xem hướng dẫn</a>
                    </li>
                    <li class="header_menuitem">
                        <a href="#">Công cụ lập kế hoạch</a>
                    </li>
                    <li class="header_menuitem">
                        <a href="#">Cặp đôi đã tạo</a>
                    </li>
                    <li class="header_menuitem">
                        <a href="#">Điểm nổi bật</a>
                    </li>
                    <li class="header_menuitem"><a href="#">Bảng giá</a></li>
                </ul>
            </nav>
            <button class="Button">Đăng Xuất</button>
        </div>
        <div class="profile">
            <div class="profile-content">
                <div class="profile-content_img">
                    <div class="profile-content_img_title">
                        <span><i class="fa-regular fa-gears"></i></span>
                    </div>
                    <div class="profile-content_img_swap">
                        <div class="swap_item">
                            <a href="#">Profile setting</a>
                            <a href="#">Change password</a>
                        </div>
                    </div>
                </div>
                <form class="profile-content_infor" enctype="multipart/form-data" method="POST" action="{{route('users.update',$user['id'])}}">
                    @csrf
                    @method('PUT')
                    <div class="profile_header"><p>Edit Your Profile</p></div>
                    <div class="profile_imgchange">
                        <div class="profile_imgchange-img">
                            <img
                                src="{{asset('storage/'. $user['photo'])}}" 
                                alt=""
                                class="profile_imgchange-img-avatar"
                            />
                        </div>
                        <div class="profile_imgchange-text">
                            <p>Ảnh đại diện</p>
                            <small
                                >Chỉ cho phép định dạng PNG hoặc JPG. và kích
                                thước phải lớn hơn 500x500px.</small
                            >
                        </div>
                        <div class="profile_imgchange-button">
                            <span class="label"
                                ><i class="fa fa-pencil" aria-hidden="true"></i>
                                Upload File
                            </span>
                            <input
                                type="file"
                                name="photo"
                                class="upload-box"
                                placeholder="Upload File"
                                accept="image/*"
                            />
                        </div>
                    </div>
                    <div class="profile_form">
                        <div class="form-row">
                            <div class="input-focus-effect">
                                <input type="text" placeholder=" " value="{{$user['first_name']}}" name="firstName"/>
                                <label>Fisrt Name</label>
                            </div>
                            <div class="input-focus-effect">
                                <input type="text" placeholder=" " value="{{$user['last_name']}}" name="lastName"/>
                                <label>Last Name</label>
                            </div>
                        </div>
                        <div class="input-focus-effect">
                            <input type="text" placeholder=" " value="{{$user['email']}}" readonly/>
                            <label>Email</label>
                        </div>
                        <div class="form-row">
                            <div class="input-focus-effect">
                                <input name="birthday" type="date" data-date="yyyy-mm-dd" data-date-format="YYYY-MM-DD" min="1943-11-01" max="2023-11-01" aria-required="true" value="{{$user['birthday']}}">
                                <label>Birtday</label>
                            </div>
                            <div class="input-focus-effect">
                                <input type="number" placeholder=" " value="{{$user['phone_number']}}" name="phone"/>
                                <label>Phone Number</label>
                            </div>
                        </div>
                        <div class="input-focus-effect">
                            <input type="text" placeholder=" " value="{{$user['address']}}" name="address"/>
                            <label>Address</label>
                        </div>
                    </div>
                    <div class="profile-button">
                        <button class="Button"><i class="fa fa-save" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;SAVE</button>
                    </div>
                </form>
                <!-- <div class="tinasfnaskfmsaca">
                    <address>sadasd
                        <datagrid>sadsa</datagrid>
                    </address>
                </div> -->
                <div class="profile-content_changepass"></div>
            </div>
        </div>
    </body>
</html>
