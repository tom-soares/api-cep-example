<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Services\CorreiosService;
use Illuminate\Http\Request;
use SoapBox\Formatter\Formatter;

class XmlController extends Controller
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
            $location =  $this->correiosService->getLocationByCepSync($cep, 'xml');
            $formater = Formatter::make($location, Formatter::JSON);
            return response($formater->toXml(), 200);
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
            $this->correiosService->getLocationByCepASync($cep, 'xml');
        } catch (\Exception $error) {
            return Response::badRequest($error->getMessage());
        }
    }
}
