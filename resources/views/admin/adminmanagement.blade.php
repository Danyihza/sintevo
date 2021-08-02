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
                                Admin Management
                            </h2>

                        </div>
                        <!-- CTA -->
                        {{-- <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-lightBlue-100 bg-lightBlue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-lightBlue"
                                href="https://github.com/estevanmaito/windmill-dashboard">
                                <div class="flex items-center">
                                    <span>Aftermeet</span>
                                </div>
                            </a> --}}
                        @if(session()->get('login-data')['role'] == 0)
                        <div class="md:grid md:gap-6 mb-8">
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="{{ route('admin.addAdmin') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
    
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="username" class="block text-sm font-medium text-gray-700">Email/Username</label>
                                                <input type="text" name="username" id="username"
                                                    placeholder="Masukkan Username atau Email" required oninvalid="this.setCustomValidity('Mohon isi bagian ini')"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                                <input type="password" id="password"
                                                    placeholder="Masukkan Password"
                                                    oninput="checkPassword()"
                                                    required oninvalid="this.setCustomValidity('Mohon isi bagian ini')"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="conf_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                                                <input type="password" name="password" id="conf_password"
                                                    placeholder="Masukkan Konfirmasi Password"
                                                    oninput="checkPassword()"
                                                    required oninvalid="this.setCustomValidity('Mohon isi bagian ini')"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
    
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button disabled type="submit" id="btn-submit" class="disabled:opacity-50 disabled:cursor-not-allowed inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500">
                                                Tambahkan Admin
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
    
                        <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            List Administrator
                        </h2>
                        <!-- New Table -->
                        <div class="w-full overflow-hidden rounded-sm border mb-6">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">Username/Email</th>
                                            <th class="px-4 py-3">ID</th>
                                            @if(session()->get('login-data')['role'] == 0)
                                            <th class="px-4 py-3">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        @if(count($admin) == 0)
                                        <tr>
                                            <td class="text-center px-4 py-3" colspan="4">
                                                <span class="font-normal italic opacity-30 px-2 py-1">
                                                    Data tidak tersedia
                                                </span>
                                            </td>
                                        </tr>
                                        @endif
                                        @foreach($admin as $adm)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img src="https://img.icons8.com/fluent/48/000000/admin-settings-male.png"/>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{ $adm->email }}</p>
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            Administrator
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $adm->id_user }}
                                            </td>
                                            @if(session()->get('login-data')['role'] == 0)
                                            <td class="px-4 py-3 text-xs">
                                                {{-- <a  href="{{ route('admin.removePengumuman', $adm->id_pengumuman) }}"
                                                    onclick="return confirm('Apakah anda yakin ?')"
                                                    class="mr-1 px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-lg">
                                                    Edit
                                                </a> --}}
                                                <a  href="{{ route('admin.removeAdmin', $adm->id_user) }}"
                                                    onclick="return confirm('Apakah anda yakin ?')"
                                                    class="mr-1 px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-lg">
                                                    Delete
                                                </a>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
        function showFileName(param) {
            const value = $(param).val();
            const fileName = value.split('\\').pop();
            $('#file_name').val(fileName);
            console.log(value);
        }
        function checkPassword(){
            const password = document.getElementById('password').value;
            const conf_password = document.getElementById('conf_password').value;
            if (password == conf_password && password != '' && conf_password != '') {
                $('#btn-submit').attr('disabled',false);
            } else {
                $('#btn-submit').attr('disabled',true);

            }
        }
    </script>

    </html>
@endsection
