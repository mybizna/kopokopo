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

            //check if response['status'] is success and location is set
            if ($response['status'] == 'success' && isset($response['location'])) {
                $event->model->location = $response['location'];
                //check if response['result'] is an array and response['result']['status'] is success
                if (is_array($response['result']) && $response['result']['status'] == 'success') {
                    $event->model->published = true;
                    $event->model->result = $response['result'];
                    $event->model->reference = $response['result']['data']['recipientReference'];
                } else {
                    $event->model->published = false;
                }

            }

            $event->model->save();
        }

    }
}
