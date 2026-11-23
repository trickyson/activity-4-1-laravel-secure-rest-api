# Activity 4.1 — Create and Secure a REST API

**Course:** Web Systems, Frameworks, and Technologies  
**Project:** Laravel Users REST API  
**Repository:** https://github.com/trickyson/activity-4-1-laravel-secure-rest-api

## Implemented API
- `GET /api/users` — list users (200)
- `POST /api/users` — create user (201), reject invalid/duplicate data (422)
- Validation: name, email, password, password confirmation, unique email
- Password hashing using the Eloquent `hashed` cast
- Responses exclude passwords
- IP-based named API rate limiter (60 requests/minute)
- **Note:** endpoints are publicly accessible for demonstration; no authentication/authorization is implemented.

## Automated verification
The GitHub Actions workflow at `.github/workflows/laravel-api-tests.yml` creates a **Laravel 12** application, overlays the API source files, and runs four feature tests against in-memory SQLite. The workflow's green status confirms those automated tests, **not** manual Postman/MySQL/Swagger UI execution. The original module discusses Laravel 11; this CI workflow uses Laravel 12 because the previous Laravel 11 dependency resolution was blocked by security advisories.

## API documentation
Open `docs/openapi.yaml` in [Swagger Editor](https://editor.swagger.io/) to view the API specification. This is a static specification; it does not mean the Laravel server is running.

## Postman
Import `postman/Activity-4-1.postman_collection.json` into Postman. Set `baseUrl` to the URL of a **running** Laravel server (default `http://127.0.0.1:8000`). Run requests in order:
1. GET list users → expect 200
2. POST create user → expect 201
3. POST invalid input → expect 422
4. POST duplicate email → expect 422

If re-running the collection against a persistent database, change the `testEmail` collection variable to a fresh address before creating the user.

## Local execution caveat
This repository contains the API implementation and an automated workflow that overlays it onto a freshly generated Laravel skeleton. **It is not a standalone Laravel skeleton.** For local execution, create a compatible Laravel application using Composer, copy the source files from this repository into the corresponding paths, configure `.env` and the database, run migrations, and start `php artisan serve`. Do not copy the GitHub Actions-only workflow into the Laravel application as a runtime dependency.

## Evidence needed for submission
- Screenshot of Swagger Editor displaying the documented GET/POST operations
- Actual Postman GET and POST responses from a running server
- One-page report using the official classroom Word template
- Final PDF with repository link and screenshots
