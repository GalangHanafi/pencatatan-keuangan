<x-layouts.app>
        @include('admin.includes.sidebar')

        <div class="body-wrapper d-flex flex-column border" style="min-height: 100vh;">

            @include('admin.includes.header')

            <div class="container-fluid flex-grow-1">
                @include('admin.includes.breadcrumb')
                @include('admin.includes.session-status')

                @isset($content)
                    @include($content)
                @endisset
            </div>

            @include('admin.includes.footer')
        </div>
</x-layouts.app>
