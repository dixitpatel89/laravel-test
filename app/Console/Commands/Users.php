<?php

namespace App\Console\Commands;

use App\Http\Controllers\UsersController;
use Illuminate\Console\Command;

class Users extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update {id} {comments}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User related operation';

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
     * @return mixed
     */
    public function handle(UsersController $user)
    {
        $arguments = $this->argument();
        $id = intval($arguments['id']);
        $comments = $arguments['comments'];
        if (empty($id))
            dd('ID Invalid!');

        return $user->updateData($id, $comments);
    }
}
