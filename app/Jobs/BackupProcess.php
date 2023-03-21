<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Backup;

class BackupProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $backup = new Backup();
        $backup->status = 'Pending';
        $backup->url = 'http://localhost';
        $backup->save();

        $storagePath = storage_path().'/app/public/backups/';

        $command = "mysqldump --column-statistics=0 -u root -p'root' --databases bd_cursolaravel > " . $storagePath . "backup.sql";
        exec($command, $output, $err);

        $backup->status = 'Done';
        $backup->save();
    }
}
