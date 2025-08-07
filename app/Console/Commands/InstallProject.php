<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDO;
use PDOException;

class InstallProject extends Command
{
    protected $signature = 'install:project';
    protected $description = 'Set up the Laravel project';

    public function handle()
    {
        $this->info("🔧 Installing project...");

        if (!file_exists(base_path('.env'))) {
            copy(base_path('.env.example'), base_path('.env'));
            $this->info('.env file copied');
            $this->reloadEnv();
        }

        $this->createDatabaseIfNotExists();

        $this->call('key:generate');

        $this->call('jwt:secret', ['--force' => true]);


        $this->call('migrate:fresh', ['--seed' => true]);

        $this->call('optimize:clear');


        exec('npm install');
        exec('npm run build');

        $this->info("Project installed successfully!");

        $this->call('serve');
    }

    protected function reloadEnv()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(base_path());
        $dotenv->load();

        Artisan::call('config:clear');
        Artisan::call('config:cache');
    }
    protected function createDatabaseIfNotExists()
    {
        $dbName = env('DB_DATABASE');
        $dbHost = env('DB_HOST', '127.0.0.1');
        $dbPort = env('DB_PORT', '3306');
        $dbUsername = env('DB_USERNAME', 'root');
        $dbPassword = env('DB_PASSWORD', '');

        try {
            $pdo = new PDO("mysql:host=$dbHost;port=$dbPort", $dbUsername, $dbPassword);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
            $this->info(" Database '$dbName' created or already exists.");
        } catch (PDOException $e) {
            $this->error(" Failed to create database: " . $e->getMessage());
            exit(1);
        }
    }
}
