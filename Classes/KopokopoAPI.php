<?php

namespace Modules\Kopokopo\Classes;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Kopokopo\SDK\K2;

class KopokopoAPI
{
    private $access_token;
    private $options;
    private $K2;

    public function __construct($faking = false)
    {

        if($faking){
            $faking = !Config::get('kopokopo.enable_faking');
        }

        $sandbox_till_number = Config::get('kopokopo.sandbox_till_number');
        $sandbox_client_id = Config::get('kopokopo.sandbox_client_id');
        $sandbox_client_secret = Config::get('kopokopo.sandbox_client_secret');
        $sandbox_api_key = Config::get('kopokopo.sandbox_api_key');
        print_r($sandbox_client_secret."\n");exit;

        $till_number = Config::get('kopokopo.till_number');
        $client_id = Config::get('kopokopo.client_id');
        $client_secret = Config::get('kopokopo.client_secret');
        $api_key = Config::get('kopokopo.api_key');

        if (Cache::has("kopokopo_access_token")) {
            $this->access_token = Cache::get("kopokopo_access_token");
            $this->K2 = Cache::get("kopokopo_K2");
        } else {
            try {
                $subdomain = ($faking) ? 'sandbox' : 'api';
                // do not hard code these values
                $options = [
                    'clientId' => ($faking)?$sandbox_client_id:$client_id,
                    'clientSecret' => ($faking)?$sandbox_client_secret:$client_secret,
                    'apiKey' => ($faking)?$sandbox_api_key:$api_key,
                    'baseUrl' => "https://{$subdomain}.kopokopo.com",
                ];

                $K2 = new K2($options);

                // Get one of the services
                $tokens = $K2->TokenService();

                // Use the service
                $this->access_token = $response['data']['accessToken'];
                $this->K2 = $K2;

                Cache::put("kopokopo_K2", $result, 3599);
                Cache::put("kopokopo_access_token", $result, 3599);

            } catch (\Throwable $th) {
                throw $th;
            }
        }

    }

    public function revoketoken()
    {
        $K2 = new K2($options);

        $tokens = $this->K2->TokenService();

        $response = $tokens->revokeToken(['accessToken' => $this->access_token]);

        echo json_encode($response);
    }

    public function infotoken()
    {
        $tokens = $this->K2->TokenService();

        $response = $tokens->infoToken(['accessToken' => $this->access_token]);

        echo json_encode($response);
    }

    public function introspecttoken()
    {
        $tokens = $this->K2->TokenService();

        $response = $tokens->introspectToken(['accessToken' => $this->access_token]);

        echo json_encode($response);
    }

    public function subscribe($data)
    {
        $webhooks = $this->K2->Webhooks();

        $options = array(
            'eventType' => $data['eventType'],
            'url' => $data['url'],
            'scope' => $data['scope'],
            'scopeReference' => $data['scope_ref'],
            'accessToken' => $this->access_token,
        );

        $response = $webhooks->subscribe($options);

        echo json_encode($response);
    }

    public function stk($data)
    {
        $url = $this->getUrl();
        $stk = $this->K2->StkService();

        $options = [
            'paymentChannel' => 'M-PESA STK Push',
            'tillNumber' => '514459',
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'phoneNumber' => $data['phoneNumber'],
            'amount' => $data['amount'],
            'callbackUrl' => $url . 'kopokopo/stk/webhook',
            'accessToken' => $this->access_token,
        ];

        $response = $stk->initiateIncomingPayment($options);

        echo json_encode($response);
    }

    public function polling($data)
    {
        $polling = $this->K2->PollingService();

        $options = [
            'fromTime' => $data['from_time'],
            'toTime' => $data['to_time'],
            'scope' => $data['scope'],
            'scopeReference' => $data['scope_ref'],
            'callbackUrl' => $url . 'kopokopo/polling/webhook',
            'accessToken' => $this->access_token,
        ];

        $response = $polling->pollTransactions($options);

        echo json_encode($response);
    }

    public function smsnotification($data)
    {
        $sms_notification = $this->K2->SmsNotificationService();

        $options = [
            'message' => $data['message'],
            'webhookEventReference' => $data['webhookEventReference'],
            'callbackUrl' => $url . 'kopokopo/smsnotification/webhook',
            'accessToken' => $this->access_token,
        ];

        $response = $sms_notification->sendTransactionSmsNotification($options);

        echo json_encode($response);
    }

    public function merchantwallet($data)
    {
        $transfer = $this->K2->SettlementTransferService();

        $options = [
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'phoneNumber' => $data['phoneNumber'],
            'network' => $data['network'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->createMerchantWallet($options);

        echo json_encode($response);
    }

    public function merchantbankaccount($data)
    {
        $transfer = $this->K2->SettlementTransferService();

        $options = [
            'bankBranchRef' => $data['bankBranchRef'],
            'accountName' => $data['accountName'],
            'accountNumber' => $data['accountNumber'],
            'settlementMethod' => $data['settlementMethod'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->createMerchantBankAccount($options);

        echo json_encode($response);
    }
    public function transfer($data)
    {
        $transfer = $this->K2->SettlementTransferService();

        $options = [
            'amount' => $data['amount'],
            'currency' => 'KES',
            'destinationReference' => $data['destinationReference'],
            'destinationType' => $data['destinationType'],
            'callbackUrl' => $url . 'kopokopo/transfer/webhook',
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->settleFunds($options);

        echo json_encode($response);
    }
    public function paymobilerecipient($data)
    {
        $transfer = $this->K2->PayService();

        $options = [
            'type' => 'mobile_wallet',
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'phoneNumber' => $data['phoneNumber'],
            'network' => $data['network'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->addPayRecipient($options);

        echo json_encode($response);
    }
    public function paybankrecipient($data)
    {
        $transfer = $this->K2->PayService();

        $options = [
            'type' => 'bank_account',
            'bankBranchRef' => $data['bankBranchRef'],
            'accountName' => $data['accountName'],
            'accountNumber' => $data['accountNumber'],
            'settlementMethod' => $data['settlementMethod'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->addPayRecipient($options);

        echo json_encode($response);
    }

    public function paytillrecipient($data)
    {
        $transfer = $this->K2->PayService();

        $options = [
            'type' => 'till',
            'tillName' => $data['tillName'],
            'tillNumber' => $data['tillNumber'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->addPayRecipient($options);

        echo json_encode($response);
    }
    public function paypaybillrecipient($data)
    {
        $transfer = $this->K2->PayService();

        $options = [
            'type' => 'paybill',
            'paybillName' => $data['paybillName'],
            'paybillNumber' => $data['paybillNumber'],
            'paybillAccountNumber' => $data['paybillAccountNumber'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->addPayRecipient($options);

        echo json_encode($response);
    }
    public function pay($data)
    {
        $pay = $this->K2->PayService();

        $options = [
            'destinationType' => $data['destinationType'],
            'destinationReference' => $data['destinationReference'],
            'description' => $data['description'],
            'category' => '',
            'tags' => '',
            'amount' => $data['amount'],
            'currency' => 'KES',
            'accessToken' => $this->access_token,
            'callbackUrl' => $data['callbackUrl'] ?? $url . 'kopokopo/pay/webhook',
        ];

        $response = $pay->sendPay($options);

        echo json_encode($response);
    }

    public function webhook()
    {
        $webhooks = $this->K2->Webhooks();

        $json_str = file_get_contents('php://input');

        $response = $webhooks->webhookHandler($json_str, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        echo json_encode($response);
        // print("POST Details: " .$json_str);
        // print_r($json_str);
    }

    public function stk_webhook()
    {
        $webhooks = $this->K2->Webhooks();

        $json_str = file_get_contents('php://input');

        $response = $webhooks->webhookHandler($json_str, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        echo json_encode($response);
        // print("POST Details: " .$json_str);
        // print_r($json_str);
    }

    public function polling_webhook()
    {
        $webhooks = $this->K2->Webhooks();

        $json_str = file_get_contents('php://input');

        $response = $webhooks->webhookHandler($json_str, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        echo json_encode($response);
        // print("POST Details: " .$json_str);
        // print_r($json_str);
    }

    public function smsnotification_webhook()
    {
        $webhooks = $this->K2->Webhooks();

        $json_str = file_get_contents('php://input');

        $response = $webhooks->webhookHandler($json_str, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        echo json_encode($response);
        // print("POST Details: " .$json_str);
        // print_r($json_str);
    }

    public function transfer_webhook()
    {
        $webhooks = $this->K2->Webhooks();

        $json_str = file_get_contents('php://input');

        $response = $webhooks->webhookHandler($json_str, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        echo json_encode($response);
        // print("POST Details: " .$json_str);
        // print_r($json_str);
    }

    public function pay_webhook()
    {
        $webhooks = $this->K2->Webhooks();

        $json_str = file_get_contents('php://input');

        $response = $webhooks->webhookHandler($json_str, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        echo json_encode($response);
        // print("POST Details: " .$json_str);
        // print_r($json_str);
    }

    public function status($data)
    {
        $webhooks = $this->K2->Webhooks();

        $options = array(
            'location' => $data['location'],
            'accessToken' => $access_token,
        );
        $response = $webhooks->getStatus($options);

        echo json_encode($response);
    }

}
