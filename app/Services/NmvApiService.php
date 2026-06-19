<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NmvApiService
{
    private string $baseUrl;
    private string $username;
    private string $password;
    private string $cacheKey = 'nmv_api_token';
    private int $cacheMinutes = 60;

    public function __construct()
    {
        $this->baseUrl = config('services.nmv.api_url');
        $this->username = config('services.nmv.username');
        $this->password = config('services.nmv.password');
    }

    public function login(): ?string
    {
        try {
            $response = Http::post($this->baseUrl . '/login', [
                'username' => $this->username,
                'password' => $this->password,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $token = $data['token'] ?? null;

                if ($token) {
                    Cache::put($this->cacheKey, $token, now()->addMinutes($this->cacheMinutes));
                    return $token;
                }
            }

            Log::error('NMV API Login failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return null;
        } catch (\Exception $e) {
            Log::error('NMV API Login exception', ['error' => $e->getMessage()]);
            return null;
        }
    }

    public function getToken(): ?string
    {
        $token = Cache::get($this->cacheKey);

        if (!$token) {
            $token = $this->login();
        }

        return $token;
    }

    public function crearSolicitud(array $payload): array
    {
        $token = $this->getToken();

        if (!$token) {
            return [
                'success' => false,
                'message' => 'No se pudo obtener el token de autenticación.',
            ];
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post($this->baseUrl . '/nacional/solicitudes', $payload);

            if ($response->successful()) {
                $data = $response->json();
                return [
                    'success' => true,
                    'data' => $data['data'] ?? null,
                    'message' => $data['message'] ?? 'Solicitud creada correctamente.',
                ];
            }

            if ($response->status() === 401) {
                Cache::forget($this->cacheKey);
                $token = $this->login();

                if ($token) {
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $token,
                        'Accept' => 'application/json',
                    ])->post($this->baseUrl . '/nacional/solicitudes', $payload);

                    if ($response->successful()) {
                        $data = $response->json();
                        return [
                            'success' => true,
                            'data' => $data['data'] ?? null,
                            'message' => $data['message'] ?? 'Solicitud creada correctamente.',
                        ];
                    }
                }
            }

            Log::error('NMV API crearSolicitud failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return [
                'success' => false,
                'message' => 'Error en la API: ' . ($response->json()['message'] ?? $response->body()),
            ];
        } catch (\Exception $e) {
            Log::error('NMV API crearSolicitud exception', ['error' => $e->getMessage()]);
            return [
                'success' => false,
                'message' => 'Excepción al conectar con la API: ' . $e->getMessage(),
            ];
        }
    }
}
