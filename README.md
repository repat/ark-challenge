# ARK Challenge

This is an assignment as part of the interview process at [ark.io](https://ark.io) for [PHP / Laravel Developer](https://ark.io/careers).

## Functionality

From the [Laravel Assignment Document](https://github.com/repat/ark-challenge/blob/master/ASSIGNMENT.md) ([Original](https://www.notion.so/Laravel-Assignment-cfeb8f0570044018815806466f1fbc71))

> Regarding functionality, we expect your application to be able to perform the following tasks:

* ✅ List blocks and transactions from the ARK blockchain
* ✅ Show detail pages for blocks and transactions
* ✅ List wallets and corresponding transactions
* ▫️ Showing delegates and who a wallet is voting for
* ✅ Switching between ARK Mainnet and ARK Devnet
* ✅ User login and saving of user-preferences
* ▫️ Letting a user save his own wallets

See also [GitHub issues](https://github.com/repat/ark-challenge/issues/).

## Software Versions

* PHP: 7.4.10
* node: 14.12.0
* nginx: 1.19.2
* MySQL: 8.0.21
* Redis: 6.0.8
* Memcached: 1.6.7
* Laravel: 8.6
* Laravel Livewire: 2.2.6
* Alpine.js: 2.7.0
* PHPStan: 0.12.43 ([Larastan Wrapper](https://github.com/nunomaduro/larastan))
* composer: 1.10.13
* npm: 6.14.8
* Tinkerwell: 2.9.0
* HELO: 1.1.4
* ChromeDriver: 85.0.4183.87
* PHPUnit: 9.3.10
* MacOS 10.14.6 (Mojave - Kernel 18.7.0)

## Install

### Git

```sh
git clone https://github.com/repat/ark-challenge.git
cd ark-challenge
```

* Set up `.env`, e.g. by copying `.env.example` into `.env` and filling in your local details

### Install dependencies

```sh
composer install
npm install
npm run dev
```

### Next steps

```sh
php artisan migrate --seed
php artisan storage:link
php artisan key:generate
```

### Configuration

You can login using the following credentials:

* Username: `ark@rpschultz.de`
* Password: `password`

## Upgrade

```sh
composer update
npm update
```

## Testing

You might have to update the ChromeDriver version like so: `php artisan dusk:chrome-driver`.

* `phpunit`
* `php artisan dusk`

### Static Code Analysis, Formatting & IDE

This is checking for just basic, obvious errors.

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

### IDE Helpers

* `composer generate-ide-helper`

## Deploy

> ⚠️ TODO

## Design Explanations

> ⚠️ TODO

## Contact

* Rene Schultz
* mail@reneschultz.dev
* [Homepage](https://reneschultz.dev)
* [repat123 on twitter](https://twitter.com/repat123)
* [ARK Slack](https://cryptoarkproject.slack.com/archives/D01A95NM0KZ)