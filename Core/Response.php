<?php

/**
 * Class Response
 * Provides methods to format the API responses and send them to the user.
 */
class Response
{
    /**
     * Sends a response in the specified format.
     *
     * @param array  $data       the data to be formatted
     * @param int    $statusCode the HTTP status code (defaults to 200 for success)
     * @param string $format     the response format ('json' or 'xml')
     */
    public static function send(array $data, int $statusCode = 200, string $format = 'json'): void
    {
        http_response_code($statusCode);

        if ($format === 'xml') {
            header('Content-Type: application/xml');
            echo self::convertToXml($data);
        } else {
            header('Content-Type: application/json');
            echo json_encode($data, JSON_PRETTY_PRINT);
        }

        exit;
    }

    /**
     * Converts an array to XML format.
     *
     * @param array $data the data to convert
     *
     * @return string the XML string
     */
    private static function convertToXml(array $data): string
    {
        $xml = new SimpleXMLElement('<response/>');
        self::buildXml($data, $xml);

        return $xml->asXML();
    }

    /**
     * Recursively adds array data to XML.
     *
     * @param array            $data the data to convert
     * @param SimpleXMLElement $xml  the XML element
     */
    private static function buildXml(array $data, SimpleXMLElement $xml): void
    {
        foreach ($data as $key => $value) {
            // Replace illegal XML characters in key names
            $key = preg_replace('/[^a-z_]/i', '_', $key);

            if (is_array($value)) {
                $subnode = $xml->addChild($key);
                self::buildXml($value, $subnode);
            } else {
                $xml->addChild($key, htmlspecialchars($value));
            }
        }
    }
}
