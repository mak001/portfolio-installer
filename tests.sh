#!/bin/bash

# cleanup
rm -rf build && rm -rf public/coverage && rm -rf public/docs
rm -rf silverstripe-cache && mkdir silverstripe-cache && vendor/bin/sake dev/build

# phpunit
phpdbg -qrr vendor/bin/phpunit --log-junit=build/logs/junit.xml --coverage-xml=build/logs/coverage --coverage-html=public/coverage

# phpcs
vendor/bin/phpcs --report=checkstyle --report-file=build/logs/checkstyle.xml --standard=phpcs.xml.dist --extensions=php,inc --ignore=autoload.php --ignore=vendor/ app/src/ app/tests/

# phpmd
vendor/bin/phpmd app/src xml codesize,unusedcode,naming --reportfile build/logs/pmd.xml --exclude vendor/ --exclude autoload.php

# phploc
vendor/bin/phploc --count-tests --exclude vendor/ --log-csv build/logs/phploc.csv --log-xml build/logs/phploc.xml app/src/ app/tests/

# phpdepend
vendor/bin/pdepend --jdepend-xml=build/logs/jdepend.xml --ignore=vendor app/src

# phpdox
vendor/bin/phpdox -f phpdox.xml
