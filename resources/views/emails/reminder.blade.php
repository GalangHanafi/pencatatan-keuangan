<x-mail::message>
    # Reminder Notification

    Dear {{ $reminder->user->name }},

    This is a reminder for: {{ $reminder->title }}.

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
