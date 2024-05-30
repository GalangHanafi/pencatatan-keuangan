<div id="alert"
    {{ $attributes->merge(['class' => 'alert alert-' . $type . ' alert-dismissible fade show']) }}
    role="alert">
    {{ $slot }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>
    setTimeout(() => {
        $('#alert').fadeOut()
    }, 2000);
</script>
