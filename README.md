# ARK Challenge

This is an assignment as part of the interview process at [ark.io](https://ark.io) for [PHP / Laravel Developer](https://ark.io/careers).

## Functionality

From the [Assignment](https://www.notion.so/Laravel-Assignment-cfeb8f0570044018815806466f1fbc71)

> Regarding functionality, we expect your application to be able to perform the following tasks:

* ▫️ List blocks and transactions from the ARK blockchain
* ▫️ Show detail pages for blocks and transactions
* ▫️ List wallets and corresponding transactions
* ▫️ Showing delegates and who a wallet is voting for
* ▫️ Switching between ARK Mainnet and ARK Devnet
* ✅ User login and saving of user-preferences
* ▫️ Letting a user save his own wallets

## Software Versions

* PHP: 7.4.10
* node: 14.11.0
* nginx: 1.19.2
* MySQL: 8.0.21
* Redis: 6.0.8
* Memcached: 1.6.7
* Laravel: 8.3
* Laravel Livewire: 2.2
* Alpine.js: 2.7.0
* Larastan (PHPStan): 0.6.4
* composer: 1.10.3
* npm: 6.14.8
* Tinkerwell: 2.9.0
* HELO: 1.1.4
* ChromeDriver: 85.0.4183.87
* PHPUnit: 9.3.10
* MacOS 10.14.6 (Mojave - Kernel 18.7.0)

## Install

### Install dependencies

```sh
composer install
npm install
npm run dev
```

* Set up `.env`

### Next steps

```sh
php artisan migrate --seed
php artisan storage:link
```

### Configuration

* Choose network in `app/Providers/AppServiceProvider.php`, choose from `config/ark.php`

> ⚠️ TODO

## Upgrade

> ⚠️ TODO

## Testing

* `phpunit`
* `php artisan dusk`

### Static Code Analysis & Formatting

* `composer sca`

#### Run manually

```sh
./vendor/bin/parallel-lint config
./vendor/bin/phpstan analyse
php artisan blade:lint
php artisan fixer:fix
```

### Debugging

* `composer dump-autoload`
* `php artisan cache:clear`

## Deploy

> ⚠️ TODO

## Contact

* Rene Schultz
* mail@reneschultz.dev
* [Homepage](https://reneschultz.dev)
* [repat123 on twitter](https://twitter.com/repat123)
* [ARK Slack](https://cryptoarkproject.slack.com/archives/D01A95NM0KZ)