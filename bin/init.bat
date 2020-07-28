@echo off
echo "[INFO] Initialise a new TYPO3 project";
docker-compose up -d --build
echo "[INFO] Waiting for database start...";
timeout 15 >nul
echo "[INFO] Database is up";
echo "[INFO] Installing TYPO3";
docker-compose exec typo3 /bin/bash -c "touch public/FIRST_INSTALL"
docker-compose exec typo3 /bin/bash -c "composer install"
docker-compose exec typo3 /bin/bash -c "chown -R www-data:www-data ."
echo "[INFO] Import database schema";
docker-compose exec typo3 /bin/bash -c "vendor/bin/typo3cms database:updateschema"
echo "[INFO] Fix folder structure";
docker-compose exec typo3 /bin/bash -c "vendor/bin/typo3cms install:fixfolderstructure"
echo "[INFO] Create admin user";
docker-compose exec typo3 /bin/bash -c "vendor/bin/typo3cms backend:createadmin --username=admin --password=12345678"
echo "[INFO] Project is ready";
