<?php

use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Pagination\Paginator;
use Sorskod\Larasponse\Larasponse;

class ApiController extends \BaseController {

    protected $fractal;

    const PAGINATOR_ITEM_LIMIT = 20;

    /**
     * @var int
     */
    protected $statusCode = IlluminateResponse::HTTP_OK;

    /**
     * @param Larasponse $fractal
     */
    function __construct(Larasponse $fractal)
    {
        $this->fractal = $fractal;

        $this->afterFilter('access-control');
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = 'Internal Error!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, array $headers = [])
    {
         return Response::json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithPagination(Paginator $items, $transformer)
    {
        return $this->respond($this->fractal->paginatedCollection($items, $transformer));
    }

    public function respondWithItem($item, $transformer)
    {
        return $this->respond($this->fractal->item($item, $transformer));
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond([
            'message' => $message
        ]);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondValidationFailed($message = 'Validation Failed!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)
            ->respondWithError($message);
    }

    public function respondAuthenticationFailed()
    {
        $errorMessage = Lang::get(Lang::get('validation.attributes.login_failed'));

        return $this->respondUserUnauthorized($errorMessage);
    }

    public function respondUserUnauthorized($errorMessage = '')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNAUTHORIZED)
                ->respondWithError($errorMessage);
    }


}