<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\VeritifiMail;
class Vertifi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id ;
    public function __construct($data)
    {
        $this->id = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {       
        try{
            $datass = $this->id;
            $ids = $datass['id'];
            Mail::to($datass['email'])->send(new VeritifiMail($datass));
        }catch (\Exception $e) {
          return $this->renderJsonResponse( $e->getMessage() );
        }
    }
}
