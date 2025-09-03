# MAGLab Website
This is the MAGLab website source code and a work in progress.

Also, the readme is a work in progress.

## Development Setup

Prerequisites
* PHP

```bash
cp home/protected/maglab/config/config.php.example home/protected/maglab/config/config.php
cd home/public
php -S localhost:8000
```

Visit the home page at http://localhost:8000/MainApp.php

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
