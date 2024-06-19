<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        <form action="{{ route('reminder.store') }}" method="POST">
            @csrf

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3">
                    <label for="name" class="form-label">Reminder Name</label>
                    <input autocomplete="off" type="text" class="form-control" name="name" id="name"
                        placeholder="Enter reminder name" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="frequency" class="form-label">Frequency</label>
                    <select id="frequency" name="frequency" class="form-select">
                        <option value="none" selected>None</option>
                        <option value="week">Weekly</option>
                        <option value="month">Monthly</option>
                        <option value="year">Yearly</option>
                    </select>
                    <x-input-error :messages="$errors->get('frequency')" class="mt-2" />
                </div>

                <div class="mb-3" id="day_of_week" style="display: none">
                    <label for="day_of_week" class="form-label">Day you want to be reminded</label>
                    <select name="day_of_week" class="form-select">
                        <option value="" selected disabled>Select a day</option>
                        <option value="sunday">Sunday</option>
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                        <option value="friday">Friday</option>
                        <option value="saturday">Saturday</option>
                    </select>
                    <x-input-error :messages="$errors->get('day_of_week')" class="mt-2" />
                </div>

                <div class="mb-3" id="date">
                    <label for="date" class="form-label">Next Date you want to be reminded</label>
                    <input type="date" class="form-control" name="date" id="date" min="{{ date('Y-m-d') }}"
                        required>
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#day_of_week').hide();
        $('#frequency').on('change', function() {
            $('#date input').val('');
            if ($(this).val() == 'none') {
                $('#day_of_week').hide();
                $('#day_of_week select').prop('required', false);
                $('#date').show();
                $('#date input').prop('required', true).prop('min', '{{ date('Y-m-d') }}');
            } else if ($(this).val() == 'week') {
                $('#day_of_week').show();
                $('#day_of_week select').prop('required', true);
                $('#date').hide();
                $('#date input').prop('required', false);
            } else if ($(this).val() == 'month') {
                $('#day_of_week').hide();
                $('#day_of_week select').prop('required', false);
                $('#date').show();
                $('#date input').prop('required', true).prop('min', '{{ date('Y-m-d') }}').prop('max',
                    '{{ date('Y-m-d', strtotime('+1 month')) }}');
            } else if ($(this).val() == 'year') {
                $('#day_of_week').hide();
                $('#day_of_week select').prop('required', false);
                $('#date').show();
                $('#date input').prop('required', true).prop('min', '{{ date('Y-m-d') }}').prop('max',
                    '{{ date('Y-m-d', strtotime('+1 year')) }}');
            }
        })
    })
</script>
