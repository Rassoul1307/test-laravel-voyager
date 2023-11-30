<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Voyager::setting("admin.title") }} Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-full">

    <div class="flex items-center min-h-screen bg-gray-50">
        <div class="container mx-auto">
            <div class="max-w-md mx-auto my-10">

                @if(!$errors->isEmpty())
                    <div class="p-6 px-8 text-white bg-red-400 rounded-xl">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="overflow-hidden bg-white shadow-xl mt-7 rounded-xl border-2 border-solid">
                    <div class="flex items-center justify-start h-24 px-4 space-x-5 font-bold text-white bg-white">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img class="w-10 h-auto" src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                            <img class="w-10 h-auto" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                        <div class="flex flex-col justify-center w-full h-full bg-black  mt-4">
                            <div class="flex flex-col items-center justify-end">
                            <p class="">Sign in to your account below</p>
                            <p class="text-xs font-normal">Welcome to your administration login</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <form action="{{ route('voyager.login') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm text-gray-600">Email Address</label>
                                <input type="email" value="{{ old('email') }}" name="email" id="email" placeholder="johndoe@email.com" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:border-blue-500" />
                            </div>
                            <div class="mb-6">
                                <label for="password" class="block mb-2 text-sm text-gray-600">Password</label>
                                <input type="password" name="password" id="password" placeholder="password" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:border-blue-500" />
                            </div>
                            <div class="form-group" id="rememberMeGroup">
                                <div class="controls">
                                    <input type="checkbox" name="remember" id="remember" value="1"><label for="remember" class="remember-me-text">{{ __('voyager::generic.remember_me') }}</label>
                                </div>
                            </div>
                            <div class="mb-6 mt-3">
                                <button type="submit" class="w-full px-3 py-3 text-white bg-blue-500 rounded-lg focus:bg-blue-600 focus:outline-none">Login</button>
                            </div>
                            {{-- <p class="text-sm text-center text-gray-400">Don&#x27;t have an account yet? <a href="{{ url()->route('register') }}" class="text-indigo-400 focus:outline-none focus:underline focus:text-indigo-500">Sign up</a>.</p> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
