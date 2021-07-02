@extends('template.admin.master')

@section('title', 'Dashboard')

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
    
                        <div class="md:grid md:gap-6 mb-8">
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="{{ route('admin.pengumumanTambah') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
    
                                            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" class="container mx-auto ">
                                                <div class="mb-5 w-full" >
                                                    <label for="datepicker" class="text-sm font-medium text-gray-700">Batas Waktu</label>
                                                    <div class="relative" id="datepicker">
                                                        <input type="hidden" name="tanggal" x-ref="date" :value="datepickerValue" />
                                                        <input type="text" x-on:click="showDatepicker = !showDatepicker" x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false" class="cursor-pointer shadow-sm focus:ring-lightBlue-500 focus:border-lightBlue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Select date" readonly />
    
                                                        <div class="absolute top-0 right-0 px-3 py-2">
                                                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                        </div>
    
                                                        <!-- <div x-text="no_of_days.length"></div>
                                                                        <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                                                        <div x-text="new Date(year, month).getDay()"></div> -->
    
                                                        <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0" style="width: 17rem" x-show.transition="showDatepicker" @click.away="showDatepicker = false">
                                                            <div class="flex justify-between items-center mb-2">
                                                                <div>
                                                                    <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                                                    <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                                                </div>
                                                                <div>
                                                                    <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 0) {
                                                                                                year--;
                                                                                                month = 12;
                                                                                            } month--; getNoOfDays()">
                                                                        <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                                                        </svg>
                                                                    </button>
                                                                    <button type="button" class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full" @click="if (month == 11) {
                                                                                                month = 0; 
                                                                                                year++;
                                                                                            } else {
                                                                                                month++; 
                                                                                            } getNoOfDays()">
                                                                        <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
    
                                                            <div class="flex flex-wrap mb-3 -mx-1">
                                                                <template x-for="(day, index) in DAYS" :key="index">
                                                                    <div style="width: 14.26%" class="px-0.5">
                                                                        <div x-text="day" class="text-gray-800 font-medium text-center text-xs">
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </div>
    
                                                            <div class="flex flex-wrap -mx-1">
                                                                <template x-for="blankday in blankdays">
                                                                    <div style="width: 14.28%" class="text-center border p-1 border-transparent text-sm">
                                                                    </div>
                                                                </template>
                                                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                                                    <div style="width: 14.28%" class="px-1 mb-1">
                                                                        <div @click="getDateValue(date)" x-text="date" class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100" :class="{
                                                                        'bg-lightBlue-200': isToday(date) == true, 
                                                                        'text-gray-600 hover:bg-lightBlue-200': isToday(date) == false && isSelectedDate(date) == false,
                                                                        'bg-lightBlue-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true 
                                                                        }"></div>
                                                                    </div>
                                                                </template>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start mt-1">
                                                        <div class="flex items-center h-4">
                                                            <input id="is_permanent" name="is_permanent" oninput="check_permanent(this)" type="checkbox" class="focus:ring-lightBlue-100 h-3 w-3 text-lightBlue-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-1 text-xs">
                                                            <p class="text-gray-500">Buat pengumuman permanen</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="kode" class="block text-sm font-medium text-gray-700">Kode</label>
                                                <input type="text" name="kode" id="kode"
                                                    placeholder="Masukkan Kode Pengumuman"
                                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="pengumuman" class="block text-sm font-medium text-gray-700">Pengumuman</label>
                                                <input type="text" name="pengumuman" id="pengumuman"
                                                    placeholder="Masukkan Pengumuman"
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
                            Tabel Pengumuman
                        </h2>
                        <!-- New Table -->
                        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">Pengumuman</th>
                                            <th class="px-4 py-3">Tanggal</th>
                                            <th class="px-4 py-3">Status</th>
                                            <th class="px-4 py-3">Lampiran</th>
                                            <th class="px-4 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                        {{-- @if(count($pengumuman) == 0) --}}
                                        <tr>
                                            <td class="text-center px-4 py-3" colspan="4">
                                                <span class="font-normal italic opacity-30 px-2 py-1">
                                                    Data tidak tersedia
                                                </span>
                                            </td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @foreach($pengumuman as $peng)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <div data-tippy-content="{{$peng->kode}}" class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img src="https://img.icons8.com/fluent/28/000000/commercial.png"/>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{ $peng->pengumuman }}</p>
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $peng->end_at ? date('d F Y', strtotime($peng->end_at)) : '-'}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                @if(date('Y-m-d', time()) <= $peng->end_at || $peng->end_at == null)
                                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    Aktif
                                                </span>
                                                @elseif(date('Y-m-d', time()) >= $peng->end_at)
                                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                    Tidak Aktif
                                                </span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                @if ($peng->file == null)
                                                -
                                                @else
                                                <a
                                                    href="{{ route('download') . '?file=' . $peng->file}}"
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    Download
                                                </a>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <a  href="{{ route('admin.removePengumuman', $peng->id_pengumuman) }}"
                                                    onclick="return confirm('Apakah anda yakin ?')"
                                                    class="mr-1 px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                    Delete
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
    </script>

    </html>
@endsection
