<?php

namespace Modules\Kopokopo\Classes;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Kopokopo\SDK\K2;

class KopokopoAPI
{
    private $access_token;
    private $options;
    private $till_number;

    public function __construct()
    {

        $enable_faking = Config::get('kopokopo.enable_faking');

        $faking = session('client_faking');

        if (!$enable_faking) {
            $faking = false;
        }

        $sandbox_till_number = Config::get('kopokopo.sandbox_till_number');
        $sandbox_client_id = Config::get('kopokopo.sandbox_client_id');
        $sandbox_client_secret = Config::get('kopokopo.sandbox_client_secret');
        $sandbox_api_key = Config::get('kopokopo.sandbox_api_key');

        $till_number = Config::get('kopokopo.till_number');
        $client_id = Config::get('kopokopo.client_id');
        $client_secret = Config::get('kopokopo.client_secret');
        $api_key = Config::get('kopokopo.api_key');

        if ($sandbox_client_id != '' && $client_id == '') {
            $faking = true;
        }

        $subdomain = ($faking) ? 'sandbox' : 'api';

        $this->till_number = ($faking) ? $sandbox_till_number : $till_number;

        $this->options = [
            'clientId' => ($faking) ? $sandbox_client_id : $client_id,
            'clientSecret' => ($faking) ? $sandbox_client_secret : $client_secret,
            'apiKey' => ($faking) ? $sandbox_api_key : $api_key,
            'baseUrl' => "https://{$subdomain}.kopokopo.com",
        ];

        if (Cache::has("kopokopo_{ $subdomain}_access_token")) {
            $this->access_token = Cache::get("kopokopo_{ $subdomain}_access_token");
        } else {
            try {
                $K2 = new K2($this->options);

                $tokens = $K2->TokenService();

                $response = $tokens->getToken();
                // print_r($response); exit;
                $this->log('getToken', $response);

                // Use the service
                $this->access_token = $response['data']['accessToken'];
                $expiresIn = $response['data']['expiresIn'];

                Cache::put("kopokopo_{ $subdomain}_access_token", $this->access_token, $expiresIn);

            } catch (\Throwable $th) {
                throw $th;
            }
        }

    }

    public function revoketoken()
    {
        $K2 = new K2($this->options);

        $tokens = $K2->TokenService();

        $response = $tokens->revokeToken(['accessToken' => $this->access_token]);

        $this->log('revoketoken', $response);

        return $response;
    }

    public function infotoken()
    {
        $K2 = new K2($this->options);

        $tokens = $K2->TokenService();

        $response = $tokens->infoToken(['accessToken' => $this->access_token]);

        $this->log('infotoken', $response);

        return $response;
    }

    public function introspecttoken()
    {
        $K2 = new K2($this->options);

        $tokens = $K2->TokenService();

        $response = $tokens->introspectToken(['accessToken' => $this->access_token]);

        $this->log('introspecttoken', $response);

        return $response;
    }

    public function subscribe($data)
    {
        $K2 = new K2($this->options);

        $webhooks = $K2->Webhooks();

        $options = array(
            'eventType' => $data['eventType'],
            'url' => $data['url'],
            'scope' => $data['scope'],
            'scopeReference' => $data['scope_ref'],
            'accessToken' => $this->access_token,
        );

        $response = $webhooks->subscribe($options);

        $response['result'] = $this->status($response, 'webhooks');

        $this->log('subscribe', $response);

        return $response;
    }

    public function stk($data)
    {

        $K2 = new K2($this->options);

        $stk = $K2->StkService();

        $options = [
            'paymentChannel' => 'M-PESA STK Push',
            'tillNumber' => $this->till_number,
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'currency' => 'KES',
            'phoneNumber' => $data['phoneNumber'],
            'amount' => $data['amount'],
            'callbackUrl' => $data['callbackUrl'] ?? url('/') . '/kopokopo/stk/webhook',
            'accessToken' => $this->access_token,
        ];
        $this->log('stk options', $options);

        $response = $stk->initiateIncomingPayment($options);

        $response['result'] = $this->status($response, 'stk');

        $this->log('stk', $response);

        return $response;
    }

    public function polling($data)
    {
        $K2 = new K2($this->options);

        $polling = $K2->PollingService();

        $options = [
            'fromTime' => $data['from_time'],
            'toTime' => $data['to_time'],
            'scope' => $data['scope'],
            'scopeReference' => $data['scope_ref'],
            'callbackUrl' => $url . 'kopokopo/polling/webhook',
            'accessToken' => $this->access_token,
        ];

        $response = $polling->pollTransactions($options);

        $response['result'] = $this->status($response, 'polling');

        $this->log('polling', $response);

        return $response;
    }

    public function smsnotification($data)
    {
        $K2 = new K2($this->options);

        $sms_notification = $K2->SmsNotificationService();

        $options = [
            'message' => $data['message'],
            'webhookEventReference' => $data['webhookEventReference'],
            'callbackUrl' => $url . 'kopokopo/smsnotification/webhook',
            'accessToken' => $this->access_token,
        ];

        $response = $sms_notification->sendTransactionSmsNotification($options);

        $response['result'] = $this->status($response, 'smsnotification');

        $this->log('smsnotification', $response);

        return $response;
    }

    public function merchantwallet($data)
    {
        $K2 = new K2($this->options);

        $transfer = $K2->SettlementTransferService();

        $options = [
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'phoneNumber' => $data['phoneNumber'],
            'network' => $data['network'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->createMerchantWallet($options);

        $response['result'] = $this->status($response, 'transfer');

        $this->log('merchantwallet', $response);

        return $response;
    }

    public function merchantbankaccount($data)
    {
        $K2 = new K2($this->options);

        $transfer = $K2->SettlementTransferService();

        $options = [
            'bankBranchRef' => $data['bankBranchRef'],
            'accountName' => $data['accountName'],
            'accountNumber' => $data['accountNumber'],
            'settlementMethod' => $data['settlementMethod'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->createMerchantBankAccount($options);

        $response['result'] = $this->status($response, 'transfer');

        $this->log('merchantbankaccount', $response);

        return $response;
    }
    public function transfer($data)
    {
        $K2 = new K2($this->options);

        $transfer = $K2->SettlementTransferService();

        $options = [
            'amount' => $data['amount'],
            'currency' => 'KES',
            'destinationReference' => $data['destinationReference'],
            'destinationType' => $data['destinationType'],
            'callbackUrl' => $url . 'kopokopo/transfer/webhook',
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->settleFunds($options);

        $response['result'] = $this->status($response, 'transfer');

        $this->log('transfer', $response);

        return $response;
    }
    public function paymobilerecipient($data)
    {
        $K2 = new K2($this->options);

        $transfer = $K2->PayService();

        $options = [
            'type' => 'mobile_wallet',
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'phoneNumber' => $data['phoneNumber'],
            'email' => 'dedanirungu+' . $data['lastName'] . '@gmail.com',
            'network' => $data['network'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->addPayRecipient($options);

        $response['result'] = $this->status($response, 'pay');

        $this->log('paymobilerecipient', $response);

        return $response;
    }

    public function paybankrecipient($data)
    {
        $K2 = new K2($this->options);

        $transfer = $K2->PayService();

        $options = [
            'type' => 'bank_account',
            'bankBranchRef' => $data['bankBranchRef'],
            'accountName' => $data['accountName'],
            'accountNumber' => $data['accountNumber'],
            'settlementMethod' => $data['settlementMethod'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->addPayRecipient($options);

        $response['result'] = $this->status($response, 'pay');

        $this->log('paybankrecipient', $response);

        return $response;
    }

    public function paytillrecipient($data)
    {
        $K2 = new K2($this->options);

        $transfer = $K2->PayService();

        $options = [
            'type' => 'till',
            'tillName' => $data['tillName'],
            'tillNumber' => $data['tillNumber'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->addPayRecipient($options);

        $response['result'] = $this->status($response, 'pay');

        $this->log('paytillrecipient', $response);

        return $response;
    }
    public function paypaybillrecipient($data)
    {
        $K2 = new K2($this->options);

        $transfer = $K2->PayService();

        $options = [
            'type' => 'paybill',
            'paybillName' => $data['paybillName'],
            'paybillNumber' => $data['paybillNumber'],
            'paybillAccountNumber' => $data['paybillAccountNumber'],
            'accessToken' => $this->access_token,
        ];

        $response = $transfer->addPayRecipient($options);

        $response['result'] = $this->status($response, 'pay');

        $this->log('paypaybillrecipient', $response);

        return $response;
    }
    public function pay($data)
    {
        $K2 = new K2($this->options);

        $pay = $K2->PayService();

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

        $response['result'] = $this->status($response, 'pay');

        $this->log('pay', $response);

        return $response;
    }

    public function webhook($data)
    {
        $K2 = new K2($this->options);

        $webhooks = $K2->Webhooks();

        //check if the array is empty
        if (empty($data)) {
            $json_str = file_get_contents('php://input');
            $data = json_decode($json_str, true);
        }

        $response = $webhooks->webhookHandler($data, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        $this->log('webhook', $response);

        return $response;

    }

    public function stk_webhook()
    {
        $K2 = new K2($this->options);

        $webhooks = $K2->Webhooks();

        //check if the array is empty
        if (empty($data)) {
            $json_str = file_get_contents('php://input');
            $data = json_decode($json_str, true);
        }

        $response = $webhooks->webhookHandler($data, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        $this->log('stk_webhook', $response);

        return $response;

    }

    public function polling_webhook()
    {
        $K2 = new K2($this->options);

        $webhooks = $K2->Webhooks();

        //check if the array is empty
        if (empty($data)) {
            $json_str = file_get_contents('php://input');
            $data = json_decode($json_str, true);
        }

        $response = $webhooks->webhookHandler($data, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        $this->log('polling_webhook', $response);

        return $response;

    }

    public function smsnotification_webhook()
    {
        $K2 = new K2($this->options);

        $webhooks = $K2->Webhooks();

        //check if the array is empty
        if (empty($data)) {
            $json_str = file_get_contents('php://input');
            $data = json_decode($json_str, true);
        }

        $response = $webhooks->webhookHandler($data, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        $this->log('smsnotification_webhook', $response);

        return $response;
    }

    public function transfer_webhook()
    {
        $K2 = new K2($this->options);

        $webhooks = $K2->Webhooks();

        //check if the array is empty
        if (empty($data)) {
            $json_str = file_get_contents('php://input');
            $data = json_decode($json_str, true);
        }

        $response = $webhooks->webhookHandler($data, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        $this->log('transfer_webhook', $response);

        return $response;

    }

    public function pay_webhook()
    {
        $K2 = new K2($this->options);

        $webhooks = $K2->Webhooks();

        //check if the array is empty
        if (empty($data)) {
            $json_str = file_get_contents('php://input');
            $data = json_decode($json_str, true);
        }

        $response = $webhooks->webhookHandler($data, $_SERVER['HTTP_X_KOPOKOPO_SIGNATURE']);

        $this->log('pay_webhook', $response);

        return $response;

    }

    public function status($data, $type = 'webhooks')
    {

        //check if data is string or array with status and location
        if (is_array($data)) {
            $location = $data['location'];
        } else {
            $location = $data;
        }

        //check if status is success
        if (is_array($data) && $data['status'] != 'success') {
            return ['status' => 'error', 'data' => [], 'message' => 'Invalid status'];
        }

        $K2 = new K2($this->options);

        $webhooks = $K2->Webhooks();

        switch ($type) {
            case 'stk':
                $webhooks = $K2->StkService();
                break;
            case 'polling':
                $webhooks = $K2->PollingService();
                break;
            case 'smsnotification':
                $webhooks = $K2->SmsNotificationService();
                break;
            case 'transfer':
                $webhooks = $K2->SettlementTransferService();
                break;
            case 'pay':
                $webhooks = $K2->PayService();
                break;
            default:
                break;
        }

        $options = array(
            'location' => $location,
            'accessToken' => $this->access_token,
        );

        $result = $webhooks->getStatus($options);

        return $result;
    }

    //function for logging the response from kopokopo

    public function log($function, $response)
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();

        $output->writeln('----------------------------------');
        $output->writeln('kopokopo response for ' . $function);
        $output->writeln(json_encode($response));
        $output->writeln('');

    }

}
