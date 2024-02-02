<!DOCTYPE html>
<html lang="en">

@include('layouts.website._head')
@stack('styles')
<body>

@include('layouts.website._header')


<main>

    <div class="main-wrapper">
        @yield('content')
    </div>

</main>

@include('layouts.website._footer')


@include('modals.website.contact_modals')
@include('modals.website.success_modals')

@stack('modals')
@include('layouts.website._script')
@stack('scripts')

</body>
</html>
