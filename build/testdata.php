<?php
require "../config.php";
exec("mysql -u {$settings['database']['user']} -p{$settings['database']['passwd']} -h {$settings['database']['server']} -P {$settings['database']['port']} {$settings['database']['db']} < testdata.sql");
