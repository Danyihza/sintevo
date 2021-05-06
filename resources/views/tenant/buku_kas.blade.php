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
                        Buku Kas
                    </h2>
                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold text-center tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="pr-4 py-3">Tanggal Transaksi</th>
                                        <th class="px-4 py-3">Bukti Transaksi</th>
                                        <th class="px-4 py-3">Keterangan Transaksi</th>
                                        <th class="px-4 py-3">Pendapatan (Rp)</th>
                                        <th class="px-4 py-3">Pengeluaran (Rp)</th>
                                        <th class="px-4 py-3">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    {{-- <tr>
                                        <td class="text-center px-4 py-3" colspan="6">
                                            <span class="font-normal italic opacity-30 px-2 py-1">
                                                Data tidak tersedia
                                            </span>
                                        </td>
                                    </tr> --}}
                                    <tr class="text-center">
                                        <td class="py-3">
                                            30/04/2021
                                        </td>
                                        <td class="py-3 justify-center flex">
                                            <a data-tippy-content="Lihat Bukti" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" fill="rgba(38,132,199,1)"/></svg>
                                            </a>
                                        </td>
                                        <td class="py-3">
                                            Pembayaran Sewa
                                        </td>
                                        <td class="py-3">
                                            -
                                            <span class="text-green-500">
                                                
                                            </span>
                                        </td>
                                        <td class="py-3">
                                            <span class="text-red-500">
                                                -100.000
                                            </span>
                                        </td>
                                        <td class="py-3">
                                            300.000
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td class="py-3">
                                            26/04/2021
                                        </td>
                                        <td class="py-3 justify-center flex">
                                            <a data-tippy-content="Lihat Bukti" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" fill="rgba(38,132,199,1)"/></svg>
                                            </a>
                                        </td>
                                        <td class="py-3">
                                            Pendapatan Tunai
                                        </td>
                                        <td class="py-3">
                                            <span class="text-green-500">
                                                +400.000
                                            </span>
                                        </td>
                                        <td class="py-3">
                                            -
                                            <span class="text-red-500">
                                            </span>
                                        </td>
                                        <td class="py-3">
                                            400.000
                                        </td>
                                    </tr>
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
<script>
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
