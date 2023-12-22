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
            @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">


                <table class="table_deg">
                    <tr class="th_deg">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Google ID</th>
                        <th>Facebook ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birthday</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Current Budget</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @forelse($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->google_id}}</td>
                        <td>{{$user->facebook_id}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->birthday}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>{{$user->current_budget}}</td>
                        <td>
                        <a href="{{ route('admin.edit', ['admin'=>$user]) }}">Go to Edit Page</a>
                        </td>
                        <td>
                        <form action="{{ route( 'admin.destroy', ['admin'=>$user] ) }}" method="POST">
                         @csrf
                         @method('DELETE')
                         <button type="submit">Delete</button>
                        </form>
                        
                        </td>
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