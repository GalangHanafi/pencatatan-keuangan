<div>
    <div class="mb-3 d-flex flex-column align-items-center">
        <button id="iconButton" type="button" class="btn bg-body-secondary" data-bs-toggle="modal"
            data-bs-target="#iconModal">
            <i id="selectedIcon" class="ti ti-plus display-1"></i>
        </button>
        <label for="selectedIcon" class="form-label mt-2">Select an Icon</label>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="iconModal" tabindex="-1" aria-labelledby="iconModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="iconModalLabel">choose your favorite icon</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-wrap justify-content-center gap-2">
                    @foreach ($icons as $icon)
                        <div id="{{ $icon->name }}"
                            class="d-flex align-items-center position-relative border rounded-circle icon-container bg-body-tertiary">
                            <input class="cursor-pointer position-absolute opacity-0 icon-input size-4-rem"
                                type="radio" name="icon" id="{{ $icon->name }}" value="{{ $icon->name }}">
                            <div class="d-flex align-items-center justify-content-center size-4-rem">
                                <i class="{{ $icon->name }} display-5"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .size-4-rem {
            height: 4rem !important;
            width: 4rem !important;
        }
    </style>

    @isset($category)
        <script>
            // Set the selected icon from the database on page load
            $('.icon-input').each(function() {
                if ($(this).val() == "{{ $category->icon }}") {
                    $(this).prop('checked', true);
                    $(this).closest('.icon-container').addClass('border-primary').removeClass(
                        'bg-body-tertiary');
                    // Update the icon in the button
                    var selectedIconClass = $(this).val();
                    $('#selectedIcon').attr('class', selectedIconClass + ' display-1');
                }
            });
        </script>
    @endisset

    <script>
        $(document).ready(function() {
            // Change event for radio buttons
            $('.icon-input').on('change', function() {
                // Remove border-primary and add bg-body-tertiary to all containers
                $('.icon-container').removeClass('border-primary').addClass('bg-body-tertiary');
                // Add border-primary to the selected container and remove bg-body-tertiary
                if ($(this).is(':checked')) {
                    $(this).closest('.icon-container').addClass('border-primary').removeClass(
                        'bg-body-tertiary');
                    // Update the icon in the button
                    var selectedIconClass = $(this).val();
                    $('#selectedIcon').attr('class', selectedIconClass + ' display-1');
                }
            });

            // Hover effect for icon container
            $('.icon-container').hover(function() {
                $(this).removeClass('bg-body-tertiary');
            }, function() {
                // Only add bg-body-tertiary if the input is not checked
                if (!$(this).find('.icon-input').is(':checked')) {
                    $(this).addClass('bg-body-tertiary');
                }
            });

            // Hover effect for iconButton
            $('#iconButton').hover(function() {
                $(this).addClass('bg-body-tertiary');
            }, function() {
                $(this).removeClass('bg-body-tertiary');
            });
        });
    </script>
</div>
