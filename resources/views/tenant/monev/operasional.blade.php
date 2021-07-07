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
                        Monev -> Operasional
                    </h2>
                    <!-- CTA -->
                    {{-- <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-lightBlue-100 bg-lightBlue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-lightBlue"
                            href="https://github.com/estevanmaito/windmill-dashboard">
                            <div class="flex items-center">
                                <span>Aftermeet</span>
                            </div>
                        </a> --}}

                    <div class="md:grid md:gap-6 mb-8">
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{ route('user.monevTambah') }}/operasional" method="POST" enctype="multipart/form-data" id="formTambahOperasional">
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" class="container mx-auto ">
                                                <div class="mb-5 w-full">
                                                    <label for="datepicker"
                                                        class="text-sm font-medium text-gray-700">Tanggal</label>
                                                    <div class="relative">
                                                        <input type="hidden" name="tanggal" x-ref="date"
                                                            :value="datepickerValue" />
                                                        <input type="text" x-on:click="showDatepicker = !showDatepicker"
                                                            x-model="datepickerValue"
                                                            x-on:keydown.escape="showDatepicker = false"
                                                            class="shadow-sm focus:ring-lightBlue-500 focus:border-lightBlue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                                            placeholder="Select date" readonly />

                                                        <div class="absolute top-0 right-0 px-3 py-2">
                                                            <svg class="h-6 w-6 text-gray-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                        </div>

                                                        <!-- <div x-text="no_of_days.length"></div>
                                                                    <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                                                    <div x-text="new Date(year, month).getDay()"></div> -->

                                                        <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0"
                                                            style="width: 17rem" x-show.transition="showDatepicker"
                                                            @click.away="showDatepicker = false">
                                                            <div class="flex justify-between items-center mb-2">
                                                                <div>
                                                                    <span x-text="MONTH_NAMES[month]"
                                                                        class="text-lg font-bold text-gray-800"></span>
                                                                    <span x-text="year"
                                                                        class="ml-1 text-lg text-gray-600 font-normal"></span>
                                                                </div>
                                                                <div>
                                                                    <button type="button"
                                                                        class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                                        @click="if (month == 0) {
                                                                                            year--;
                                                                                            month = 12;
                                                                                        } month--; getNoOfDays()">
                                                                        <svg class="h-6 w-6 text-gray-400 inline-flex"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M15 19l-7-7 7-7" />
                                                                        </svg>
                                                                    </button>
                                                                    <button type="button"
                                                                        class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                                        @click="if (month == 11) {
                                                                                            month = 0; 
                                                                                            year++;
                                                                                        } else {
                                                                                            month++; 
                                                                                        } getNoOfDays()">
                                                                        <svg class="h-6 w-6 text-gray-400 inline-flex"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M9 5l7 7-7 7" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <div class="flex flex-wrap mb-3 -mx-1">
                                                                <template x-for="(day, index) in DAYS" :key="index">
                                                                    <div style="width: 14.26%" class="px-0.5">
                                                                        <div x-text="day"
                                                                            class="text-gray-800 font-medium text-center text-xs">
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </div>

                                                            <div class="flex flex-wrap -mx-1">
                                                                <template x-for="blankday in blankdays">
                                                                    <div style="width: 14.28%"
                                                                        class="text-center border p-1 border-transparent text-sm">
                                                                    </div>
                                                                </template>
                                                                <template x-for="(date, dateIndex) in no_of_days"
                                                                    :key="dateIndex">
                                                                    <div style="width: 14.28%" class="px-1 mb-1">
                                                                        <div @click="getDateValue(date)" x-text="date"
                                                                            class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                                            :class="{
                                                                  'bg-lightBlue-200': isToday(date) == true, 
                                                                  'text-gray-600 hover:bg-lightBlue-200': isToday(date) == false && isSelectedDate(date) == false,
                                                                  'bg-lightBlue-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true 
                                                                }"></div>
                                                                    </div>
                                                                </template>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="status_progress"
                                                        class="block text-sm font-medium text-gray-700">Status Progres</label>
                                                    <select id="status_progress" name="status_progress"
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                                        <option value="0" disabled selected>Pilih Status Progress</option>
                                                        <option value="Tidak Ada Progress">Tidak Ada Progress</option>
                                                        <option value="Ada Progress">Ada Progress</option>
                                                        <option value="Progress Melampaui">Progress Melampaui</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div>
                                                <label for="uraian_progress" class="block text-sm font-medium text-gray-700">
                                                    Uraian Progres Operasional
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="uraian_progress" name="uraian_progress" rows="5"
                                                        class="shadow-sm focus:ring-lightBlue-500 focus:border-lightBlue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                                        placeholder="Uraikan dengan singkat, padat, dan jelas"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="upload_file" class="block text-sm font-medium text-gray-700">
                                                    Upload File
                                                </label>
                                                <label class="mt-1 flex rounded-md shadow-sm cursor-pointer">
                                                    <input class="hidden" type="file" name="upload_file" id="upload_file" oninput="showFileName(this, '#file_name')"
                                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300">
                                                    <input type="text" id="file_name"
                                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300"
                                                    placeholder="Jika ada file yang perlu dilampirkan klik Browse, tidak wajib, file type: All, Max file size 10 mb"
                                                    disabled>
                                                    <span
                                                        class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                        Browse
                                                    </span>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit"
                                                class="disabled:opacity-50 disabled:cursor-not-allowed inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lightBlue-500">
                                                
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            History Progress Operasional
                        </h2>
                        <div class="my-auto">
                            @if (count($history) > 0)
                            <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                href="{{ route('user.export', 'operasional') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                    viewBox="0 0 172 172" style=" fill:#000000;">
                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                        <g fill="#ffffff">
                                            <path
                                                d="M43,14.33333c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v35.83333h-7.16667c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v35.83333c0,7.91917 6.41417,14.33333 14.33333,14.33333h7.16667v14.33333c0,7.91917 6.41417,14.33333 14.33333,14.33333h58.5651l-14.33333,-14.33333h-44.23177v-14.33333h71.66667v-21.5c0,-3.956 3.21067,-7.16667 7.16667,-7.16667h21.5v-50.16667l-35.83333,-35.83333zM43,28.66667h57.33333v28.66667h28.66667v7.16667h-86zM21.68197,78.83333h8.94434l5.19303,12.30371l5.20703,-12.30371h8.93034l-9.08431,17.7627l9.29427,18.07064h-9.04232l-5.30501,-12.52767l-5.27702,12.52767h-9.04232l9.28027,-18.07064zM57.33333,78.83333h7.16667v28.66667h14.33333v7.16667h-21.5zM96.68001,78.83333c10.19817,0.29383 10.81999,9.19416 10.81999,10.77799h-6.94271c0.00072,-0.75797 0.1117,-4.99707 -4.00326,-4.99707c-1.25417,0 -4.06428,0.55575 -3.84928,4.01725c0.20783,3.1605 4.38421,4.66706 5.15104,5.01106c1.60533,0.58767 9.55171,4.12789 9.61621,11.35189c0.01433,1.53367 -0.38218,9.5647 -10.65202,9.6722c-11.17283,0.12183 -11.92578,-9.4927 -11.92578,-11.47786h6.9847c0,1.0535 0.08925,6.14709 4.94109,5.75293c2.91683,-0.24367 3.55298,-2.34294 3.65332,-3.90527c0.16483,-2.63017 -2.3454,-4.21131 -4.99707,-5.48698c-3.72667,-1.79167 -9.62069,-3.99362 -9.72819,-10.97396c-0.09317,-6.28517 4.52496,-9.92135 10.93196,-9.74219zM129,114.66667v28.66667h-21.5l28.66667,28.66667l28.66667,-28.66667h-21.5v-28.66667z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <span>Export Excel</span>
                            </a>
                            @endif
                        </div>

                    </div>

                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg border mb-6">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Tanggal</th>
                                        <th class="px-4 py-3">Status Progress</th>
                                        <th class="px-4 py-3">Uraian Progress</th>
                                        <th class="px-4 py-3">File</th>
                                        <th class="px-4 py-3">Feedback</th>
                                        <th class="px-4 py-3 justify-center flex">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @if (count($history) == 0)
                                    <tr>
                                        <td class="text-center px-4 py-3" colspan="5">
                                            <span class="font-normal italic opacity-30 px-2 py-1">
                                                Data tidak tersedia
                                            </span>
                                        </td>
                                    </tr>
                                    @endif
                                    @foreach($history as $his)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">
                                            {{ date('d/m/Y', strtotime($his->tanggal)) }}
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            @switch($his->status_progress)
                                                @case('Progress Melampaui')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    {{ $his->status_progress }}
                                                </span>
                                                    @break
                                                @case('Ada Progress')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                    {{ $his->status_progress }}
                                                </span>
                                                    @break
                                                @case('Tidak Ada Progress')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                    {{ $his->status_progress }}
                                                </span>
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                            
                                        </td>
                                        <td class="px-4 py-3 text-sm text-justify md:max-w-lg">
                                            {{ $his->uraian }}
                                        </td>
                                        <td class="px-4 py-3 text-sm flex items-center">
                                            @if($his->file)
                                                <a href="{{ route('download') }}?file={{ $his->file }}" target="_blank">
                                                    <?php $get = explode('.', $his->hasFile->nama_file); $extention = end($get); ?>
                                                    @switch($extention)
                                                        @case('pdf')
                                                        <div
                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                            @include('template.tenant.assets.icon.pdf')
                                                        </div>
                                                        @break
                                                        @case('docx')
                                                        @case('doc')
                                                        <div
                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                            @include('template.tenant.assets.icon.word')
                                                        </div>
                                                        @break
                                                        @case('jpg')
                                                        @case('jpeg')
                                                        @case('png')
                                                        @case('jfif')
                                                        @case('gif')
                                                        <div
                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                            @include('template.tenant.assets.icon.image')
                                                        </div>
                                                        @break
                                                        @default
                                                        <div
                                                            data-tippy-content="{{ strtoupper($extention) }}">
                                                            @include('template.tenant.assets.icon.default')
                                                        </div>
                                                    @endswitch
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $his->feedback ?? '-' }}
                                        </td>
                                        <td class="flex flex-row px-4 justify-center py-3 text-sm">
                                            <a data-tippy-content="Edit" class="mr-2" id="edit-button" href="javascript:void(0)" @click="openModalMonevEdit" onclick="editMonev(this)" data-monev="{{ $his->id_monev }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M6.414 16L16.556 5.858l-1.414-1.414L5 14.586V16h1.414zm.829 2H3v-4.243L14.435 2.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 18zM3 20h18v2H3v-2z" fill="rgba(255,204,0,1)"/></svg>
                                            </a>
                                            <a data-tippy-content="Hapus" class="ml-2" id="delete-button" href="{{ route('user.hapusMonev', $his->id_monev) }}" onclick="return confirm('Are you sure you want to delete this?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-4.586 6l1.768 1.768-1.414 1.414L12 15.414l-1.768 1.768-1.414-1.414L10.586 14l-1.768-1.768 1.414-1.414L12 12.586l1.768-1.768 1.414 1.414L13.414 14zM9 4v2h6V4H9z" fill="rgba(255,0,0,1)"/></svg>
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


<!-- Modal backdrop. This what you want to place close to the closing body tag -->
<div x-show="isModalMonevEdit" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-60 sm:items-center sm:justify-center overflow-auto">
    <!-- Modal -->
    <div x-show="isModalMonevEdit" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0  transform translate-y-4 sm:translate-y-0 sm:scale-95"
        @keydown.escape="closeModalMonevEdit"
        class="w-full px-6 py-4 bg-white rounded-t-lg my-2 dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog" id="modal">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
            <button
                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                aria-label="close" @click="closeModalMonevEdit">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>

        <!-- Modal body -->
        <div class="mt-4 mb-6">
            <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                Edit Data Monev
            </p>
            <div class="mt-5 md:col-span-2" id="form_regis">
                <form action="{{ route('user.updateMonev') }}" method="POST" id="formEditMonev" enctype="multipart/form-data">
                    <input type="hidden" name="id_monev" id="id_monev">
                    @csrf
                    <div class="sm:rounded-md">
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" class="container mx-auto ">
                                <div class="w-full">
                                    <label for="datepicker"
                                        class="text-sm font-medium text-gray-700">Tanggal</label>
                                    <div class="relative">
                                        <input type="hidden" name="tanggal" x-ref="date"
                                            :value="datepickerValue" />
                                        <input type="text" x-on:click="showDatepicker = !showDatepicker"
                                            x-model="datepickerValue"
                                            x-on:keydown.escape="showDatepicker = false"
                                            class="shadow-sm focus:ring-lightBlue-500 focus:border-lightBlue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                            placeholder="Select date" readonly />

                                        <div class="absolute top-0 right-0 px-3 py-2">
                                            <svg class="h-6 w-6 text-gray-400" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>

                                        <!-- <div x-text="no_of_days.length"></div>
                                                    <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                                    <div x-text="new Date(year, month).getDay()"></div> -->

                                        <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0"
                                            style="width: 17rem" x-show.transition="showDatepicker"
                                            @click.away="showDatepicker = false">
                                            <div class="flex justify-between items-center mb-2">
                                                <div>
                                                    <span x-text="MONTH_NAMES[month]"
                                                        class="text-lg font-bold text-gray-800"></span>
                                                    <span x-text="year"
                                                        class="ml-1 text-lg text-gray-600 font-normal"></span>
                                                </div>
                                                <div>
                                                    <button type="button"
                                                        class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                        @click="if (month == 0) {
                                                                            year--;
                                                                            month = 12;
                                                                        } month--; getNoOfDays()">
                                                        <svg class="h-6 w-6 text-gray-400 inline-flex"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M15 19l-7-7 7-7" />
                                                        </svg>
                                                    </button>
                                                    <button type="button"
                                                        class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                        @click="if (month == 11) {
                                                                            month = 0; 
                                                                            year++;
                                                                        } else {
                                                                            month++; 
                                                                        } getNoOfDays()">
                                                        <svg class="h-6 w-6 text-gray-400 inline-flex"
                                                            fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M9 5l7 7-7 7" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="flex flex-wrap mb-3 -mx-1">
                                                <template x-for="(day, index) in DAYS" :key="index">
                                                    <div style="width: 14.26%" class="px-0.5">
                                                        <div x-text="day"
                                                            class="text-gray-800 font-medium text-center text-xs">
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>

                                            <div class="flex flex-wrap -mx-1">
                                                <template x-for="blankday in blankdays">
                                                    <div style="width: 14.28%"
                                                        class="text-center border p-1 border-transparent text-sm">
                                                    </div>
                                                </template>
                                                <template x-for="(date, dateIndex) in no_of_days"
                                                    :key="dateIndex">
                                                    <div style="width: 14.28%" class="px-1 mb-1">
                                                        <div @click="getDateValue(date)" x-text="date"
                                                            class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                            :class="{
                                                'bg-lightBlue-200': isToday(date) == true, 
                                                'text-gray-600 hover:bg-lightBlue-200': isToday(date) == false && isSelectedDate(date) == false,
                                                'bg-lightBlue-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true 
                                                }"></div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="text-xs text-red-500 font-regular"><b>Catatan: </b>Perhatikan tanggal kembali</span>
                        </div>
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="status_kendala"
                                    class="block text-sm font-medium text-gray-700">Status Progress</label>
                                <select id="status_kendala_update" name="status_progress"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                    <option value="" disabled selected>Pilih Status Progress</option>
                                </select>
                            </div>
                        </div>
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <label for="uraian_progress"
                                class="block text-sm font-medium text-gray-700">
                                Uraian Progress Operasional
                            </label>
                            <div class="mt-1">
                                <textarea id="uraian_progress_update" name="uraian" rows="5"
                                    class="shadow-sm focus:ring-lightBlue-500 focus:border-lightBlue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Uraikan dengan singkat, padat, dan jelas"></textarea>
                            </div>
                        </div>
                        <div class="px-4 bg-white md:space-y-1 sm:py-1">
                            <label for="bukti_transaksi" class="block text-sm font-medium text-gray-700">
                                Upload File
                            </label>
                            <label class="mt-1 flex rounded-md shadow-sm cursor-pointer">
                                <input class="hidden" type="file" name="upload_file" id="bukti_transaksi" oninput="showFileName(this, '#file_name_update')"
                                class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300">
                                <input type="text" id="file_name_update"
                                class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300"
                                placeholder="Upload File disini"
                                disabled>
                                <span
                                    class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    Browse
                                </span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <footer
            class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
            <button type="button" id="btn_submit" onclick="submit('formEditMonev')"
                class="w-full text-center px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-lightBlue-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-lightBlue-600 hover:bg-lightBlue-700 focus:outline-none focus:shadow-outline-lightBlue">
                Simpan
            </button>
        </footer>
    </div>
</div>
<!-- End of modal backdrop -->


@include('template.tenant.modalLogout')

@endsection

@section('script')
<script src="{{ asset('') }}js/date-picker.js"></script>
<script>
    tippy('[data-tippy-content]');
</script>

<script>
function submit(form){
    $(`#${form}`).submit();
}

function showFileName(param, target) { 
    const value = $(param).val();
    const fileName = value.split('\\').pop();
    $(target).val(fileName);
}

async function editMonev(element){
    const id_monev = $(element).data('monev');
    const monev = await fetch(`{{ route('getMonev') }}/${id_monev}`)
    .then(res => res.json())
    .then(result => result.data);
    const STATUS_PROGRESS = [
        'Tidak Ada Progress',
        'Ada Progress',
        'Progress Melampaui'
    ];
    let status = '';
    STATUS_PROGRESS.forEach((item, index) => {
        status += `<option value="${item}" ${ item == monev.status_progress ? 'selected' : '' }>${item}</option>`;
    })
    $('#id_monev').val(id_monev);
    $('#file_name_update').val(monev.has_file?.nama_file ?? null);
    $('#status_kendala_update').html(status);
    $('#uraian_progress_update').html(monev.uraian);
}
</script>

</html>
@endsection