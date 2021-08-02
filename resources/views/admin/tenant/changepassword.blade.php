@extends('template.admin.master')

@section('title', 'Admin')

@section('body')

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('template.admin.sidebar.desktop')
        @include('template.admin.sidebar.mobile')

        <div class="flex flex-col flex-1 w-full">
            @include('template.admin.topbar')
            {{-- Content --}}
            <main class="h-full overflow-y-auto">

                @include('template.tenant.notification')


                <div class="container px-6 mx-auto grid">
                    <div class="flex flex-row justify-between">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            Ganti Password
                        </h2>

                    </div>
                    <!-- CTA -->
                    {{-- <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-lightBlue-100 bg-lightBlue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-lightBlue"
                                href="https://github.com/estevanmaito/windmill-dashboard">
                                <div class="flex items-center">
                                    <span>Aftermeet</span>
                                </div>
                            </a> --}}

                    <div class="md:grid md:gap-6 mb-8">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{ route('admin.updateAdmin') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_user" value="{{ $user->id_user }}">
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="password" class="block text-sm font-medium text-gray-700">New
                                                Password</label>
                                            <input type="password" id="password" placeholder="Masukkan Password Baru"
                                                oninput="checkPassword()"
                                                class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="conf_password"
                                                class="block text-sm font-medium text-gray-700">Konfirmasi
                                                Password</label>
                                            <input type="password" name="password" id="conf_password"
                                                placeholder="Masukkan Konfirmasi Password Baru"
                                                oninput="checkPassword()"
                                                class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" id="btn-submit" disabled
                                            class="disabled:opacity-50 disabled:cursor-not-allowed inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </main>
            {{-- End of Content --}}
        </div>
    </div>
</body>


@include('template.admin.modalLogout')

@endsection

@section('script')
<script src="{{ asset('') }}js/date-picker.js"></script>
<script>
    isEmptyCurrentPassword();
    function showFileName(param) {
        const value = $(param).val();
        const fileName = value.split('\\').pop();
        $('#file_name').val(fileName);
        console.log(value);
    }

    function checkPassword() {
        const password = document.getElementById('password').value;
        const conf_password = document.getElementById('conf_password').value;
        if (password == conf_password && password && conf_password) {
            $('#btn-submit').attr('disabled', false);
        } else {
            $('#btn-submit').attr('disabled', true);

        }
    }

    function isEmptyCurrentPassword(){
        const current_password = document.getElementById('current_password').value;
        if (!current_password) {
            $('#btn-submit').attr('disabled', true);
        } else {
            $('#btn-submit').attr('disabled', false);
        }
    }

    async function checkCurrentPassword() {
        const password = document.getElementById('current_password').value;
        const id_user = document.getElementById('id_user').value;
        const indicator = document.getElementById('wrong_indicator');
        const isMatch = await fetch(`{{ route('checkPassword') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id_user: id_user,
                    password: password
                })
            })
            .then(response => response.json())
            .then(result => result.data)
        if (isMatch) {
            indicator.classList.add('hidden')
        } else {
            indicator.classList.remove('hidden')
        }
    }

</script>

</html>
@endsection
