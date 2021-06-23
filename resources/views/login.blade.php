@extends('template.auth.master')

@section('title', 'Login')

@section('body')
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-200 py-12 px-4 sm:px-6 lg:px-8">
        <div class=".shadow-2xl px-4 py-5 bg-white space-y-6 sm:p-6 rounded-md animate__animated animate__fadeIn">
            <div class="max-w-md w-full space-y-8">
                <div>
                    <img class="mx-auto w-auto " src="{{ asset('assets/images/icon_title.png') }}" alt="Workflow">
                        <h2 class="text-center text-3xl font-extrabold text-gray-900">
                            SINTEVO
                        </h2>
                        <h2 class=" text-center text-2xl font-bold text-gray-900">
                            Sistem Informasi Tenant Vokasi
                        </h2>
                    @if (session('error'))
                        <p id="error-message" class="animate__animated animate__shakeX mt-2 w-32 h-auto mx-auto text-center justify-self-center font-medium text-sm text-red-600 rounded-lg bg-red-100">
                            {{ session('error') }}
                        </p>
                    @endif
                </div>
                <form class="mt-8 space-y-6" action="{{ route('signin') }}" method="POST">
                    @csrf
                    <input type="hidden" name="remember" value="true">
                    <div class="{{ session('error') ? 'animate__animated animate__headShake' : '' }} rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="email-address" class="sr-only">Email address</label>
                            <input id="email-address" name="email" type="text" autocomplete="email" required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-{{ session('error') ? 'red' : 'gray' }}-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 focus:z-10 sm:text-sm"
                                placeholder="Email address" onchange="onChangeText(this)" value="{{old('email')}}">
                        </div>
                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-{{ session('error') ? 'red' : 'gray' }}-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 focus:z-10 sm:text-sm"
                                placeholder="Password" onchange="onChangeText(this)">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember_me" type="checkbox"
                                class="h-4 w-4 text-lightBlue-600 focus:ring-lightBlue-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-lightBlue-600 hover:text-lightBlue-500">
                                Forgot your password?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" id="btn-login"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <!-- Heroicon name: solid/lock-closed -->
                                <svg class="h-5 w-5 text-lightBlue-500 group-hover:text-lightBlue-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            Sign in
                        </button>
                    </div>
                </form>
                <p class="text-center text-sm text-gray-600">
                    Belum punya akun ?
                    <a href="{{ route('signup') }}" class="font-medium text-lightBlue-600 hover:text-lightBlue-500">
                        Daftar disini
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
@endsection

@section('script')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/core/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/myscript.js') }}"></script>

</html>
@endsection