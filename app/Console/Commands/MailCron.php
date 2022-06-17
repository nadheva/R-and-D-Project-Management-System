<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Mail;
use App\Models\Task;
use App\Models\RIO;
use Illuminate\Console\Command;

class MailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $task = Task::where('status', '=', 'open')->get();
        $rio = RIO::where('status', '=', 'open')->get();

        foreach($task as $t){
            Mail::send('user.mail.task', compact('task'), function ($message) use($t) {
                $message->from('no-reply.taskmonitoring@gmail.com');
                $message->to($t->user->email, 'R&D Task Activity')
                ->subject("Reminder Task [Loading Allocation] From R&D");
            });
        }
        foreach($rio as $r){
            Mail::send('user.mail.rio', compact('rio'), function ($message) use($r) {
                $message->from('no-reply.taskmonitoring@gmail.com');
                $message->to($r->user->email, 'R&D Project RIO')
                ->subject("Reminder Task [Project RIO] From R&D");
            });
        }

    }
}
