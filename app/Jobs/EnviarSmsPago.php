<?php

namespace App\Jobs;

use App\Services\InfobipSmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class EnviarSmsPago implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 600;

    protected array $mensajes;
    protected int $sleepSegundos;

    public function __construct(array $mensajes, int $sleepSegundos = 3)
    {
        $this->mensajes = $mensajes;
        $this->sleepSegundos = $sleepSegundos;
    }

    public function handle(InfobipSmsService $smsService): void
    {
        $total = count($this->mensajes);
        Log::info("SMS: enviando lote de {$total} mensajes");

        foreach ($this->mensajes as $index => $dato) {
            $telefono = $dato['telefono'];
            $mensaje = $dato['mensaje'];

            $resultado = $smsService->send($telefono, $mensaje);

            if ($resultado['success']) {
                Log::info("SMS enviado a {$telefono} ({$index}/{$total}) - Status: " . ($resultado['status'] ?? 'N/A'));
            } else {
                Log::warning("Fallo SMS a {$telefono} ({$index}/{$total}): " . ($resultado['error'] ?? 'Error desconocido'));
            }

            if ($index < $total - 1) {
                sleep($this->sleepSegundos);
            }
        }

        Log::info("SMS: lote de {$total} mensajes completado");
    }
}
