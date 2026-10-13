# MAGLab Website
This is the MAGLab website source code and a work in progress.

Also, the readme is a work in progress.

## Development Setup

Prerequisites
* Docker with Docker Compose

Copy the example config. It reads the database settings from the environment variables set in `compose.yml`:

```bash
cp home/protected/maglab/config/config.php.example home/protected/maglab/config/config.php
```

Then start everything:

```bash
docker compose up --build
```

This starts the following services:

| Service    | What it does |
|------------|--------------|
| `db`       | MariaDB 10.11, seeded from `db/migrate/1476766391_maglabs.sql` on first start and exposed on port 3306 |
| `website`  | Apache + PHP serving `home/public`, exposed on port 8000 |
| `init`     | Runs `composer install` in `src` and `home/protected/maglab`, compiles the site with `src/compile.php`, then exits |

Visit the home page at http://localhost:8000

> [!IMPORTANT]
> The `init` service runs as UID/GID 1000 by default so `vendor` directories and compiled files stay owned by you rather than root. If your IDs differ, put them in a `.env` file, which Compose reads automatically. Don't export `UID` in the shell, since bash and zsh treat it as read-only.

```bash
printf 'UID=%s\nGID=%s\n' "$(id -u)" "$(id -g)" > .env
```

The database lives in the `db-data` volume, so the seed script only runs on a fresh volume. To reset it, run `docker compose down -v`.

Patches to the view compiler's dependencies live in `src/patches` and are applied automatically by `composer install`.

### Rebuilding the site

To rebuild the site after changing views or styles, run

```bash
docker compose run --rm init php -f /website/src/compile.php
```

To also reinstall dependencies (for example after a `composer.lock` change), run the full `init` service:

```bash
docker compose run --rm init
```

## TODO
* Write Deployment Instructions

## Sensor Migration Notes
1. Add a new sensor in the haldor table where the name is what the sensor name should be
2. Change the old sensor name to the new sensor name using the "UPDATE" query
3. Remove the old sensor name from the sensor name enumeration

## Year Change Notes
The year is mentioned in four places on MAGLab.
* _map_footer
* board layout
* hal layout
* main layout 

## Deployment with Rsync instead of the script

`rsync -rpt home/* USER_maglabs@ssh.nyc1.nearlyfreespeech.net:/home`
