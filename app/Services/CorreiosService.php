<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Helpers\Response;

class CorreiosService
{
    protected $clientHttp;

    public function __construct()
    {
        $this->clientHttp = new Client([
            // URL base para as requisições
            'base_uri' => 'https://correiosapi.apphb.com/',
            // Tempo padrão de espera por resposata da api
            'timeout'  => 2.0,
        ]);
    }

    /**
     * Busca informações da localização nos correios e retorna essas informações de forma sincrona.
     */
    public function getLocationByCepSync(int $cep)
    {
        $response = $this->clientHttp->request('GET', "cep/$cep");
        $response = json_decode($response->getBody());

        return $response;
    }

    /**
     * Busca informações da localização nos correios e retorna essas informações de forma assincrona.
     */
    public function getLocationByCepASync(int $cep)
    {
        $promise = $this->clientHttp->getAsync("cep/$cep");
        $promise->then(function ($response) {
            echo $response->getBody();
        });
    }
}
