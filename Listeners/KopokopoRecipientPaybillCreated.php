<?php

namespace Modules\Kopokopo\Listeners;

use Modules\Kopokopo\Classes\KopokopoAPI;

class KopokopoRecipientPaybillCreated
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
        if ($event->table_name == 'kopokopo_recipient_paybill') {

            $data = [
                'paybillName' => $event->model->paybill_name,
                'paybillNumber' => $event->model->paybill_number,
                'paybillAccountNumber' => $event->model->paybill_account_number,
            ];


            $kopokopo = new KopokopoAPI();

            $response = $kopokopo->paypaybillrecipient($data);

            $event->model->link_resource = $response['location'];
            $event->model->save();
        }

    }
}
