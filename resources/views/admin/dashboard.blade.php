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
                    @include('template.admin.notification')
                    <div class="container px-6 mx-auto grid">
                        <h2 class="my-6 text-2xl font-bold text-gray-700 dark:text-gray-200">
                            Dashboard
                        </h2>
                        <h2 class="my-2 text-md font-semibold text-gray-700">
                            Informasi pada dashboard tenant
                        </h2>

                        <form action="{{ route('admin.updateinformasidashboard') }}" method="post" enctype="multipart/form-data" id="formDashboard">
                            @csrf
                            <div class="mb-4">
                                <label class="flex rounded-md shadow-sm cursor-pointer">
                                    <input class="hidden" type="file" name="upload_file" id="upload_file"
                                    oninput="showFileName(this, '#file_name'); document.getElementById('formDashboard').submit();"
                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300">
                                    <input type="text" id="file_name"
                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300"
                                    placeholder="Belum ada file yang diatur, Upload disini, File type: All"
                                    value="{{ $informasi ? $informasi->hasFile->nama_file : '' }}"
                                    disabled>
                                    <span
                                    class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    Ubah
                                </span>
                            </label>
                        </div>
                        </form>

                        <h2 class="my-2 text-md font-semibold text-gray-700">
                            Statistik
                        </h2>

                        <div class="grid gap-10 mb-8 grid-cols-3">
                            <div class="flex flex-column items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Jumlah Tenant
                                    </p>
                                    <a href="{{ route('admin.listTenants') }}" class="text-lg font-semibold text-gray-700 dark:text-gray-200 hover:text-lightBlue-600">
                                        {{ $jumlah_tenant }} Tenant
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 14.062V20h2v-5.938c3.946.492 7 3.858 7 7.938H4a8.001 8.001 0 0 1 7-7.938zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6z"/></svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Jumlah Admin
                                    </p>
                                    <a href="{{ route('admin.adminManager') }}" class="text-lg font-semibold text-gray-700 dark:text-gray-200 hover:text-lightBlue-600">
                                        {{ $jumlah_admin }} Admin Aktif
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Informasi Terbaru
                                    </p>
                                    <a href="{{ route('admin.pengumuman') }}" class="text-lg font-semibold text-gray-700 dark:text-gray-200 hover:text-lightBlue-600">
                                        Lihat Disini
                                    </a>
                                </div>
                            </div>
                        </div>

                        <h2 class="my-2 text-md font-semibold text-gray-700">
                            Menu
                        </h2>

                        <div class="grid gap-4 mb-8 grid-cols-2">
                            <div class="flex flex-column items-center bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-red-500 bg-red-100 rounded-sm">
                                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 13.242V20h1v2H2v-2h1v-6.758A4.496 4.496 0 0 1 1 9.5c0-.827.224-1.624.633-2.303L4.345 2.5a1 1 0 0 1 .866-.5H18.79a1 1 0 0 1 .866.5l2.702 4.682A4.496 4.496 0 0 1 21 13.242zm-2 .73a4.496 4.496 0 0 1-3.75-1.36A4.496 4.496 0 0 1 12 14.001a4.496 4.496 0 0 1-3.25-1.387A4.496 4.496 0 0 1 5 13.973V20h14v-6.027zM5.789 4L3.356 8.213a2.5 2.5 0 0 0 4.466 2.216c.335-.837 1.52-.837 1.856 0a2.5 2.5 0 0 0 4.644 0c.335-.837 1.52-.837 1.856 0a2.5 2.5 0 1 0 4.457-2.232L18.21 4H5.79z"/></svg>
                                </div>
                                <div>
                                    <a href="{{ route('admin.listTenants') }}" class="text-lg font-semibold text-gray-700 dark:text-gray-200 hover:text-red-600">
                                        Tenant Management
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-red-500 bg-red-100 rounded-sm">
                                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 14v2a6 6 0 0 0-6 6H4a8 8 0 0 1 8-8zm0-1c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm2.595 7.812a3.51 3.51 0 0 1 0-1.623l-.992-.573 1-1.732.992.573A3.496 3.496 0 0 1 17 14.645V13.5h2v1.145c.532.158 1.012.44 1.405.812l.992-.573 1 1.732-.992.573a3.51 3.51 0 0 1 0 1.622l.992.573-1 1.732-.992-.573a3.496 3.496 0 0 1-1.405.812V22.5h-2v-1.145a3.496 3.496 0 0 1-1.405-.812l-.992.573-1-1.732.992-.572zM18 19.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/></svg>
                                </div>
                                <div>
                                    <a href="{{ route('admin.adminManager') }}" class="text-lg font-semibold text-gray-700 dark:text-gray-200 hover:text-red-600">
                                        Administrator Management
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-red-500 bg-red-100 rounded-sm dark:text-blue-100 dark:bg-blue-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                                </div>
                                <div>
                                    <a href="{{ route('admin.pengumuman') }}" class="text-lg font-semibold text-gray-700 dark:text-gray-200 hover:text-red-600">
                                        Pengumuman
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-red-500 bg-red-100 rounded-sm dark:text-blue-100 dark:bg-blue-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                                </div>
                                <div>
                                    <a href="{{ route('admin.petunjukteknis') }}" class="text-lg font-semibold text-gray-700 dark:text-gray-200 hover:text-red-600">
                                        Petunjuk Teknis
                                    </a>
                                </div>
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
    <script>
        function showFileName(param, target) { 
            const value = $(param).val();
            const fileName = value.split('\\').pop();
            $(target).val(fileName);
        }
    </script>

    </html>
@endsection
