@extends('template.tenant.master')

@section('title', 'Dashboard')

@section('body')

    <body>
        <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
            @include('template.tenant.sidebar.desktop')
            @include('template.tenant.sidebar.mobile')
            
            <div class="flex flex-col flex-1 w-full">
                @include('template.tenant.topbar')
                {{-- Content --}}
                <main class="h-full overflow-y-auto">
                    @include('template.tenant.notification')

                    <div class="container px-6 mx-auto grid">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            Change Password
                        </h2>
                        <div class="md:grid md:gap-6 mb-8">
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="{{ route('user.changenewpassword') }}" method="POST">
                                    @csrf
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                                                <input required type="password" name="current_password" id="current_password"
                                                    placeholder="Masukkan Password Lama"
                                                    onchange="checkCurrentPassword()"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <span id="wrong_indicator" class="hidden ml-1 text-xs text-red-600">Password Salah</span>
                                            </div>
                                            
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                                                <input required type="password" id="new_password"
                                                    placeholder="Masukkan Password Baru"
                                                    oninput="checkPassword()"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="conf_password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                                <input required type="password" name="new_password" id="conf_password"
                                                    placeholder="Masukkan Lagi Password Baru"
                                                    oninput="checkPassword()"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
            
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit" id="buttonSimpan"
                                                class="disabled:opacity-50 disabled:cursor-not-allowed inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500"
                                                disabled>
                                                
                                                Save
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
    

    @include('template.tenant.modalLogout')

@endsection

@section('script')
    <script>
        function checkPassword(){
            const newPassword = document.querySelector('#new_password').value;
            const confPassword = document.querySelector('#conf_password').value;
            if (newPassword == confPassword) {
                $('#buttonSimpan').attr('disabled',false);
            } else {
                $('#buttonSimpan').attr('disabled',true);
            }
        }

        async function checkCurrentPassword(){
            const password = document.querySelector('#current_password').value;
            const id_user = "{{ session('login-data')['id'] }}";

            const isMatch = await fetch(`{{ route('checkPassword') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id_user: id_user,
                    password: password
                })
            }).then(result => result.json())
            .then(response => response.data)
            .catch(error => console.error(error));
            const indicator = document.querySelector('#wrong_indicator'); 
            
            if (isMatch) {
                indicator.classList.add("hidden");
            } else {
                indicator.classList.remove("hidden");
            }
        }
    </script>

    </html>
@endsection
