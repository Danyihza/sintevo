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
                    <div class="container px-6 mx-auto grid">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            Kelulusan & Sertifikat
                        </h2>

                        <!-- New Table -->
                        <div class="w-full overflow-hidden rounded-lg shadow-xs">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">Kode/Nama File</th>
                                            <th class="px-4 py-3">File</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        {{-- @foreach($juknis as $jn)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
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
                                                    href="{{ route('download') }}?file={{ $jn->file }}"
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    
                                                    Download
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach --}}
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
    

    @include('template.tenant.modalLogout')

@endsection

@section('script')
    <script>
        tippy('[data-tippy-content]');
    </script>

    </html>
@endsection