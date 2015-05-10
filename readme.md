# Dream ROSE Online - Web
> The website for Dream ROSE ONLINE

This was written a year ago while it was a growing private server. The codebase is shit as this was one of my first few jobs.

**During development, I used MySQL.** However, we used MSSQL 2005 (why 2005, you ask?) in production because of the server files being outdated. I was really lucky that PDO supported MSSQL, and that it easy to switch databases by just changing a few lines in the config. It could have been improved with environment-based configurations, but I didn't acknowledge any of those at the time this was being written.

**Laravel's features shined in this project.** I had to deal with the server files' architecture and methodology being outdated; it was hard. Luckily, Laravel was able to provide most of the features I needed to focus on the features.

**I used TWBS3**. This gave me an opportunity to spend most of my time writing PHP code instead of wasting my time with the interfaces as I was given a short deadline (I was also handling another project at the time). I also had to design the site my self, so Bootstrap really saved my ass big time.

**Redis** because caching. I didn't notice any improvement at all, seriously. I just heard it was fast while being easy to setup, so.. hahaha.

## Building

**Requirements**:

- Redis.
- MySQL `>=v5.6` / MSSQL 2005.
- PHP `>=5.3`.
- Composer
- Bower (which depends on **npm** and **nodejs**)

\* There will be no instructions for setting it up with **MSSQL 2005**.

Create at least 3 databases, and dump the sqldump in `app/database/dump`. Make your way through [`/app/config/database.php`](https://github.com/srph/dream-rose/blob/master/app/config/database.php). Configure Redis afterwards.

```bash
composer install
php artisan migrate
php artisan db:seed
bower install
```


## Acknowledgement

Copyright 2014, Dream ROSE Team. All rights reserved.
