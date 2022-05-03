#Run PHP STAN
../vendor/bin/phpstan analyse app/Http/Helpers/ app/Http/Services/ tests/ --level 5

#Run PHPMD
../vendor/bin/phpmd ./app/Http/ xml codesize,controversial,design,naming,unusedcode --exclude 'vendor/*'

#Run PHP Unit
../vendor/bin/phpunit
