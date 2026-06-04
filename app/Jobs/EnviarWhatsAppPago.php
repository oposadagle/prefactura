<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EnviarWhatsAppPago implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 600;

    protected array $mensajes;
    protected int $sleepSegundos;

    public function __construct(array $mensajes, int $sleepSegundos = 20)
    {
        $this->mensajes = $mensajes;
        $this->sleepSegundos = $sleepSegundos;
    }

    public function handle(): void
    {
        $whapiToken = env('WHAPI_TOKEN');
        $whapiBaseUrl = rtrim(env('WHAPI_API_URL', 'https://gate.whapi.cloud'), '/');
        $whapiUrl = $whapiBaseUrl . '/messages/text';

        if (! $whapiToken) {
            Log::warning('WHAPI_TOKEN no configurado');
            return;
        }

        $total = count($this->mensajes);
        Log::info("WhatsApp: enviando lote de {$total} mensajes");

        foreach ($this->mensajes as $index => $dato) {
            $telefono = $dato['telefono'];
            $mensaje = $dato['mensaje'];

            $response = Http::withToken($whapiToken)
                ->timeout(30)
                ->post($whapiUrl, [
                    'typing_time' => 0,
                    'to' => $telefono,
                    'body' => $mensaje,
                ]);

            if ($response->failed()) {
                Log::warning("Fallo WhatsApp a {$telefono}: " . $response->body());
            } else {
                Log::info("WhatsApp enviado a {$telefono} ({$index}/{$total})");
            }

            if ($index < $total - 1) {
                sleep($this->sleepSegundos);
            }
        }

        Log::info("WhatsApp: lote de {$total} mensajes completado");
    }
}
