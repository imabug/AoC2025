<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Day1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:day1 {data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load and process the data for AoC2025 Day 1';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Part 1: Door password
        $f = fopen($this->argument('data'), 'r');
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
