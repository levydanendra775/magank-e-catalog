@echo off
:: ============================================================
:: sync.bat — Script sinkronisasi data tim Magank E-Catalog
:: 
:: Cara pakai:
::   sync.bat push   → Generate seeder + push ke GitHub
::   sync.bat pull   → Pull dari GitHub + jalankan semua seeder
:: ============================================================

set PHP=C:\laragon\bin\php\php-8.4.21-Win32-vs17-x64\php.exe

if "%1"=="push" goto PUSH
if "%1"=="pull" goto PULL

echo.
echo  Penggunaan:
echo    sync.bat push   ^-^> Setelah kamu update/tambah/hapus data
echo    sync.bat pull   ^-^> Setelah kamu git pull dari teman
echo.
goto END

:: ─────────────────────────────────────────────────────
:PUSH
:: ─────────────────────────────────────────────────────
echo.
echo [1/3] Generate ulang semua seeder dari database lokal...
%PHP% generate_seeders.php
if errorlevel 1 ( echo ERROR: Gagal generate seeder! & goto END )

echo.
echo [2/3] Menambahkan semua file ke git...
git add database/seeders/WisataSeeder.php
git add database/seeders/EventSeeder.php
git add database/seeders/BeritaSeeder.php
git add storage/app/public/wisata/
git add storage/app/public/event/
git add storage/app/public/berita/

echo.
echo [3/3] Commit dan push ke GitHub...
set /p MSG="Pesan commit (contoh: tambah event baru): "
git commit -m "feat: %MSG%"
git push

echo.
echo ============================================
echo  SELESAI! Data berhasil di-push ke GitHub.
echo ============================================
goto END

:: ─────────────────────────────────────────────────────
:PULL
:: ─────────────────────────────────────────────────────
echo.
echo [1/4] Pull data terbaru dari GitHub...
git pull
if errorlevel 1 ( echo ERROR: Gagal git pull! & goto END )

echo.
echo [2/4] Sync data Wisata ke database lokal...
%PHP% artisan db:seed --class=WisataSeeder

echo.
echo [3/4] Sync data Event ke database lokal...
%PHP% artisan db:seed --class=EventSeeder

echo.
echo [4/4] Sync data Berita ke database lokal...
%PHP% artisan db:seed --class=BeritaSeeder

echo.
echo ============================================
echo  SELESAI! Database lokal sudah sinkron.
echo ============================================
goto END

:END
echo.
pause
