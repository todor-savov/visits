<?php

/**
 * Class Response
 * Provides methods to format the API responses and send them to the user.
 */
class Response
{
    /**
     * Sends a JSON response with the specified data and status code.
     *
     * @param array $data       The data to be encoded as JSON
     * @param int   $statusCode The HTTP status code to be sent with the response (default is 200 for success)
     */
    public static function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
