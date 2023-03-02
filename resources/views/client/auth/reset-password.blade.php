<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>Login - Amara Store</title>
</head>
<body>
<section class="w-full h-full bg-gray-200 md:h-screen">
    <div class="container mx-auto py-12 px-6 h-full">
        <div class="flex justify-center items-center h-full text-gray-800">
            <div class="xl:w-1/2">
                <div class="block bg-white shadow-lg rounded-lg">
                    <div class="px-4 md:px-0">
                        <div class="md:p-12 md:mx-6">
                            <div class="text-center">
                                <img
                                    class="mx-auto w-48"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                    alt="logo"
                                />
                                <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">Amara Store</h4>
                            </div>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <div
                                    class="flex items-center my-8 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5"
                                >
                                    <p class="text-center font-semibold mx-4 mb-0">Reset Password</p>
                                </div>

                                @if(\Session::has('message'))
                                    <div class="alert alert-info text-red-600 px-3 text-xs pb-6 text-center">
                                        {{\Session::get('message')}}
                                    </div>
                                @endif

                                {{--                 reset password                   --}}

                                @if(session('status'))
                                    <div class="alert alert-info text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @elseif(session('email'))
                                    <div class="alert alert-info text-red-600">
                                        {{ session('email') }}
                                    </div>
                                @endif

                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ $_GET['email'] }}">

                                <div class="">
                                    <input
                                        name="password"
                                        type="password"
                                        class="mb-6 form-control block w-full px-3 py-1.5 text-base border border-gray-300 rounded m-0 focus:outline-none"
                                        placeholder="Password"
                                        required
                                    />

                                    @if($errors->has('password'))
                                        <div class="text-left mt-2 text-red-600">{{ $errors->first('password') }}</div>
                                    @endif
                                    <input
                                        name="password_confirmation"
                                        type="password"
                                        class="mb-6 form-control block w-full px-3 py-1.5 border rounded focus:outline-none"
                                        placeholder="Password_confirmation"
                                        required
                                    />

                                </div>

                                <div class="text-center pt-1 mb-20 pb-1">
                                    <button
                                        class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                                        type="submit"
                                        data-mdb-ripple="true"
                                        data-mdb-ripple-color="light"
                                        style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);"
                                    >
                                        Reset password
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

