<?php

namespace Modules\Kopokopo\Listeners;

use Modules\Kopokopo\Classes\KopokopoAPI;

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

            $data = [
                'firstName' => $event->model->first_name,
                'lastName' => $event->model->last_name,
                'phoneNumber' => $event->model->phone_number,
                'amount' => $event->model->amount,
                'callbackUrl' => $event->model->callback_url,
            ];

            $kopokopo = new KopokopoAPI();

            $response = $kopokopo->stk($data);

            $event->model->link_relocationsource = $response['location'];
            $event->model->save();
        }

    }
}
