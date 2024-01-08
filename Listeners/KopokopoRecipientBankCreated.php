<?php

namespace Modules\Kopokopo\Listeners;

use Modules\Kopokopo\Classes\KopokopoAPI;

class KopokopoRecipientBankCreated
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
        if ($event->table_name == 'kopokopo_recipient_bank') {

            $data = [
                'bankBranchRef' => $event->model->reference,
                'accountName' => $event->model->account_name,
                'accountNumber' => $event->model->account_number,
                'settlementMethod' => $event->model->settlement_method,
            ];

            $kopokopo = new KopokopoAPI();

            $response = $kopokopo->paybankrecipient($data);

            $event->model->location = $response['location'];
            $event->model->save();
        }

    }
}
