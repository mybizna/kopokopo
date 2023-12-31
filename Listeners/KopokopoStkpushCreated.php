<?php

namespace Modules\Kopokopo\Listeners;

use Modules\Kopokopo\Classes\Kopokopo;

class KopokopoStkpushCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->table_name == 'kopokopo_stkpush') {
            if (defined('MYBIZNA_MIGRATION') && MYBIZNA_MIGRATION) {
                return;
            }

            $kopokopo = new Kopokopo();
            $kopokopo->setPackages($event->model);
        }

    }
}
