@extends('template.tenant.master')

@section('title', 'Dashboard')

@section('body')

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('template.admin.sidebar.desktop')
        @include('template.admin.sidebar.mobile')

        <div class="flex flex-col flex-1 w-full">
            @include('template.tenant.topbar')
            {{-- Content --}}
            <main class="h-full overflow-y-auto">

                @include('template.tenant.notification')

                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Frequently Asked Questions (FAQ)
                    </h2>
                    <!-- CTA -->
                    {{-- <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-lightBlue-100 bg-lightBlue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-lightBlue"
                            href="https://github.com/estevanmaito/windmill-dashboard">
                            <div class="flex items-center">
                                <span>Aftermeet</span>
                            </div>
                        </a> --}}

                    <div class="flex justify-between">
                        <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Tabel FAQ
                        </h2>
                        <div class="my-auto">
                            <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                href="{{ route('export.exportFaqExcel') }}">
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
                            <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-md text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                href="{{ route('export.allFaq') }}"
                                target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    width="24" height="24"
                                    viewBox="0 0 172 172"
                                    style=" fill:#000000;">
                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M43,14.33333c-7.90483,0 -14.33333,6.4285 -14.33333,14.33333v114.66667c0,7.90483 6.4285,14.33333 14.33333,14.33333h58.5651l-14.33333,-14.33333h-44.23177v-114.66667h50.16667v35.83333h35.83333v35.83333h14.33333v-43l-43,-43zM84.79622,64.5c-3.94167,0 -6.89411,2.6763 -7.47461,7.33464c-0.57333,4.65117 1.73243,12.78454 5.75293,20.33821c-1.72717,5.23167 -3.45243,9.87813 -5.75293,14.5293c-7.47483,2.322 -14.37095,5.8041 -17.24479,9.29427c-4.59383,5.2245 -2.29445,8.71455 -1.14779,10.45605c1.15383,1.7415 2.87854,2.54753 5.17904,2.54753c1.15383,0 2.30352,-0.23135 3.45736,-0.81185c4.601,-1.7415 9.18644,-8.7187 13.78743,-16.85287c4.02051,-1.161 8.04526,-2.31696 12.06576,-2.89746c4.0205,4.644 8.05869,7.55938 11.50586,8.72038c4.0205,1.161 7.46912,-0.59046 9.19629,-4.66113c1.14667,-3.49017 0.56426,-6.38382 -2.30957,-8.13249c-3.45433,-2.322 -9.20267,-2.33018 -16.097,-1.74968c-2.3005,-3.483 -4.58566,-6.96589 -6.31283,-10.45605c2.87383,-8.71467 4.01614,-16.26094 2.86947,-20.91211c-1.15383,-4.07067 -3.53294,-6.74674 -7.47461,-6.74674zM129,114.66667v28.66667h-21.5l28.66667,28.66667l28.66667,-28.66667h-21.5v-28.66667z"></path></g>
                                    </g>
                                </svg>
                                <span>Export PDF</span>
                            </a>
                        </div>

                    </div>
                    <div class="w-full overflow-hidden rounded-lg border mb-6">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap" id="datatable">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Nomor</th>
                                        <th class="px-4 py-3">Tanggal</th>
                                        <th class="px-4 py-3">Nama Usaha</th>
                                        <th class="px-4 py-3">Pertanyaan/Feedback</th>
                                        <th class="px-4 py-3">Tanggapan</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @if (count($faq) == 0)
                                    <tr>
                                        <td class="text-center px-4 py-3" colspan="5">
                                            <span class="font-normal italic opacity-30 px-2 py-1">
                                                Data tidak tersedia
                                            </span>
                                        </td>
                                    </tr>
                                    @endif
                                    @foreach($faq as $fq)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ date('d/m/Y', strtotime($fq->tanggal)) }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $fq->nama_usaha }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $fq->pertanyaan }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            @if($fq->tanggapan)
                                                {{ $fq->tanggapan }}
                                            @else
                                            <input type="text" placeholder="Masukan Tanggapan"
                                            onkeypress="submitFeedback(this)"
                                            data-id="{{ $fq->id_faq }}"
                                            class="mt-1 focus:ring-lightBlue-500 focus:border-lightBlue-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @endif
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

async function submitFeedback(element) {
    if (event.keyCode == 13) {
        const id = element.getAttribute('data-id');
        const feedback = element.value;
        // alert(feedback);
        if (confirm(
                'Apakah anda yakin untuk mengirim feedback tersebut ? '
            )) {
            const response = await fetch(`{{ route('addFeedbackFaq') }}?id_faq=${id}&tanggapan=${feedback}`)
                .then((response) => response.json())
                .then(json => json);
                console.log(response);
            if (response.success == true) {
                const container = element.parentElement;
                container.innerHTML = feedback;
            } else {
                alert('failed');
            }
        } else {
            return false;
        }
    }
}

</script>

</html>
@endsection