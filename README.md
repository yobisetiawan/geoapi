
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
