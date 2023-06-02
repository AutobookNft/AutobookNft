<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // get the file name from the command line argument
        $fileName = $this->argument('name');

        // make sure the file name ends in '.php'
        if (!Str::endsWith($fileName, '.php')) {
            $fileName .= '.php';
        }

        // create the file and make sure it was created successfully
        if (!File::put($fileName, '')) {
            $this->error('Unable to create the file');
        } else {
            $this->info('File created successfully');
        }
        return Command::SUCCESS;
    }
}
