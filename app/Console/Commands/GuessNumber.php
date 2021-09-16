<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GuessNumber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guess:number';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tebak Angka';

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
        $min = 1;
        $max = 100;
        $number = rand($min,$max);
        $guessTotal = 0;

        while($guess = $this->ask('Please guess 1 number between '.$min.'-'.$max.'?')) {
            if ($guess < $number) {
                $guessTotal++;
                $this->warn('Your number is too LOWER, please try again!');
                continue;
            }
            if ($guess > $number) {
                $guessTotal++;
                $this->error('Your number is too HIGHER, please try again!');
                continue;
            }
            if ($guess == $number) {
                $guessTotal++;
                $this->line('============================================');
                $this->info('Your number is RIGHT!');
                $this->info('You have been guessed '.$guessTotal.' TIMES!');
                $this->line('============================================');

                if ($this->confirm('Want to restart this game?')) {
                    $this->handle();
                }
                exit;
            }
        }

        return 0;
    }
}
