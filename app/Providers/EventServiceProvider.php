<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Traits\UploadAble;


class EventServiceProvider extends ServiceProvider
{
    use UploadAble;
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        \Event::listen('Alexusmai\LaravelFileManager\Events\FilesUploaded',
            function ($event) {
                $this->createThumbs("media",$event->path(),$event->files(),$event->overwrite());
            }
        );
    }
}
