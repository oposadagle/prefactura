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
    public $backoff = 30;

    protected string $telefono;
    protected string $mensaje;

    public function __construct(string $telefono, string $mensaje)
    {
        $this->telefono = $telefono;
        $this->mensaje = $mensaje;
    }

    public function handle(): void
    {
        $whapiToken = env('WHAPI_TOKEN');
        $whapiUrl = rtrim(env('WHAPI_API_URL', 'https://gate.whapi.cloud/messages/text'), '/');
        if (! str_ends_with($whapiUrl, '/messages/text')) {
            $whapiUrl .= '/messages/text';
        }

        if (! $whapiToken) {
            Log::warning('WHAPI_TOKEN no configurado');
            return;
        }

        $response = Http::withToken($whapiToken)
            ->timeout(30)
            ->post($whapiUrl, [
                'typing_time' => 0,
                'to' => $this->telefono,
                'body' => $this->mensaje,
            ]);

        if ($response->failed()) {
            Log::warning("Fallo WhatsApp a {$this->telefono}: " . $response->body());
        }
    }
}
