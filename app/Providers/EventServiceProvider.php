<?php

namespace App\Providers;

use App\Events\SupportReplied;
use App\Listeners\SendMailSupportReplied;
use App\Models\{Admin,User,Course, Lesson, ReplySupport, };
use App\Observers\{AdminObserver,UserObserver,CourseObserver,LessonObserver, ReplySupportObserver, };
use Illuminate\Auth\Events\{
    Registered
};
use Illuminate\Auth\Listeners\{
    SendEmailVerificationNotification
};
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        SupportReplied::class => [
            SendMailSupportReplied::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Admin::observe(AdminObserver::class);
        Course::observe(CourseObserver::class);
        Lesson::observe(LessonObserver::class);
        ReplySupport::observe(ReplySupportObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
