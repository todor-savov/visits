<?php
/**
 * Class VisitsController.
 *
 * This class handles requests for visit statistics.
 * It is instantiated by Router.php when the user requests the /visits API endpoint.
 */
class VisitsController
{
    /**
     * Retrieves total website visit stats from multiple sources.
     *
     * @return string JSON response containing visit stats from different sources
     */
    public function getTotalStats()
    {
        // An array is instantiated with all sources of website visits
        $sources = [
            new GoogleAnalytics(),
            new PositiveGuys(),
            new AwStats(),
        ];

        // An empty array is instantiated to hold the combined visits from all sources
        $data = [];

        // We fetch the visits from each source and produce a combined array to return to the user
        foreach ($sources as $source) {
            $data[$source->getName()] = $source->getVisits();
        }

        // The combined array is returned to the user as JSON
        return Response::json(['error' => false, 'message' => '', 'data' => $data]);
    }
}
