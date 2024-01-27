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
