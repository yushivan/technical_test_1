<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Notifications\TaskDeadlineReminder;
use Illuminate\Console\Command;

class SendTaskReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-task-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = Task::where('deadline', '>=', now())
            ->where('deadline', '<=', now()->addHour())
            ->where('is_completed', false)
            ->get();

        foreach ($tasks as $task) {
            $task->user->notify(new TaskDeadlineReminder($task));
        }
    }
}
