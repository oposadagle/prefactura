<?php

namespace App\Services;

use Infobip\Configuration;
use Infobip\Api\SendSmsApi;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsDestination;
use Infobip\ApiException;
use Illuminate\Support\Facades\Log;

class InfobipSmsService
{
    private ?SendSmsApi $sendSmsApi = null;
    private string $sender;

    public function __construct()
    {
        $baseUrl = config('services.infobip.base_url');
        $apiKey = config('services.infobip.api_key');
        $this->sender = config('services.infobip.sender', 'InfoSMS');

        if (empty($baseUrl) || empty($apiKey)) {
            Log::warning('Infobip: credenciales no configuradas');
            return;
        }

        $configuration = (new Configuration())
            ->setHost(rtrim($baseUrl, '/'))
            ->setApiKeyPrefix('Authorization', 'App')
            ->setApiKey('Authorization', $apiKey);

        $this->sendSmsApi = new SendSmsApi(new \GuzzleHttp\Client(), $configuration);
    }

    public function send(string $to, string $message): array
    {
        if (! $this->sendSmsApi) {
            return ['success' => false, 'error' => 'Infobip no configurado'];
        }

        $to = $this->formatPhone($to);

        try {
            $destination = (new SmsDestination())->setTo($to);
            $smsMessage = (new SmsTextualMessage())
                ->setFrom($this->sender)
                ->setText($message)
                ->setDestinations([$destination]);

            $request = (new SmsAdvancedTextualRequest())
                ->setMessages([$smsMessage]);

            $response = $this->sendSmsApi->sendSmsMessage($request);

            $messages = $response->getMessages();
            $detail = $messages[0] ?? null;

            return [
                'success' => true,
                'bulk_id' => $response->getBulkId(),
                'message_id' => $detail?->getMessageId(),
                'status' => $detail?->getStatus()?->getName(),
                'status_group' => $detail?->getStatus()?->getGroupName(),
            ];
        } catch (ApiException $e) {
            Log::error("Infobip API error para {$to}: " . $e->getResponseBody());
            return [
                'success' => false,
                'error' => 'Error API: ' . $e->getMessage(),
                'code' => $e->getCode(),
                'response' => $e->getResponseBody(),
            ];
        } catch (\Throwable $e) {
            Log::error("Infobip error para {$to}: " . $e->getMessage());
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    public function sendBulk(array $messages): array
    {
        if (! $this->sendSmsApi) {
            return ['success' => false, 'error' => 'Infobip no configurado'];
        }

        $smsMessages = [];
        foreach ($messages as $msg) {
            $to = $this->formatPhone($msg['telefono']);
            $destination = (new SmsDestination())->setTo($to);
            $smsMessage = (new SmsTextualMessage())
                ->setFrom($this->sender)
                ->setText($msg['mensaje'])
                ->setDestinations([$destination]);
            $smsMessages[] = $smsMessage;
        }

        try {
            $request = (new SmsAdvancedTextualRequest())
                ->setMessages($smsMessages);

            $response = $this->sendSmsApi->sendSmsMessage($request);

            $resultados = [];
            foreach ($response->getMessages() as $detail) {
                $resultados[] = [
                    'to' => $detail->getTo(),
                    'message_id' => $detail->getMessageId(),
                    'status' => $detail->getStatus()?->getName(),
                    'status_group' => $detail->getStatus()?->getGroupName(),
                ];
            }

            return [
                'success' => true,
                'bulk_id' => $response->getBulkId(),
                'messages' => $resultados,
            ];
        } catch (ApiException $e) {
            Log::error('Infobip API error (bulk): ' . $e->getResponseBody());
            return [
                'success' => false,
                'error' => 'Error API: ' . $e->getMessage(),
                'code' => $e->getCode(),
                'response' => $e->getResponseBody(),
            ];
        } catch (\Throwable $e) {
            Log::error('Infobip error (bulk): ' . $e->getMessage());
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    private function formatPhone(string $phone): string
    {
        $phone = trim($phone);
        $phone = str_replace(['+', ' ', '-'], '', $phone);

        if (! str_starts_with($phone, '57') && strlen($phone) === 10) {
            $phone = '57' . $phone;
        }

        return $phone;
    }
}
