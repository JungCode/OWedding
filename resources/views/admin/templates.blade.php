<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
        .title_deg
        {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_deg
        {
            border: 2px solid white ;
            width: 100%;
            margin: auto;
            text-align: center;

        }

        .th_deg
        {
            background-color: skyblue;
        }
        .img_size
        {
            width: 200px;
            height: 100px;
        }
        .th
        {
            padding: 10px;
        }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
            @include('admin.header_template')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">


                <table class="table_deg">
                    <tr class="th_deg">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Photo</th>
                        
                    </tr>

                    @forelse($templates as $template)
                    <tr>
                        <td>{{$template->id}}</td>
                        <td>{{$template->name}}</td>
                        <td>{{$template->description}}</td>
                        <td>{{$template->photo}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="16">
                            No Data Found
                        </td>
                    </tr>
                    @endforelse
                </table>

            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>