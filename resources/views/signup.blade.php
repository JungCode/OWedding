<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OWedding</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('signup/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('signup/style.css') }}">
</head>

<body>
    <div class="signup">
        <div class="signup__content">
            <h1 class="signup__heading">Sign Up</h1>
            <h2 class="signup__caption">Sign up with</h2>
            <div class="signup-social">
                <div class="signup-social__item">
                    <i class="fab fa-google signup-social__icon"></i>
                    <span class="signup-social__text">Sign up with Google</span>
                </div>
                <div class="signup-social__item">
                    <i class="fab fa-facebook signup-social__icon"></i>
                    <span class="signup-social__text">Sign up with Facebook</span>
                </div>
            </div>
            <form class="signup-form" autocomplete="off" method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="signup-form__group">
                    <label for="name" class="signup-form__label">Name</label>
                    <div class="signup-form__validate">
                        <input type="text" class="signup-form__input" id="name" name="name" required
                            placeholder="Name" value="{{old('name')}}">
                        <div class="signup-form__check">
                            <i class="fa fa-check"></i>
                        </div>
                    </div>
                    @error('name')
                        <div class="signup-form_nameerr">{{ $message }}</div>
                    @enderror
                </div>
                <div class="signup-form__group">
                    <label for="email" class="signup-form__label">Email</label>
                    <input type="email" class="signup-form__input" id="email" name="email" required
                        placeholder="Email" value='{{old('email')}}'>
                    @error('email')
                        <div class="signup-form_emailerr">{{ $message }}</div>
                    @enderror
                </div>

                <div class="signup-form__row">
                    <div class="signup-form__group">
                        <label for="password" class="signup-form__label">Password</label>
                        <input type="password" class="signup-form__input" id="password" name="password" required
                            placeholder="Password">
                    </div>
                    <div class="signup-form__group">
                        <label for="password" class="signup-form__label">Confirm Password</label>
                        <input type="password" class="signup-form__input" id="password" name="retype_password" required
                            placeholder="Confirm Password">
                    </div>
                    @error('password')
                        <p class="signup-form__row-notmatch">{{ $message }}</p>
                    @enderror
                    @error('retype_password')
                        <p class="signup-form__row-notmatch">{{ $message }}</p>
                    @enderror
                </div>
                <!-- <div class="signup-form__term">
                <input type="checkbox" name="" id="term">
                <label for="term">I have read and agree with term</label>
            </div> -->
            <button class="signup-form__submit" type="submit">
                <i class="fa fa-arrow-right"></i>
            </button>
            <p class="signup__already">Already signin have an account? <a href="{{ route('login') }}">Login</a></p>
        </form>
    </div>
    <div class="signup__image">
        <img src="/image/Signinimg.png" alt="">
    </div>
   </div>
</body>

</html>
