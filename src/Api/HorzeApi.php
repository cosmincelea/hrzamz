<?php

namespace OpenAPIServer\Api;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use AmazonPayV2\Client;

include_once "config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class HorzeApi extends AbstractDefaultApi
{

    /**
     * POST sessionNewPost
     * Notes: Creates a new customer session
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param array|null             $args     Path arguments
     *
     * @return ResponseInterface
     * @throws
     */
    public function sessionNewPost(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {

        return  $response->withStatus(200);
    }

    /**
     * GET customerGet
     * Notes: Gets customers data
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param array|null             $args     Path arguments
     *
     * @return ResponseInterface
     * @throws
     */
    public function customerGet(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
       return  $response->withStatus(200);
    }

    /**
     * POST orderAuthorizePost
     * Notes: Creates and authorizes an order
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param array|null             $args     Path arguments
     *
     * @return ResponseInterface
     * @throws
     */
    public function orderAuthorizePost(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $config = new Config();
        $amazonpay_config = $config->getAmazonPayConfig();
        $client = new Client($amazonpay_config);
        $amzCheckoutSessionId = $request->getQueryParams()["amazonCheckoutSessionId"];

        //TODO check if valid json
        $payload = $request->getParsedBody();
        $resultAmz = $client->updateCheckoutSession($amzCheckoutSessionId, $payload);
        $response->getBody()->write($resultAmz['response']);
        $response->withStatus($resultAmz["status"]);
        return $response->withHeader('Content-Type', 'application/json');

    }

    /**
     * POST orderCapturePost
     * Notes: Captures an order
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param array|null             $args     Path arguments
     *
     * @return ResponseInterface
     * @throws
     */
    public function orderCapturePost(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $config = new Config();
        $amazonpay_config = $config->getAmazonPayConfig();
        $client = new Client($amazonpay_config);
        $chargeId = $request->getQueryParams()["chargeId"];

        //TODO check if valid json
        //charge id after redirect to amazon to confirm authorization
        $payload = $request->getParsedBody();
        $headers = array('x-amz-pay-Idempotency-Key' => uniqid());
        $resultAmz = $client->captureCharge($chargeId, $payload, $headers);
        $response->getBody()->write($resultAmz['response']);
        $response->withStatus($resultAmz["status"]);
        return $response
            ->withHeader('Content-Type', 'application/json');
    }

    /**
     * POST orderRefundPost
     * Notes: Refunds an order
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param array|null             $args     Path arguments
     *
     * @return ResponseInterface
     * @throws
     */
    public function orderRefundPost(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $config = new Config();
        $amazonpay_config = $config->getAmazonPayConfig();
        $client = new Client($amazonpay_config);

        //TODO check if valid json
        //charge id after redirect to amazon to confirm authorization
        $payload = $request->getParsedBody();
        $headers = array('x-amz-pay-Idempotency-Key' => uniqid());
        $resultAmz = $client->createRefund($payload, $headers);
        $response->getBody()->write($resultAmz['response']);
        $response->withStatus($resultAmz["status"]);
        return $response
            ->withHeader('Content-Type', 'application/json');

    }

    /**
     * GET orderRefundGet
     * Notes: Gets a order refund info
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param array|null             $args     Path arguments
     *
     * @return ResponseInterface
     * @throws
     */
    public function orderRefundGet(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $config = new Config();
        $amazonpay_config = $config->getAmazonPayConfig();
        $client = new Client($amazonpay_config);
        $refundId = $request->getQueryParams()["refundId"];

        $headers = array('x-amz-pay-Idempotency-Key' => uniqid());
        $resultAmz = $client->getRefund($refundId, $headers);
        $response->getBody()->write($resultAmz['response']);
        $response->withStatus($resultAmz["status"]);
        return $response
            ->withHeader('Content-Type', 'application/json');
    }


    /**
     * GET orderCaptureGet
     * Notes: Gets a order charge info
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param array|null             $args     Path arguments
     *
     * @return ResponseInterface
     * @throws
     */
    public function orderCaptureGet(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $config = new Config();
        $amazonpay_config = $config->getAmazonPayConfig();
        $client = new Client($amazonpay_config);
        $chargeId = $request->getQueryParams()["chargeId"];

        $headers = array('x-amz-pay-Idempotency-Key' => uniqid());
        $resultAmz = $client->getCharge($chargeId, $headers);
        $response->getBody()->write($resultAmz['response']);
        $response->withStatus($resultAmz["status"]);
        return $response
            ->withHeader('Content-Type', 'application/json');
    }

}
