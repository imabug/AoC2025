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
        $start = 50;
        $dialPos = $start;
        $zeroCount = 0;
        $clickZero = 0;

        $f = fopen($this->argument('data'), 'r');

        while (($l = fgets($f)) !== false) {
            $direction = substr($l, 0, 1);
            $rotAmt = (int) substr($l, 1);

            switch($direction) {
                case 'R':
                    // Rotate the dial to the right
                    $dialPos += $rotAmt;
                    if ($dialPos > 100) {
                        $dialPos %= 100;
                    }
                    break;
                case 'L':
                    $dialPos -= $rotAmt;
                    if ($dialPos < 0) {
                        $dialPos = ($dialPos %= 100) + 100;
                    }
                    break;
                default:
                    break;
            }
            if ($dialPos == 100) $dialPos = 0;
            if ($dialPos == 0) $zeroCount++;
        }
        $this->info('Dial pointed at 0 ' . $zeroCount . ' times');
        $this->info('Dial clicked past 0 ' . $clickZero + $zeroCount . ' times');
        return 1;
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
