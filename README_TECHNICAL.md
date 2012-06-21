My Community [![Build Status](http://server2.bcslichfield.com:8080/job/My%20Community/badge/icon)](http://server2.bcslichfield.com:8080/job/My%20Community/)
============

A community site designed to store activities in the local area.

Please file a bug before committing a fix so we can review

Scrapers
--------

Todo: Document schema and explain scraperwiki


Testing and building
--------------------

Building is done through ant. To build you will need Apache Ant (apt-get install ant or follow these instructions http://ant.apache.org/manual/install.html)

1) Type "ant" to create a config.php file for the install (you will need to edit this)

2) To add tables to a clean database execute "ant db-schema"

3) To add test data to the database run "ant db-testdata"

###Our build server
* Build server: server2.bcslichfield.com:8080 (Jenkins)
* Bug tracker: Please use GitHub bug tracker
* Git Project: https://github.com/ivebeenlinuxed/my-community
* Auto update build: http://mycommunity.bcslichfield.com (this is automatically updated with every commit by Jenkins. Jenkins checks every 15 minutes...)

###Extra Tools

You may also consider using the following to help test. If you do not have these installed you will not
be able to use the command "ant test" to run automated tests.

These tools test the stability of the build (installed through PHP Pear)

* PHP Mess Detector 

pear channel-discover pear.phpmd.org 
pear channel-discover pear.pdepend.org 
pear install --alldeps phpmd/PHP_PMD
 
* PHP CodeSniffer

pear install PHP_CodeSniffer

* PHP Copy and Paste detector

pear channel-discover components.ez.no
pear install phpunit/phpcpd

* PHPUnit

pear channel-discover pear.phpunit.de
pear channel-discover pear.symfony-project.com
pear install phpunit/PHPUnit

* PHPUnit skelgen

pear install phpunit/PHPUnit_SkeletonGenerator
