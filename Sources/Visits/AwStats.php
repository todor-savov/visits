<?php

/**
 * This file fetches data from the AwStats API (source).
 */
require_once 'SourceInterface.php';

/**
 * Class AwStats
 * Implements the SourceInterface to fetch visits from AwStats.
 */
class AwStats implements SourceInterface
{
    /**
     * Returns the name of the visits source.
     *
     * @return string the name of the visits source
     */
    public function getName(): string
    {
        return 'AwStats';
    }

    /**
     * Returns the number of visits.
     *
     * @return int the number of visits (currently hardcoded)
     */
    public function getVisits(): int
    {
        return 2500; // Hardcoded for now but can be replaced with actual data from AwStats API
    }
}
