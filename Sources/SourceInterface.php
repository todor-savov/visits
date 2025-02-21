<?php

/**
 * SourceInterface to be implemented by each Source class.
 */
interface SourceInterface
{
    public function getName(): string;

    public function getVisits(): int;
}
