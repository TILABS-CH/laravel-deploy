# Laravel Deploy by Tilabs

> ⚡️ Deploy and optimize your Laravel apps with **one command**. This also works on chrooted VPS hostings.

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

## Why this package

On Plesk servers with chroot-restricted SSH, php artisan optimize misfires because the chroot skews Laravel’s base path. Executing the same routine through a secured HTTP endpoint preserves the correct context, enabling reliable optimization without direct shell access.

## Requirements

|         | Version |
| ------- | ------- |
| PHP     | ^8.2    |
| Laravel | 12.x    |

## Installation

```bash
composer require tilabs/laravel-deploy
```

Publish & set your secret deployment key

```bash
php artisan vendor:publish --provider="Tilabs\LaravelDeploy\Providers\DeploymentServiceProvider"
```

This will create a `config/deployment.php`configuration file in your project, which you can modify to your needs using environment variables.

To change the default deployment key - **which you absolutely should** - set an environment Variable in your `.env` file.

```
DEPLOYMENT_KEY=...
```

## Usage

### Optimize Laravel

This command will now work on Plesk VPS Hostings. If the optimization process is successful, you receive the info message **Application optimized successfully**. If you are lazy, you can run this command automatically after your repository has been pulled by Plesk.

```shell
php artisan site:optimize
```

### Common Pitfalls

As we are working with caches, it is never a bad idea to just remove the previous cached versions. This can easily be done using the laravel default command to clear the cache.

```shell
php artisan optimize:clear
```

## License

Laravel Deploy is open‑sourced software licensed under the **MIT license**.
