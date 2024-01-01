<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>
    <div class="container-scroller">
      <div class="main-panel">
        <div class="content-wrapper">
          <h1 class="title_deg">Edit Page</h1>
          <form method="POST" action="{{ route('admin.update', ['admin' => $user->id]) }}">
    @csrf
    @method('PUT')
    <div>
       <label for="id">ID</label>
       <input text="text" name="id" id="id" value="{{ $user -> id }}"/>
       @error('title')
       <p class="error-message">{{ $message }}</p>
       @enderror
    </div>
    <div>
       <label for="name">Name</label>
       <input text="text" name="name" id="name" value="{{ $user -> name }}"/>
       @error('title')
       <p class="error-message">{{ $message }}</p>
       @enderror
    </div>
    <div>
       <label for="email">Email</label>
       <input text="text" name="email" id="email" value="{{ $user -> email }}"/>
       @error('title')
       <p class="error-message">{{ $message }}</p>
       @enderror
    </div>
    <div>
       <label for="google_id">Google ID</label>
       <input text="text" name="google_id" id="google_id" value="{{ $user -> google_id }}"/>
       @error('title')
       <p class="error-message">{{ $message }}</p>
       @enderror
    </div>
    <div>
       <label for="facebook_id">Facebook ID</label>
       <input text="text" name="facebook_id" id="facebook_id" value="{{ $user -> facebook_id }}"/>
       @error('title')
       <p class="error-message">{{ $message }}</p>
       @enderror
    </div>
    <div>
       <label for="first_name">First Name</label>
       <input text="text" name="first_name" id="first_name" value="{{ $user -> first_name }}"/>
       @error('title')
       <p class="error-message">{{ $message }}</p>
       @enderror
    </div>
    <div>
       <label for="last_name">Last Name</label>
       <input text="text" name="last_name" id="last_name" value="{{ $user -> last_name }}"/>
       @error('title')
       <p class="error-message">{{ $message }}</p>
       @enderror
    </div>
    <div>
       <label for="birthday">Birthday</label>
       <input text="text" name="birthday" id="birthday" value="{{ $user -> birthday }}"/>
       @error('title')
       <p class="error-message">{{ $message }}</p>
       @enderror
    </div>
    <div>
       <label for="address">Address</label>
       <input text="text" name="address" id="address" value="{{ $user -> address }}"/>
       @error('title')
       <p class="error-message">{{ $message }}</p>
       @enderror
    </div>
    <div>
       <label for="phone_number">Phone Number</label>
       <input text="text" name="phone_number" id="phone_number" value="{{ $user -> phone_number }}"/>
       @error('title')
       <p class="error-message">{{ $message }}</p>
       @enderror
    </div>
  
    <div>
        <button type="submit">Edit User</button>
    </div>




</form>
        </div>
      </div>
    </div>
  </body>
</html>