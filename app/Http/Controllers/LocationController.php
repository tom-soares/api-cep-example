<?php

namespace App\Http\Controllers;

use App\Services\CorreiosService;
use App\Helpers\Response;

class LocationController extends Controller
{
    /**
     * Variable Service of Correios
     */
    protected $correiosService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CorreiosService $correiosService)
    {
        $this->correiosService = $correiosService;
    }

    /**
     * Retorna localização pelo cep de forma sincrona
     */
    public function getLocationByCepSync($cep)
    {
        try {
            $location =  $this->correiosService->getLocationByCepSync($cep);
            return Response::json($location);
        } catch (\Exception $error) {
            return Response::badRequest($error->getMessage());
        }
    }

    /**
     * Retorna localização pelo cep de forma assincrona
     *
     * @return
     */
    public function getLocationByCepASync($cep)
    {
        try {
            $this->correiosService->getLocationByCepASync($cep);
        } catch (\Exception $error) {
            return Response::badRequest($error->getMessage());
        }
    }
}
