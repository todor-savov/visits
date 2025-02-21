<?php

/**
 * This file fetches data from the Positive Guys API (source).
 */
require_once 'SourceInterface.php';

/**
 * Class PositiveGuys
 * Implements the SourceInterface to fetch visits from Positive Guys.
 */
class PositiveGuys implements SourceInterface
{
    /**
     * Returns the name of the visits source.
     *
     * @return string the name of the visits source
     */
    public function getName(): string
    {
        return 'Positive Guys';
    }

    /**
     * Returns the number of visits.
     *
     * @return int the number of visits (currently hardcoded)
     */
    public function getVisits(): int
    {
        return 1200; // Hardcoded for now but can be replaced with actual data from Positive Guys API
    }
}
