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
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Tenant Management
                    </h2>
                    <!-- CTA -->
                    {{-- <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-lightBlue-100 bg-lightBlue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-lightBlue"
                            href="https://github.com/estevanmaito/windmill-dashboard">
                            <div class="flex items-center">
                                <span>Aftermeet</span>
                            </div>
                        </a> --}}

                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs select-none">
                        <div class="w-full overflow-x-auto">
                            <div class=" flex justify-between">
                                <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                    href="{{ route('admin.exporttenant') }}">
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
                                <input type="text" id="search" placeholder="Cari" oninput="filterTable()"
                                    class="md:w-1/5 w-1/2 mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <table id="tenant-table" class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="py-3">Tenant</th>
                                        <th class="py-3">Ketua</th>
                                        <th class="py-3">Status</th>
                                        <th class="py-3">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($tenant as $t)
                                    <tr class="text-gray-700 dark:text-gray-400 hover:bg-gray-100 active:bg-gray-200 cursor-pointer" onclick="window.location.href = '{{ route('admin.tenant') . '/' . $t->id_detail }}'">
                                        <td class="py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                <div class="relative hidden w-10 h-10 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src="{{ asset('assets/img/tenant') . '/' . $t->gambar}}"
                                                        alt="" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true"></div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{ $t->nama_brand }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                                        {{ $t->kategoris->nama_kategori }}

                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3 text-sm">
                                            {{ $t->nama_ketua }}
                                        </td>
                                        <td class="py-3 text-sm">
                                            {{ $t->statuses->jenis_status }}
                                        </td>
                                        <td class="py-3 text-sm">
                                            <a href="{{ route('admin.hapusTenant', $t->id_detail) }}"
                                                onclick="return confirm('Apakah anda yakin ?')"
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full">
                                                Hapus
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    function filterTable() {
        var input, filter, table, tr, td, cell, i, j;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("tenant-table");
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {
            // Hide the row initially.
            tr[i].style.display = "none";

            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                cell = tr[i].getElementsByTagName("td")[j];
                if (cell) {
                    if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    }

</script>


</html>
@endsection
