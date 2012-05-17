My Community
============

A community site designed to store activities in the local area

Scrapers
--------

Todo: Document schema and explain scraperwiki


Testing and building
--------------------

Building and testing is done with a build.xml make file for "ant". You may also consider using the following to help test.

These tools test the stability of the build

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
