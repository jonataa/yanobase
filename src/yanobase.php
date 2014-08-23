#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use \Yanobase\Console\Command\MigrateCommand;
use \Symfony\Component\Console\Application;

$application = new Application('Yanobase', '0.1-alpha');
$application->add(new MigrateCommand);
$application->run();