<?php

namespace Webkul\User\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Webkul\User\Repositories\AdminRepository;

class ResetAdminPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:admin:reset-password {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the password for the admin user.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(protected AdminRepository $adminRepository)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $password = $this->argument('password');

        if (strlen($password) < 6) {
            $this->error('The password must be at least 6 characters.');

            return;
        }

        $admin = $this->adminRepository->find(1);

        if (! $admin) {
            $this->error('Admin user not found.');

            return;
        }

        $admin->password = Hash::make($password);
        $admin->save();

        $this->info('Admin password has been reset successfully.');
    }
}
