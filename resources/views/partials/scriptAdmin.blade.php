{{-- =========== Scripts ========= --}}

@if (session('error'))
    <script>
        alert("{{ session('error') }}")
    </script>
@endif

<script src="{{ asset('js/navigation.js') }}"></script>
<script src="{{ asset('js/nightModeAdmin.js') }}"></script>
<script src="{{ asset('js/modalBoxAdmin.js') }}"></script>
<script src="{{ asset('js/loader.js') }}"></script>

{{--  ====== ionicons ======= --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>