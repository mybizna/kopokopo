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
