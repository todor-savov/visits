<?php

// This is the entry point for the API and routes the HTTP requests
header('Content-Type: application/json');

echo json_encode(['message' => 'API connection successful']);
