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
                            Kelulusan
                        </h2>
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
        
    </script>

    </html>
@endsection
