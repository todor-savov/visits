<?php

//This file fetches data from Google Analytics API (source)
require_once 'SourceInterface.php';

class GoogleAnalytics implements SourceInterface
{
    public function getName(): string
    {
        return 'Google Analytics';
    }

    public function getData(): int
    {
        return 150; // Hardcoded for now but can be replaced with actual data from Google Analytics API
    }
}
