@extends('template.auth.master')
@section('title', 'Registrasi Tenant Vokasi')

@section('body')
<body>
    <div class="min-h-screen items-center justify-center bg-gray-50 py-8 md:px-60 sm:px-8">
        <div class="">
            <div class="mb-10">
                <img class="mx-auto h-auto md:w-1/4 w-1/2" src="{{ asset('assets/images/icon_title.png') }}" alt="Workflow">
                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                    SINTEVO
                </h2>
                <h2 class="text-center text-2xl font-light text-gray-900">
                    Sistem Informasi Tenant Vokasi
                </h2>
            </div>
            <div class="animate__animated animate__fadeInLeft">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form id="form-user" action="{{ route('registration') }}" method="POST">
                        @csrf
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <h2 class="text-2xl font-light text-gray-900">
                                    Form Akun
                                </h2>
                                <div class="" aria-hidden="true">
                                    <div class="">
                                        <div class="border-t border-gray-200"></div>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="emailInput" placeholder="example@mail.com" value="{{ old('email') }}" oninput="checkForm()" onchange="checkEmail(this)"
                                        class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <p id="error_email" class="text-xs italic md ml-2 text-red-500 hidden">
                                            Email sudah terdaftar, harap gunakan email lain
                                        </p>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="password"
                                            class="block text-sm font-medium text-gray-700">Password</label>
                                        <input type="password" name="password" id="passwordInput" oninput="checkForm()"
                                            placeholder="Masukan Password"
                                            class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="conf_password"
                                            class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                                        <input type="password" name="conf_password" id="conf_passwordInput" oninput="checkForm()"
                                            placeholder="Masukan Ulang Password"
                                            class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>

                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="button" id="button-register" onclick="showModal()" disabled
                                    class="disabled:opacity-50 disabled:cursor-not-allowed inline-flex justify-center py-2 px-8 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

</body>

<!-- This example requires Tailwind CSS v2.0+ -->
<div id="modal-confirm" class="hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!--
        Background overlay, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
        -->
        <div class="fixed inset-0 transition-opacity ease-out duration-300 opacity-100" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg class="h-6 w-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            Konfirmasi Registrasi
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Apakah data yang anda berika sudah benar? Jika sudah benar silahkan tekan tombol Konfirmasi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" onclick="submitForm()"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-lightBlue-600 text-base font-medium text-white hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Konfirmasi
                </button>
                <button type="button" onclick="closeModal()"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/core/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/myscript.js') }}"></script>


</html>
@endsection