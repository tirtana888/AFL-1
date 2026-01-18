@echo off
echo Connecting to Ploi server...
ssh ploi@194.233.95.153 "cd /home/ploi/radiant-iceberg-qfxxxvuzbn.ploi.bot && git pull origin main && php artisan config:clear && php artisan migrate:fresh --seed --force"
echo.
echo Done! Check your website: https://radiant-iceberg-qfxxxvuzbn.ploi.bot/
pause
