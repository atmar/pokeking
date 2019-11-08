# PokeKing

## Installation

Install the composer packages

```bash
composer install
```
---
Copy the .env.example file and create a .env file.

```bash
cp .env.example .env
```

Create an application key:

```bash
php artisan key:generate
```

Change the environment variables inside `.env` for the database & Redis connection.
Change the `CACHE_DRIVER` to `redis`.

---

Migrate the tables:

```bash
php artisan migrate
```
---

Synchronize the pokemon data using the following commands in this order:

```bash
php artisan pokemon:retrieve
php artisan pokemon:retrieve-profiles
```
---

Install the frontend NPM libraries:

```bash
npm install
```

Compile the frontend assets
```bash
npm run production
```

## Testing
You can test the Laravel application using
```bash
phpunit
```

---

You can test the frontend Vue application using
```bash
npm run test
```
After testing the frontend, you must compile the assets again with Laravel mix using
```bash
npm run production
```