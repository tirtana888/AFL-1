@echo off
echo ========================================
echo Langkah 1: Buat SSH Key di Server
echo ========================================
echo.
echo Copy command di bawah ini dan jalankan di Terminal Ploi:
echo ----------------------------------------
echo ssh-keygen -t rsa -b 2048 -f /tmp/agent_key -N ""
echo cat /tmp/agent_key.pub
echo ----------------------------------------
echo.
echo Setelah muncul public key, copy dan kirim ke saya
echo.
pause
