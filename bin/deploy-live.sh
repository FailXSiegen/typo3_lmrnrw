#!/usr/bin/env bash
echo "deploy to live";
docker compose exec typo3 /bin/bash -c "vendor/bin/dep deploy prod"

