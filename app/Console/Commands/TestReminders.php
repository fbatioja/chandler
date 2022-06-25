<?php

namespace App\Console\Commands;

use App\Contact\ManageReminders\Services\RescheduleContactReminderForChannel;
use App\Jobs\Notifications\SendEmailNotification;
use App\Models\UserNotificationChannel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class TestReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:send-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all the scheduled contact reminders regardless of the time they should be send.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        if (App::environment('production')) {
            exit;
        }

        $scheduledContactReminders = DB::table('contact_reminder_scheduled')
            ->where('triggered_at', null)
            ->get();

        foreach ($scheduledContactReminders as $scheduledReminder) {
            $channel = UserNotificationChannel::findOrFail($scheduledReminder->user_notification_channel_id);

            if ($channel->type == UserNotificationChannel::TYPE_EMAIL) {
                SendEmailNotification::dispatch(
                    $scheduledReminder->user_notification_channel_id,
                    $scheduledReminder->contact_reminder_id
                )->onQueue('low');
            }

            (new RescheduleContactReminderForChannel())->execute([
                'contact_reminder_id' => $scheduledReminder->contact_reminder_id,
                'user_notification_channel_id' => $scheduledReminder->user_notification_channel_id,
                'contact_reminder_scheduled_id' => $scheduledReminder->id,
            ]);
        }
    }
}
