<?php

namespace Modules\Kopokopo\Listeners;

use Modules\Kopokopo\Classes\KopokopoAPI;

class KopokopoPayCreated
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
        if ($event->table_name == 'kopokopo_pay') {

            $data = [
                'destinationType' => $event->model->destination_type,
                'destinationReference' => $event->model->destination_reference,
                'amount' => $event->model->amount,
                'currency' => $event->model->currency,
                'description' => $event->model->description,
                'callbackUrl' => $event->model->callback_url,
                'metadata' => [
                    'id'=>$event->model->id,
                ]
            ];

            $kopokopo = new KopokopoAPI();

            $response = $kopokopo->pay($data);

             //check if response['status'] is success and location is set
             if ($response['status'] == 'success' && isset($response['location'])) {
                $event->model->location = $response['location'];
                //check if response['result'] is an array and response['result']['status'] is success
                if (is_array($response['result']) && $response['result']['status'] == 'success') {
                    $event->model->published = true;
                    $event->model->result = $response['result'];
                } else {
                    $event->model->published = false;
                }

            }
            $event->model->save();
        }

    }
}
