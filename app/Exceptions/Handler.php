<?php

declare(strict_types=1);

namespace Sms\Exceptions;

use Exception;
use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Sms\Helpers\ApiResponse;

/**
 * Class Handler
 * @package Sms\Exceptions
 */
class Handler extends ExceptionHandler
{
    /**
     * @var ApiResponse
     */
    protected $apiResponse;

    /**
     * Handler constructor.
     * @param Container $container
     * @param ApiResponse $apiResponse
     */
    public function __construct(Container $container, ApiResponse $apiResponse)
    {
        parent::__construct($container);
        $this->apiResponse = $apiResponse;
    }

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception $exception
     * @return JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return $this->apiResponse
                ->setMessage(__('messages.exceptions.not_found'))
                ->setFailureStatus(404)
                ->getResponse();
        }

        return parent::render($request, $exception);
    }
}
