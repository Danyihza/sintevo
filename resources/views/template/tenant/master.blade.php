<!DOCTYPE html>
<html x-cloak x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | SINTEVO</title>
    @include('favicon.favicon')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}css/tailwind.output.css" />
    {{-- <link rel="stylesheet" href="{{ asset('') }}css/app.css" /> --}}
    <link rel="stylesheet" href="{{ asset('') }}css/custom.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/remixicon.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('') }}js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('') }}js/charts-lines.js" defer></script>
    <script src="{{ asset('') }}js/charts-pie.js" defer></script>
</head>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

@yield('body')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('') }}js/myscript.js"></script>
<script>
    
</script>
<script>
    loadAvatar();
    // showAnnouncements();
    async function loadAvatar(){
        const id_user = "{{ session('login-data')['id'] }}";
        const avatar = await fetch(`{{ route('getAvatar') }}/${id_user}`)
        .then(response => response.json())
        .then(result => result.data)
        .catch(error => console.error(error));
        const path = `{{ asset('/assets/img/tenant') }}/${avatar}`;
        $('#topbar-image').attr('src', path);
    }

    // async function loadAnnouncements(){
    //     const announcement = await fetch(`{{ route('getpengumuman')}}`)
    //     .then(response => response.json())
    //     .then(result => result.data)
    //     .catch(error => console.error(error));
    //     const array = Object.keys(announcement).map((value, key) => {
    //         return [
    //         value.id_pengumuman,
    //         value.kode,
    //         value.pengumuman,
    //     ]})

    //     // console.log(array);
    //     return array;
    // }

    // async function showAnnouncements(){
    //     const announcement = await loadAnnouncements();
    //     console.log(announcement);
    //     announcement.forEach((item, index) => {
    //         setTimeout(() => {
    //             $('#announcement_bar').attr('placeholder', item.pengumuman)
    //         }, 3000 * index);
    //     })
    //     // showAnnouncements();
    // }
</script>

@yield('script')