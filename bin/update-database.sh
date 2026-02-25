#!/usr/bin/env bash
echo "[INFO] Update the database schema";
ddev exec vendor/bin/typo3 database:updateschema;
