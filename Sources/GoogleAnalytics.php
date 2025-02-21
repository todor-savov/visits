<?php

/**
 * This file fetches data from the Google Analytics API (source).
 */
require_once 'SourceInterface.php';

/**
 * Class GoogleAnalytics
 * Implements the SourceInterface to fetch visits from Google Analytics.
 */
class GoogleAnalytics implements SourceInterface
{
    /**
     * Returns the name of the visits source.
     *
     * @return string the name of the visits source
     */
    public function getName(): string
    {
        return 'Google Analytics';
    }

    /**
     * Returns the number of visits.
     *
     * @return int the number of visits (currently hardcoded)
     */
    public function getVisits(): int
    {
        return 150; // Hardcoded for now but can be replaced with actual data from Google Analytics API
    }
}
