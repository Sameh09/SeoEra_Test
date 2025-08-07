<?php

// app/Console/Commands/InstallProject.php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallProject extends Command
{
    protected $signature = 'install:project';
    protected $description = 'Install and prepare SeoEra Test Project';

    public function handle()
    {

        $this->info("Installing project...");



        if (!file_exists(base_path('.env'))) {
            copy(base_path('.env.example'), base_path('.env'));
            $this->info('.env file copied');
        }

        $this->call('key:generate');

        $this->call('jwt:secret', ['--force' => true]);

        $this->call('optimize:clear');

        $this->call('migrate', ['--seed' => true]);


        exec('npm install');
        exec('npm run build');

        $this->info(" Project installed successfully!");

        $this->call('serve');
    }
}
