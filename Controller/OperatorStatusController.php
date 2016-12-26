<?php

namespace OperatoStatus\Mibew\Plugin\OperatorStatus\Controller;

use Mibew\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OperatorStatusController extends AbstractController
{
    /**
     * Displays operator status.
     *
     * @param Request $request Incoming request.
     * @return Response Rendered page content.
     */
    public function indexAction(Request $request)
    {

         // DEVELOPMENT use only, needs to be deleted after moved on production
        header('Access-Control-Allow-Origin: *');
        // ************************** //
        $response = new Response(json_encode(array('OperatorStatus' => has_online_operators())));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
