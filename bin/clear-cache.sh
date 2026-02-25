#!/usr/bin/env bash
echo "[INFO] Clearing TYPO3 cache and fix folder structure";
ddev exec vendor/bin/typo3 cache:flush;
ddev exec vendor/bin/typo3 install:fixfolderstructure;
