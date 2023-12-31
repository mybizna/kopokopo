<?php

namespace Modules\Kopokopo\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Base\Events\ModelCreated;
use Modules\Base\Events\ModelDeleted;
use Modules\Kopokopo\Listeners\KopokopoStkpushCreated;
use Modules\Kopokopo\Listeners\KopokopoStkpushDeleted;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ModelCreated::class => [
            KopokopoStkpushCreated::class,
        ],
        ModelDeleted::class => [
            KopokopoStkpushDeleted::class,
        ],
    ];

}
