#!/usr/bin/env bash
echo "[INFO] Running a composer update";
docker-compose exec typo3 /bin/bash -c "composer update";
docker-compose exec typo3 /bin/bash -c "chown -R www-data:www-data public/typo3temp/"
