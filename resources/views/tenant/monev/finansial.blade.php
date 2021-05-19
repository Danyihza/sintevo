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
                        Monev -> Finansial
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
                            <form action="/tenant/monev/tambah/finansial" method="POST" enctype="multipart/form-data">
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

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="bukti_transaksi" class="block text-sm font-medium text-gray-700">
                                                    Bukti Transaksi
                                                </label>
                                                <label class="mt-1 flex rounded-md shadow-sm cursor-pointer">
                                                    <input class="hidden" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png, .xlsx, .ppt" type="file" name="bukti_transaksi" id="bukti_transaksi" oninput="showFileName(this)"
                                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300">
                                                    <input type="text" id="file_name"
                                                    class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300"
                                                    placeholder="Upload Bukti Transaksi disini, Tipe File : JPG, JPEG, PNG, PDF, DOCX, DOC, XLSX, PPT"
                                                    disabled>
                                                    <span
                                                        class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                        Browse
                                                    </span>
                                                </label>
                                            </div>

                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="jenis_transaksi"
                                                        class="block text-sm font-medium text-gray-700">Jenis Transaksi</label>
                                                    <select id="jenis_transaksi" name="jenis_transaksi"
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                                        <option value="" disabled selected>Pilih Jenis Transaksi</option>
                                                        <option value="Pendapatan">Pendapatan</option>
                                                        <option value="Pengeluaran">Pengeluaran</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="keterangan_transaksi"
                                                        class="block text-sm font-medium text-gray-700">Keterangan Transaksi</label>
                                                    <select id="keterangan_transaksi" name="keterangan_transaksi"
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                                        <option value="" disabled selected>Pilih Keterangan Transaksi</option>
                                                        <option value="Pendapatan tunai">Pendapatan tunai</option>
                                                        <option value="Pendapatan uang muka oleh konsumen">Pendapatan uang muka oleh konsumen</option>
                                                        <option value="Penerimaan kas dari piutang">Penerimaan kas dari piutang</option>
                                                        <option value="Pendapatan lain-lain">Pendapatan lain-lain</option>
                                                        <option value="Pembelian mesin dan peralatan">Pembelian mesin dan peralatan</option>
                                                        <option value="Pembelian bahan">Pembelian bahan</option>
                                                        <option value="Pembayaran upah dan gaji">Pembayaran upah dan gaji</option>
                                                        <option value="Pembayaran listrik/air">Pembayaran listrik/air</option>
                                                        <option value="Pembayaran sewa">Pembayaran sewa</option>
                                                        <option value="Pembayaran biaya promosi/pemasaran">Pembayaran biaya promosi/pemasaran</option>
                                                        <option value="Pembayaran packaging/pengiriman">Pembayaran packaging/pengiriman</option>
                                                        <option value="Pembelian bahan habis kantor">Pembelian bahan habis kantor</option>
                                                        <option value="Pembayaran hutang">Pembayaran hutang</option>
                                                        <option value="Biaya lain-lain">Biaya lain-lain</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="jumlah" class="block text-sm font-medium text-gray-700">
                                                    Jumlah
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <span
                                                        class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                        Rp
                                                    </span>
                                                    <input type="text" name="jumlah" id="jumlah" autocomplete="off"
                                                        class="focus:ring-lightBlue-500 focus:border-lightBlue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                        placeholder="Masukkan jumlah disini">
                                                </div>
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

                    <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
                        History Progress Finansial
                    </h2>
                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Tanggal Transaksi</th>
                                        <th class="px-4 py-3 justify-center flex">Bukti Transaksi</th>
                                        <th class="px-4 py-3">Jenis Transaksi</th>
                                        <th class="px-4 py-3">Keterangan Transaksi</th>
                                        <th class="px-4 py-3">Jumlah</th>
                                        <th class="px-4 py-3 justify-center flex">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach($finansial as $finan)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">
                                            {{ date('d/m/Y', strtotime($finan->tanggal)) }}
                                        </td>
                                        <td class="px-4 py-3 justify-center flex text-sm">
                                            <a data-tippy-content="Lihat Bukti" href="/download?file={{ $finan->file }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" fill="rgba(38,132,199,1)"/></svg>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            @switch($finan->jenis_transaksi)
                                                @case('Pendapatan')
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                        {{ $finan->jenis_transaksi }}
                                                    </span>
                                                    @break
                                                @case('Pengeluaran')
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                        {{ $finan->jenis_transaksi }}
                                                    </span>
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $finan->keterangan_transaksi }}
                                        </td>
                                        <td id="jumlah_data" class="px-4 py-3 text-md">
                                            {{ $finan->jumlah }}
                                        </td>
                                        <td class="flex flex-row px-4 justify-center py-3 text-sm">
                                            <a data-tippy-content="Edit" class="mr-2" id="edit-button" href="javascript:void(0)" @click="openModalTimEdit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M6.414 16L16.556 5.858l-1.414-1.414L5 14.586V16h1.414zm.829 2H3v-4.243L14.435 2.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 18zM3 20h18v2H3v-2z" fill="rgba(255,204,0,1)"/></svg>
                                            </a>
                                            <a data-tippy-content="Hapus" class="ml-2" id="delete-button" href="javascript:void(0)" @click="openModalTimDelete">
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


@include('template.tenant.modalLogout')

@endsection

@section('script')
<script src="{{ asset('') }}js/date-picker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
<script>
    new AutoNumeric('#jumlah',{
        allowDecimalPadding: false,
        decimalCharacter: ",",
        digitGroupSeparator: ".",
        minimumValue: "0",
        unformatOnSubmit: true
    });

    new AutoNumeric.multiple('#jumlah_data', {
        allowDecimalPadding: false,
        decimalCharacter: ",",
        digitGroupSeparator: ".",
        currencySymbol: "Rp "
    })
</script>
<script>
    tippy('[data-tippy-content]');
</script>
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
