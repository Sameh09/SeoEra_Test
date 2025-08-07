<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Post;
use App\Mail\DailyReportMail;
use Illuminate\Support\Facades\Mail;

class SendDailyReport extends Command
{
    protected $signature = 'report:daily';
    protected $description = 'Send a daily email report of new users and posts';

    public function handle(): void
    {
        $today = now()->startOfDay();

        $newUsers = User::where('created_at', '>=', $today)->get();
        $newPosts = Post::where('created_at', '>=', $today)->with('user')->get();

        $adminEmail = 'admin@mail.com'; 

        Mail::to($adminEmail)->send(new DailyReportMail($newUsers, $newPosts));

        $this->info('✅ Daily report email sent to admin.');
    }
}
