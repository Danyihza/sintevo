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
                                Petunjuk Teknis
                            </h2>
                            <a class="my-6 disabled:opacity-50 disabled:cursor-not-allowed inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500" 
                                href="{{route('admin.pengumuman')}}">
                                Halaman Pengumuman
                            </a>
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
                                <form action="{{ route('admin.addjuknis') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
    
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="kode" class="block text-sm font-medium text-gray-700">Kode</label>
                                                <input type="text" name="kode" id="kode"
                                                    placeholder="Masukkan Kode Petunjuk Teknis" required oninvalid="this.setCustomValidity('Mohon isi bagian ini')"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="upload_file" class="block text-sm font-medium text-gray-700">
                                                    Upload File
                                                </label>
                                                <label class="mt-1 flex rounded-md shadow-sm cursor-pointer">
                                                    <input class="hidden" type="file" name="upload_file" id="upload_file" oninput="showFileName(this)" class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300">
                                                    <input type="text" id="file_name" class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" placeholder="Klik Browse untuk menambahkan file" disabled>
                                                    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                        Browse
                                                    </span>
                                                </label>
                                            </div>
    
    
    
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit" id="btn-continue" class="disabled:opacity-50 disabled:cursor-not-allowed inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
    
                        <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Tabel Petunjuk Teknis
                        </h2>
                        <!-- New Table -->
                        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">Kode/Nama File</th>
                                            <th class="px-4 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        @if(count($juknis) == 0)
                                        <tr>
                                            <td class="text-center px-4 py-3" colspan="4">
                                                <span class="font-normal italic opacity-30 px-2 py-1">
                                                    Data tidak tersedia
                                                </span>
                                            </td>
                                        </tr>
                                        @endif
                                        @foreach($juknis as $jn)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-sm w-3/4">
                                                <div class="flex items-center text-sm">
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        @php
                                                            $ext = explode('.', $jn->hasfile->nama_file);
                                                            $extension = end($ext);
                                                        @endphp
                                                        @switch($extension)
                                                        @case('pdf')
                                                        <div
                                                            data-tippy-content="{{ $jn->kode }}">
                                                            @include('template.tenant.assets.icon.pdf')
                                                        </div>
                                                        @break
                                                        @case('docx')
                                                        @case('doc')
                                                        <div
                                                            data-tippy-content="{{ $jn->kode }}">
                                                            @include('template.tenant.assets.icon.word')
                                                        </div>
                                                        @break
                                                        @case('jpg')
                                                        @case('jpeg')
                                                        @case('png')
                                                        @case('jfif')
                                                        @case('gif')
                                                        <div
                                                            data-tippy-content="{{ $jn->kode }}">
                                                            @include('template.tenant.assets.icon.image')
                                                        </div>
                                                        @break
                                                        @default
                                                        <div
                                                            data-tippy-content="{{ $jn->kode }}">
                                                            @include('template.tenant.assets.icon.default')
                                                        </div>
                                                        @endswitch

                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{ explode('.', $jn->hasfile->nama_file)[0] }}</p>
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            {{ strtoupper($extension) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <a
                                                    href="{{ route('download') . '?file=' . $jn->file}}"
                                                    class="mr-1 px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    Download
                                                </a>
                                                {{-- <button type="button"
                                                    class="mr-1 px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                    Edit
                                                </button> --}}
                                                <a href="{{ route('admin.removeJuknis', $jn->id_juknis) }}"
                                                    onclick="return confirm('Apakah anda yakin ?')"
                                                    class="mr-1 px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                    Delete
                                                </a>
                                            </td>
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
        function check_permanent(element){
            const value = element.checked;
            const datepicker = document.getElementById('datepicker')
            if (value == true) {
                datepicker.classList.add('hidden')
            } else {
                datepicker.classList.remove('hidden')
            }
        }
        
        function showFileName(param) {
            const value = $(param).val();
            const fileName = value.split('\\').pop();
            $('#file_name').val(fileName);
            console.log(value);
        }
    </script>

    <script>
        tippy('[data-tippy-content]');
    </script>

    </html>
@endsection
