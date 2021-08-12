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
                        <div class="flex justify-between">
                            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                Dashboard
                            </h2>
                            <div class="my-auto">
                                <a class="inline-flex justify-center py-2 px-2 border border-transparent shadow-md text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                    href="{{ route('export.allDataTenant', session('login-data')['id']) }}"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        width="24" height="24"
                                        viewBox="0 0 172 172"
                                        style=" fill:#000000;">
                                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                            <path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M43,14.33333c-7.90483,0 -14.33333,6.4285 -14.33333,14.33333v114.66667c0,7.90483 6.4285,14.33333 14.33333,14.33333h58.5651l-14.33333,-14.33333h-44.23177v-114.66667h50.16667v35.83333h35.83333v35.83333h14.33333v-43l-43,-43zM84.79622,64.5c-3.94167,0 -6.89411,2.6763 -7.47461,7.33464c-0.57333,4.65117 1.73243,12.78454 5.75293,20.33821c-1.72717,5.23167 -3.45243,9.87813 -5.75293,14.5293c-7.47483,2.322 -14.37095,5.8041 -17.24479,9.29427c-4.59383,5.2245 -2.29445,8.71455 -1.14779,10.45605c1.15383,1.7415 2.87854,2.54753 5.17904,2.54753c1.15383,0 2.30352,-0.23135 3.45736,-0.81185c4.601,-1.7415 9.18644,-8.7187 13.78743,-16.85287c4.02051,-1.161 8.04526,-2.31696 12.06576,-2.89746c4.0205,4.644 8.05869,7.55938 11.50586,8.72038c4.0205,1.161 7.46912,-0.59046 9.19629,-4.66113c1.14667,-3.49017 0.56426,-6.38382 -2.30957,-8.13249c-3.45433,-2.322 -9.20267,-2.33018 -16.097,-1.74968c-2.3005,-3.483 -4.58566,-6.96589 -6.31283,-10.45605c2.87383,-8.71467 4.01614,-16.26094 2.86947,-20.91211c-1.15383,-4.07067 -3.53294,-6.74674 -7.47461,-6.74674zM129,114.66667v28.66667h-21.5l28.66667,28.66667l28.66667,-28.66667h-21.5v-28.66667z"></path></g>
                                        </g>
                                    </svg>
                                    <span>Export PDF Data Tenant</span>
                                </a>
                            </div>
                        </div>
                        @if($informasi)
                        <!-- CTA -->
                        <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-gray-50 bg-lightBlue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-lightBlue"
                            href="{{ route('download') }}?file={{ $informasi->file }}">
                            <div class="flex items-center">
                                @php
                                    $data = explode('.', $informasi->hasFile->nama_file);
                                    $nama_file = $data[0];
                                @endphp
                                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span>{{ $nama_file }}</span>
                            </div>
                            <div class="flex flex-row p-2 bg-yellow-300 rounded-md hover:bg-yellow-400 text-gray-900">
                                <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span>Download</span>
                            </div>
                        </a>
                        @endif
                        <!-- Cards -->
                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                            <!-- Card -->
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-md border dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Nama Brand
                                    </p>
                                    <p class="text-md font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $owner->nama_brand }}
                                    </p>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-md border dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 14.062V20h2v-5.938c3.946.492 7 3.858 7 7.938H4a8.001 8.001 0 0 1 7-7.938zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6z"/></svg>
                                    {{-- <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg> --}}
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Nama Ketua
                                    </p>
                                    <p class="text-md font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $owner->nama_ketua }}
                                    </p>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-md border dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6.5-.25a1.25 1.25 0 0 0-2.5 0 1.25 1.25 0 0 0 2.5 0zM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/></svg>
                                    {{-- <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0-2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm6.5-.25a1.25 1.25 0 0 1-2.5 0 1.25 1.25 0 0 1 2.5 0zM12 4c-2.474 0-2.878.007-4.029.058-.784.037-1.31.142-1.798.332-.434.168-.747.369-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.006 9.075 4 9.461 4 12c0 2.474.007 2.878.058 4.029.037.783.142 1.31.331 1.797.17.435.37.748.702 1.08.337.336.65.537 1.08.703.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.474 0 2.878-.007 4.029-.058.782-.037 1.309-.142 1.797-.331.433-.169.748-.37 1.08-.702.337-.337.538-.65.704-1.08.19-.493.296-1.02.332-1.8.052-1.104.058-1.49.058-4.029 0-2.474-.007-2.878-.058-4.029-.037-.782-.142-1.31-.332-1.798a2.911 2.911 0 0 0-.703-1.08 2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.925 4.006 14.539 4 12 4zm0-2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2z"/></svg> --}}
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Instagram
                                    </p>
                                    @if($owner->instagram)
                                    <a href="https://www.instagram.com/{{ str_replace('@','', $owner->instagram) }}" class="text-md font-semibold text-gray-700 dark:text-gray-200 hover:text-lightBlue-600">
                                        {{ $owner->instagram }} 
                                    </a>
                                    @else
                                    <span class="text-md font-semibold text-gray-700 dark:text-gray-200">
                                        -
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-md border dark:bg-gray-800">
                                <div
                                    class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                                    <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M2.05 13h5.477a17.9 17.9 0 0 0 2.925 8.88A10.005 10.005 0 0 1 2.05 13zm0-2a10.005 10.005 0 0 1 8.402-8.88A17.9 17.9 0 0 0 7.527 11H2.05zm19.9 0h-5.477a17.9 17.9 0 0 0-2.925-8.88A10.005 10.005 0 0 1 21.95 11zm0 2a10.005 10.005 0 0 1-8.402 8.88A17.9 17.9 0 0 0 16.473 13h5.478zM9.53 13h4.94A15.908 15.908 0 0 1 12 20.592 15.908 15.908 0 0 1 9.53 13zm0-2A15.908 15.908 0 0 1 12 3.408 15.908 15.908 0 0 1 14.47 11H9.53z"/></svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Website
                                    </p>
                                    @if($owner->website)
                                    <a target="_blank" href="https://{{ $owner->website }}" class="text-md font-semibold text-gray-700 dark:text-gray-500 hover:text-lightBlue-600">
                                        Kunjungi Website
                                    </a>
                                    @else
                                    <span class="text-md font-semibold text-gray-700 dark:text-gray-200">
                                        -
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Charts -->
                        <h2 id="chart_title" class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            Charts
                        </h2>
                        <div class="grid gap-6 mb-8 md:grid-cols-2">
                            <div id="pie-chart" class="min-w-0 p-4 bg-white rounded-lg shadow-md border dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                                    Prestasi
                                </h4>
                                <canvas id="pie"></canvas>
                                <div class="place-items-center mt-4 grid grid-cols-3 text-md text-gray-600 dark:text-gray-400">

                                </div>
                            </div>
                            <div id="line-chart" class="min-w-0 p-4 bg-white rounded-lg shadow-md border dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                                    Kas
                                </h4>
                                <canvas id="line"></canvas>
                                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                                    <!-- Chart legend -->
                                    <div class="flex items-center">
                                        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                                        <span>Saldo</span>
                                    </div>
                                </div>
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
        async function lineChart(){
            const dataKas = await fetch(`{{ route('getBukuKas', session('login-data')['id'])}}`)
            .then(response => response.json())
            .then(result => result);
            console.log(dataKas);
            const lineConfig = {
            type: 'line',
            data: {
                labels: dataKas.data?.tanggal,
                datasets: [
                {
                    label: 'Saldo',
                    /**
                     * These colors come from Tailwind CSS palette
                     * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                     */
                    backgroundColor: '#1D7481',
                    borderColor: '#1D7481',
                    data: dataKas.data?.saldo,
                    fill: false,
                }
                ],
            },
            options: {
                responsive: true,
                /**
                 * Default legends are ugly and impossible to style.
                 * See examples in charts.html to add your own legends
                 *  */
                legend: {
                display: false,
                },
                tooltips: {
                mode: 'index',
                intersect: false,
                },
                hover: {
                mode: 'nearest',
                intersect: true,
                },
                scales: {
                x: {
                    display: true,
                    scaleLabel: {
                    display: true,
                    labelString: 'Month',
                    },
                },
                y: {
                    display: true,
                    scaleLabel: {
                    display: true,
                    labelString: 'Value',
                    },
                },
                },
            },
            }

            if (dataKas.status == 'failed') {
                const lineChart = document.getElementById('line-chart');
                lineChart.classList.add('hidden');
                return 0;
            }

            // change this to the id of your chart element in HMTL
            const lineCtx = document.getElementById('line')
            window.myLine = new Chart(lineCtx, lineConfig)
            return 1;
        }

        async function pieChart(){
            const prestasi = await fetch(`{{ route('countPrestasi', session('login-data')['id'])}}`)
            .then(response => response.json())
            .then(result => result);
            console.log(prestasi);
            const pieConfig = {
            type: 'doughnut',
            data: {
                datasets: [
                {
                    data: prestasi.data?.total,
                    /**
                     * These colors come from Tailwind CSS palette
                     * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                     */
                    backgroundColor: ['#3F82F8', '#1D7481', '#5850EC', '#F05252', '#057A55', '#9F580A'],
                    // label: 'Dataset 1',
                },
                ],
                labels: prestasi.data?.tingkat_prestasi,
            },
            options: {
                responsive: true,
                cutoutPercentage: 80,
                /**
                 * Default legends are ugly and impossible to style.
                 * See examples in charts.html to add your own legends
                 *  */
                legend: {
                display: true,
                },
            },
            }

            // change this to the id of your chart element in HMTL
            if (prestasi.status == 'failed') {
                const pieChart = document.getElementById('pie-chart');
                pieChart.classList.add('hidden');
                return 0;
            }
            const pieCtx = document.getElementById('pie')
            window.myPie = new Chart(pieCtx, pieConfig)
            return 1;
        }

        async function checkCharts() {
            const kas = await lineChart();
            const prestasi = await pieChart();
            if (kas == 0 && prestasi == 0) {
                document.getElementById('chart_title').classList.add('hidden');
            }
        }

        checkCharts();
        lineChart();
        pieChart();


    </script>

    </html>
@endsection
