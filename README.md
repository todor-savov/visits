# Website Visits API

This project is a lightweight PHP-based API designed to aggregate website statistics from multiple sources. It follows a simple architecture to allow easy extension with new data sources.

## Features

- No frameworks or router packages (vanilla PHP implementation)
- Supports multiple data sources (e.g. Google Analytics, Positive Guys, AwStats, etc.)
- JSON and XML response formats
- Graceful error handling
- Easily extendable architecture for adding new sources

## Local Installation & Setup

### 1. Prerequisites

Ensure you have PHP 8 installed. You can check your version with:

```bash
php -v 
```
If not installed, you can install it using Homebrew:

```bash
brew install php
```

### 2. Clone the Repository

```bash
git clone https://github.com/todor-savov/visits
cd visits
```

### 3. Start the Local Server

```bash
php -S localhost:8000
```

Visit http://localhost:8000 in your browser to confirm that the API is running.

## Project Structure

```bash
visits/
|-- index.php                     # Main entry point which initializes the router and controller methods
|-- Core/
    |-- Controllers/              # Folder containing different controller methods depending on the type of requested data
        |-- VisitsController.php  # Provides controller method for aggregating visit stats
    |-- Router.php                # The routing logic of the application (matching routes with controller methods)
    |-- Response.php              # Handling the response to user requests including format
|-- Sources/
    |-- Visits/
        |-- GoogleAnalytics.php   # Example data source
        |-- PositiveGuys.php      # Example data source
        |-- AwStats.php           # Example data source
        |-- SourceInterface.php   # Interface to be implemented by each data source
│── README.md                     # Project documentation
```

## API Usage

### 1. Fetch Website Statistics

Request:

```bash
GET /visits
```

Response Example:

```bash
{
  "error": false,
  "message": "",
  "data": {
    "Google Analytics": 150,
    "Positive Guys": 5000,
    "AwStats": 1200,
    ...
  }
}
```

## How to Extend with New Sources

Adding a new data source is simple:

### 1. Create a new PHP class inside Sources/Visits (e.g., MyNewSource.php), if the source will be used for visit stats.

### 2. Implement a getVisits() and getName() methods inside that class.

### 3. Register the new source in the controller handling this type of data - e.g. VisitsController.php.

Example: Adding a New Data Source

```bash

class MyNewSource {
    
    public function getName(): string
    {
        return 'New Source';
    }

    public function getVisits(): int
    {
        return 1000; 
    }
}
```

Register the New Source in VisitsController.php

```bash
  $sources = [
            new GoogleAnalytics(),
            new PositiveGuys(),
            new AwStats(),
            new MyNewSource()
        ];
```

Now, the API will automatically include data from MyNewSource.

## Error Handling

The API gracefully handles errors and returns meaningful responses in JSON format:

```bash
{
  "error": true,
  "message": "Invalid request"
}
```

## License

This project is for assessment purposes only. All rights reserved.