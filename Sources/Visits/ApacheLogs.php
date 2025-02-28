<?php

class ApacheLogs implements SourceInterface
{
    public function getName(): string
    {
        return 'Apache Logs';
    }

    public function getVisits(): int
    {
        /* Reading Apache log file locally */
        /* $content = file_get_contents('Sources/Visits/log.txt');
        $lines = explode("\n", $content);
        $allIps = [];

        foreach ($lines as $line) {
            if (empty($line)) {
                continue;
            }

            $parts = explode(' ', $line);
            $ip = $parts[0];
            $allIps[] = $ip;
        }

        $finalArray = array_unique($allIps);

        return count($finalArray); */

        /* Integration with external API on Node.js Express server */
        $response = file_get_contents('http://localhost:3000');
        $data = json_decode($response, true);

        return $data['visits'];
    }
}
