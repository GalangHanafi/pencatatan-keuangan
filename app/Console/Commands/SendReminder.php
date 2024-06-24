<?php

namespace App\Console\Commands;

use App\Models\Reminder;
use App\Notifications\ReminderNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Reminder to user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $reminders = Reminder::where('date', '<=', now())->get();
        foreach ($reminders as $reminder) {
            // Send email notification to the user
            Notification::route('mail', $reminder->user->email)
                ->notify(new ReminderNotification($reminder));

            // set next reminder date based on frequency
            if ($reminder->frequency == 'week') {
                $reminder->update(['date' => Carbon::parse($reminder->date)->next($reminder->day_of_week)->toDateString()]);
            } elseif ($reminder->frequency == 'month') {
                $reminder->update(['date' => Carbon::parse($reminder->date)->addMonth()->toDateString()]);
            } elseif ($reminder->frequency == 'year') {
                $reminder->update(['date' => Carbon::parse($reminder->date)->addYear()->toDateString()]);
            } elseif ($reminder->frequency == 'none') {
                $reminder->delete();
            }
        }
    }
}
