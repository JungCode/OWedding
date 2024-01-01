<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,800;1,300;1,400;1,700&family=Sigmar+One&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ asset('404page/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('404page/style.css') }}" />
  </head>
  <body>
    <div class="errorpage">
      <h1 class="errorpage-title">Oopps!</h1>
      <div class="errorpage-img">
        <img src="{{ asset('404page/coding.png') }}" alt="" />
      </div>
      <div class="errorpage-content">
        <h2 class="errorpage-content_top">PAGE NOT FOUND</h2>
        <h3 class="errorpage-content_sub">
          Sorry, the page you're looking for doesn't exist. <br />
          If you think somethin is broken,<br />
          report a problem.
        </h3>
      </div>
      <div class="errorpage-button">
        <button class="Button"><a href="{{ route('users.index') }}">VỀ TRANG CHỦ</a></button>
      </div>
    </div>
    day la 404page
  </body>
</html>
