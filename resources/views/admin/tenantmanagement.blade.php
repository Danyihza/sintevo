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
                            <div class="md:w-1/5 w-1/2 float-right">
                                <input type="text" id="search" placeholder="Cari" oninput="filterTable()"
                                    class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <table id="tenant-table" class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="py-3">Tenant</th>
                                        <th class="py-3">Ketua</th>
                                        <th class="py-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($tenant as $t)
                                    <tr class="text-gray-700 dark:text-gray-400 hover:bg-gray-100 active:bg-gray-200 cursor-pointer" onclick="window.location.href = '{{ url('/admin/tenant') . '/' . $t->id_detail }}'">
                                        <td class="py-3">
                                            <div class="flex items-center text-sm">
                                                <!-- Avatar with inset shadow -->
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
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
