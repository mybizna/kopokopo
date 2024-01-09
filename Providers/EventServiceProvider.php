<?php

namespace Modules\Kopokopo\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Base\Events\ModelCreated;
use Modules\Kopokopo\Listeners\KopokopoRecipientBankCreated;
use Modules\Kopokopo\Listeners\KopokopoRecipientMobileCreated;
use Modules\Kopokopo\Listeners\KopokopoRecipientPaybillCreated;
use Modules\Kopokopo\Listeners\KopokopoRecipientTillCreated;
use Modules\Kopokopo\Listeners\KopokopoStkpushCreated;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ModelCreated::class => [
            KopokopoStkpushCreated::class,
            KopokopoRecipientBankCreated::class,
            KopokopoRecipientMobileCreated::class,
            KopokopoRecipientTillCreated::class,
            KopokopoRecipientPaybillCreated::class,
        ],
    ];

}
