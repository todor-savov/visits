<?php

//This file fetches data from Positive Guys API (source)
require_once 'SourceInterface.php';

class PositiveGuys implements SourceInterface
{
    public function getName(): string
    {
        return 'Positive Guys';
    }

    public function getData(): int
    {
        return 1200; // Hardcoded for now but can be replaced with actual data from Positive Guys API
    }
}
