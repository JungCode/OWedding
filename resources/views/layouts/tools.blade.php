<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
    .btn {
      @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50;
    }
    label{
        @apply block uppercase text-slate-700 mb-2
    }
    input, textarea {
        @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
    }
    .error{
        @apply text-red-500 text-sm
    }
    </style>
    {{-- blade-formatter-enable --}}
    <title>task list</title>
    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <div class="relative">
        @auth
        <form class="absolute top-0 right-0" action="{{ route('users.logout') }}" method="POST">
            @csrf
            <button>Log out</button>
        </form>
        <div class="mb-4 flex gap-2">
            <a href="{{ route('tasks.index') }}">
                <button class="box-decoration-clone bg-gradient-to-r from-gray-600 to-red-500 text-white px-2" type="submit">Task List</button>
            </a>
            <nav class="">
                <a href="{{ route('tasks.create') }}" >
                    <button class="font-medium text-white box-decoration-slice bg-gradient-to-r from-blue-600 to-green-500" type="submit">Create task</button>
                </a>
            </nav>
        </div>
    </div>
    <h1 class="mb-4 text-2xl">@yield('title')</h1>
    <div x-data="{ flash: true }">
    @if (session()->has('success'))
        <div x-show="flash" x-transition
            class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700" 
            role="alert">
            <strong class="font-bold">Success!</strong>
            <div>{{ session('success') }}</div>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" @click="flash = false"
                    stroke="currentColor" class="h-6 w-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
    @endif 
        @yield('content')
    </div>
    @else
    <h1>You haven't login yet</h1>
    <a class="" href="{{ route('users.login') }}">
    <button class="box-decoration-clone bg-gradient-to-r from-indigo-600 to-pink-500 text-white px-2" type="submit">Click here to login</button>
    </a>
    @endauth
    
</body>
</html>