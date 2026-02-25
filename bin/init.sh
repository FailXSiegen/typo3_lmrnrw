#!/usr/bin/env bash
echo "[INFO] Initialise a new TYPO3 project";
ddev start;
echo "[INFO] Installing TYPO3";
ddev exec touch public/FIRST_INSTALL;
ddev composer install;
echo "[INFO] Import database schema";
ddev exec vendor/bin/typo3 database:updateschema;
echo "[INFO] Create admin user";
ddev exec vendor/bin/typo3 backend:createadmin --username=admin --password=12345678;
echo "[INFO] Project is ready";
echo "[INFO] Access the site at https://lmr-nrw.ddev.site";
