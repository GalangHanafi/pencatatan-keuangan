<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        <form action="{{ route('reminder.update', $reminder) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3">
                    <label for="name" class="form-label">Reminder Name</label>
                    <input autocomplete="off" type="text" class="form-control" name="name" id="name"
                        placeholder="Enter reminder name" value="{{ $reminder->name }}" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="frequency" class="form-label">Frequency</label>
                    <select id="frequency" name="frequency" class="form-select">
                        <option value="none" {{ $reminder->frequency == 'none' ? 'selected' : '' }}>None</option>
                        <option value="week" {{ $reminder->frequency == 'week' ? 'selected' : '' }}>Weekly</option>
                        <option value="month" {{ $reminder->frequency == 'month' ? 'selected' : '' }}>Monthly</option>
                        <option value="year" {{ $reminder->frequency == 'year' ? 'selected' : '' }}>Yearly</option>
                    </select>
                    <x-input-error :messages="$errors->get('frequency')" class="mt-2" />
                </div>

                <div class="mb-3" id="day_of_week" style="display: none">
                    <label for="day_of_week" class="form-label">Day you want to be reminded</label>
                    <select name="day_of_week" class="form-select">
                        <option value="" disabled>Select a day</option>
                        <option value="sunday" {{ \Carbon\Carbon::parse($reminder->date)->dayName == 'Sunday' ? 'selected' : '' }}>Sunday
                        </option>
                        <option value="monday" {{ \Carbon\Carbon::parse($reminder->date)->dayName == 'Monday' ? 'selected' : '' }}>Monday
                        </option>
                        <option value="tuesday" {{ \Carbon\Carbon::parse($reminder->date)->dayName == 'Tuesday' ? 'selected' : '' }}>Tuesday
                        </option>
                        <option value="wednesday" {{ \Carbon\Carbon::parse($reminder->date)->dayName == 'Wednesday' ? 'selected' : '' }}>
                            Wednesday</option>
                        <option value="thursday" {{ \Carbon\Carbon::parse($reminder->date)->dayName == 'Thursday' ? 'selected' : '' }}>Thursday
                        </option>
                        <option value="friday" {{ \Carbon\Carbon::parse($reminder->date)->dayName == 'Friday' ? 'selected' : '' }}>Friday
                        </option>
                        <option value="saturday" {{ \Carbon\Carbon::parse($reminder->date)->dayName == 'Saturday' ? 'selected' : '' }}>Saturday
                        </option>
                    </select>
                    <x-input-error :messages="$errors->get('day_of_week')" class="mt-2" />
                </div>

                <div class="mb-3" id="date" style="display: none">
                    <label for="date" class="form-label">Next Date you want to be reminded</label>
                    <input type="date" class="form-control" name="date" id="date"
                        value="{{ $reminder->date }}" min="{{ date('Y-m-d') }}" required>
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        function updateFields() {
            var frequency = $('#frequency').val();
            $('#date input').val('');
            if (frequency == 'none') {
                $('#day_of_week').hide();
                $('#day_of_week select').prop('required', false);
                $('#date').show();
                $('#date input').prop('required', true).prop('min', '{{ date('Y-m-d') }}');
            } else if (frequency == 'week') {
                $('#day_of_week').show();
                $('#day_of_week select').prop('required', true);
                $('#date').hide();
                $('#date input').prop('required', false);
            } else if (frequency == 'month') {
                $('#day_of_week').hide();
                $('#day_of_week select').prop('required', false);
                $('#date').show();
                $('#date input').prop('required', true).prop('min', '{{ date('Y-m-d') }}').prop('max',
                    '{{ date('Y-m-d', strtotime('+1 month')) }}');
            } else if (frequency == 'year') {
                $('#day_of_week').hide();
                $('#day_of_week select').prop('required', false);
                $('#date').show();
                $('#date input').prop('required', true).prop('min', '{{ date('Y-m-d') }}').prop('max',
                    '{{ date('Y-m-d', strtotime('+1 year')) }}');
            }
        }

        // Call updateFields when the document is ready
        updateFields();

        // Call updateFields when the frequency dropdown changes
        $('#frequency').on('change', function() {
            updateFields();
        });
    });
</script>
