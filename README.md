PHP Website Statistics API

This project is a lightweight PHP-based API designed to aggregate website statistics from multiple sources. It follows a simple architecture to allow easy extension with new data sources.

Features

No frameworks or router packages (vanilla PHP implementation)

Supports multiple data sources (Google Analytics, Positive Guys, etc.)

JSON response format

Graceful error handling

Easily extendable architecture for adding new sources

Local Installation & Setup

1. Prerequisites

Ensure you have PHP 8 installed. You can check your version with:

php -v

If not installed, you can install it using Homebrew:

brew install php

2. Clone the Repository

git clone <repository-url>
cd php-api-task

3. Start the Local Server

php -S localhost:8000

Visit http://localhost:8000 in your browser to check if the API is running.

Project Structure

visits/
│── index.php         # Main entry point
|-- statistics.php    # Where data aggregation and response return takes place
│── Sources/
    ├── GoogleAnalytics.php  # Example source
    ├── PositiveGuys.php     # Example source
    |-- AwStats.php          # Example source
│── README.md         # Project documentation

API Usage

1. Fetch Website Statistics

Request:

GET /visits

Response Example:

{
  "error": false,
  "message": "",
  "data": {
    "Google Analytics": 150,
    "Positive Guys": 5000,
    "AwStats": 1200
  }
}

How to Extend with New Sources

Adding a new data source is simple:

Create a new PHP class inside Sources/ (e.g., MyNewSource.php).

Implement a fetchData() method inside that class.

Register the new source in statistics.php.

Example: Adding a New Data Source

namespace Sources;

class MyNewSource {
    public function fetchData() {
        return ["MyNewSource" => 250];
    }
}

Register the New Source in statistics.php

$sources = [
    new Sources\GoogleAnalytics(),
    new Sources\PositiveGuys(),
    new Sources\MyNewSource()  // Add new source here
];

Now, the API will automatically include data from MyNewSource.

Error Handling

The API gracefully handles errors and returns meaningful responses in JSON format:

{
  "error": true,
  "message": "Invalid request"
}

License

This project is for assessment purposes only. All rights reserved.