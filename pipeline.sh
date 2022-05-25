#Run PHP STAN
vendor/bin/phpstan analyse app/Http/Services/ tests/ --level 6

#Run PHPMD
vendor/bin/phpmd app/Http/Services xml codesize,controversial,design,naming,unusedcode,cleancode --exclude 'vendor/*'

#Run PHP Unit
vendor/bin/phpunit

