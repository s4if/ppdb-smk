#!/bin/bash

# Drop Dulu
# vendor/doctrine/orm/bin/doctrine orm:schema-tool:drop --force
rm application/db.sqlite
touch application/db.sqlite

# Create
vendor/doctrine/orm/bin/doctrine orm:schema-tool:create

# Recreate data
#rm -fRv data/foto/
#rm -fRv data/receipt/
#rm -fRv data/sertifikat/
rm -Rv data
mkdir data/
mkdir -p data/sertifikat/

mkdir -p data/001-ardiyan_hananto
cp application/tests/assets/foto.png data/001-ardiyan_hananto/foto.png
cp application/tests/assets/foto.png data/001-ardiyan_hananto/kwitansi.png

# Seeding data
php seeder.php

# Pindah Ke Direktori Test
cd application/tests/
rm _ci_phpunit_test/tmp/cache/autoload.php

# Call PHPUNIT
../../vendor/bin/phpunit --verbose --process-isolation

# Back to ppdb
cd ../..
# php vendor/bin/coveralls -v
