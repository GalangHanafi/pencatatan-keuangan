<div id="alert" class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    {{ $slot }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>
    setTimeout(() => {
        document.getElementById('alert').remove();
    }, 2000);
</script>
