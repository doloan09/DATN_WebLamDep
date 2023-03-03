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
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div
                                        class="flex items-center my-8 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5"
                                    >
                                        <p class="text-center font-semibold mx-4 mb-0">Reset Password</p>
                                    </div>

                                    @if(\Session::has('message'))
                                        <div class="text-red-600 px-3 text-sm pb-6 text-center">
                                            {{\Session::get('message')}}
                                        </div>
                                    @endif

                                    {{--                 reset password                   --}}

                                    @if(session('status'))
                                        <div class="text-center text-sm text-green-600 mb-2">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    @if($errors->has('email'))
                                        <div class="text-center text-red-600 text-sm mb-2">{{ $errors->first('email') }}</div>
                                    @endif

                                    <div class="">
                                        <input
                                            name="email"
                                            type="email"
                                            class="mb-6 form-control block w-full px-3 py-1.5 text-base border border-gray-300 rounded m-0 focus:outline-none"
                                            placeholder="Nhập vào email ... "
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
                                            Reset
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
