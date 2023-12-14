<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Carbon;

class UpdateLiveStatus extends Command
{
    protected $signature = 'user:update-live-status';

    protected $description = 'Update live status for users based on last activity';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $threshold = Carbon::now()->subMinutes(15); // Adjust the threshold as needed

        User::where('last_activity_at', '<', $threshold)
            ->update(['live_status' => false]);

        $this->info('Live status updated successfully.');
    }
}
