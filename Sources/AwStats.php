<?php

//This file fetches data from AwStats API (source)
require_once 'SourceInterface.php';

class AwStats implements SourceInterface
{
    public function getName(): string
    {
        return 'AwStats';
    }

    public function getVisits(): int
    {
        return 850; // Hardcoded for now but can be replaced with actual data from AwStats API
    }
}
