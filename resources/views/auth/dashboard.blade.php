<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-200 font-sans">
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-2xl bg-white p-6 rounded-md shadow-md">
            <div class="text-center mb-4">
                @if (session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded-md mb-4">
                        <button class="text-lg font-bold" onclick="this.parentElement.style.display='none'">&times;</button>
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <h1 class="text-3xl font-semibold text-gray-800 mb-4">Welcome, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-600 mb-6">We’re happy to see you. Manage your profile or log out below.</p>

            <div class="mb-6">
                @if (Auth::user()->profile)
                    <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Your Profile</h3>
                        <div class="text-gray-700">
                            @foreach (['id' => 'ID:', 'address' => 'Address:', 'position' => 'Position:', 'phone' => 'Phone:'] as $key => $label)
                                <p><span class="font-medium text-gray-900">{{ $label }}</span>
                                    @if ($key == 'id')
                                        {{ Auth::id() }}
                                    @else
                                        {{ Auth::user()->profile->$key }}
                                    @endif
                                </p>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ route('profile.create') }}" class="w-full text-center inline-block bg-blue-500 text-white py-2 rounded-md mt-4 hover:bg-blue-600">
                        Create Profile
                    </a>
                @endif
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-gray-900">
                    Logout
                </button>
            </form>
        </div>
    </div>
</body>

</html>
