<?php

/**
 * Interface SourceInterface
 * Defines the structure for visits source classes in the Sources folder.
 */
interface SourceInterface
{
    /**
     * Returns the name of the visits source.
     *
     * @return string the name of the visits source
     */
    public function getName(): string;

    /**
     * Returns the number of visits.
     *
     * @return int the number of visits
     */
    public function getVisits(): int;
}
