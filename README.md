WOTD.fyi
========
This readme is woefully inadequate right now. Sorry about that.

## Requirements

* PHP >= 5.5.9 (for now)
* `mysql` PHP extension
* `curl` PHP extension
* `sqlite` PHP Extension (dev)

The composer install step will automatically check for these dependencies.

## Setup

### Install Dependencies

```
composer install
```

### Load Fixtures

```
bin/console doctrine:fixtures:load
```

### Run The Server (Dev)

```
bin/console server:run
```

