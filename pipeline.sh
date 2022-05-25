#Run PHP CS - styles: PSR2, PSR1, Squiz, PSR12, PEAR, Zend
vendor/bin/phpcs --standard=PSR2  app/Http/Services/

#Run PHP STAN
vendor/bin/phpstan analyse app/Http/Services/ tests/ --level 6

#Run PHPMD
vendor/bin/phpmd app/Http/Services xml codesize,controversial,design,naming,unusedcode,cleancode --exclude 'vendor/*'

#Run PHP Unit
vendor/bin/phpunit

