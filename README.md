## Requirements

- PHP >= 8.3

## Getting Started

1. Install dependencies:

   ```bash
   composer install
   ```

2. Start the development server:

   ```bash
   php artisan serve
   ```

## Usage

### Build Country JSON

To generate the country JSON data, run the following Artisan command:

```bash
php artisan app:build-country-json
```

### Accessing the API

You can access the API routes via:

-   `GET /api/v1/list-countries` — Get countries
-   `GET /api/v1/list-provinces?iso3=XXX` — Get provinces for a country (replace `XXX` with the ISO3 code)
-   `GET /api/v1/list-cities?iso3=XXX&province_name=YYY` — Get provinces for a country (replace `XXX` with the ISO3 code)
-   `GET /api/v1/list-cities?iso3=XXX&province_id=YYY` — Get provinces for a country (replace `XXX` with the ISO3 code)

Refer to `routes/api.php` for more available endpoints.

### Generate Swagger API Documentation

To generate the Swagger API documentation, run:

```bash
php artisan l5-swagger:generate
```

### Accessing the API Documentation (Swagger UI)

After generating, you can access the Swagger UI at:

-   `http://localhost:8000/api/documentation` — View interactive API docs

## Running Tests

To run the unit tests, use PHPUnit:

```bash
./vendor/bin/phpunit --testsuite Unit
```

This will execute all tests in the `tests/Unit` directory and show the results.

## Running Feature Tests

To run feature (HTTP endpoint) tests, use PHPUnit with the Feature testsuite:

```bash
./vendor/bin/phpunit --testsuite Feature
```

This will execute all tests in the `tests/Feature` directory, covering API endpoints and controller behavior.

## Generating Code Coverage Report

To generate a code coverage report (requires Xdebug or PCOV):

```bash
XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-html coverage
```

This will create a `coverage` directory with an HTML report you can open in your browser.
