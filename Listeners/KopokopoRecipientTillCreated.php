<?php

namespace Modules\Kopokopo\Listeners;

use Modules\Kopokopo\Classes\KopokopoAPI;

class KopokopoRecipientTillCreated
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
        if ($event->table_name == 'kopokopo_recipient_till') {

            $data = [
                'tillName' => $event->model->till_number,
                'tillNumber' => $event->model->till_name,
            ];

            $kopokopo = new KopokopoAPI();

            $response = $kopokopo->paytillrecipient($data);

            $event->model->location = $response['location'] ?? '';
            $event->model->save();
        }

    }
}
