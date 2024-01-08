<?php

namespace Modules\Kopokopo\Listeners;

use Modules\Kopokopo\Classes\KopokopoAPI;

class KopokopoRecipientMobileCreated
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
        if ($event->table_name == 'kopokopo_recipient_mobile') {

            $data = [
                'firstName' => $event->model->first_name,
                'lastName' => $event->model->last_name,
                'phoneNumber' => $event->model->phone_number,
                'network' => $event->model->network,
            ];

            $kopokopo = new KopokopoAPI();

            $response = $kopokopo->paymobilerecipient($data);

            $event->model->location = $response['location'] ?? '';
            $event->model->save();
        }

    }
}
