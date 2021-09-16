<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StarMaker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:star';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Star Generator';

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
        $max = $this->ask('Please enter the maximum rows of stars?');

        for ($i=0; $i < $max; $i++) {
            $stars = '';
            for ($j=0; $j <= $i; $j++) {
                $stars .= '*';
            }
            $this->info($stars);
        }

        $this->newLine();

        for ($i=0; $i < $max; $i++) {
            $stars = '';
            for ($j=0; $j < ($max-$i); $j++) {
                $stars .= '*';
            }
            $this->info($stars);
        }

        $this->newLine();
        $this->line('=====================');
        $this->newLine();

        for ($i=1; $i <= $max; $i++) {
            $stars = '';
            for ($j=1; $j <= ($max-$i); $j++) {
                $stars .= ' ';
            }
            for ($j=1; $j <= $i; $j++) {
                $stars .= '*';
            }
            $this->info($stars);
        }

        $this->newLine();

        for ($i=1; $i <= $max; $i++) {
            $stars = '';
            for ($j=1; $j < $i; $j++) {
                $stars .= ' ';
            }
            for ($j=0; $j <= ($max-$i); $j++) {
                $stars .= '*';
            }
            $this->info($stars);
        }

        return 0;
    }
}
