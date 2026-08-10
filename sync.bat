@echo off
:: ============================================================
:: sync.bat — Script sinkronisasi data tim Magank E-Catalog
:: 
:: Cara pakai:
::   sync.bat push   → Generate seeder + push ke GitHub
::   sync.bat pull   → Pull dari GitHub + jalankan semua seeder
:: ============================================================

set PHP=php
if exist "C:\laragon\bin\php\php-8.4.21-Win32-vs17-x64\php.exe" (
    set PHP="C:\laragon\bin\php\php-8.4.21-Win32-vs17-x64\php.exe"
)

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
echo [2/3] Menambahkan semua file dan seeder ke git...
git add .

echo.
echo [3/3] Commit dan push ke GitHub...
set /p MSG="Pesan commit (contoh: tambah event baru / update fitur): "
if "%MSG%"=="" set MSG=sinkronisasi data dan update kode
git commit -m "%MSG%"
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
echo [1/7] Pull data terbaru dari GitHub...
git pull
if errorlevel 1 ( echo ERROR: Gagal git pull! & goto END )

echo.
echo [2/7] Sync data Wisata ke database lokal...
%PHP% artisan db:seed --class=WisataSeeder

echo.
echo [3/7] Sync data Event ke database lokal...
%PHP% artisan db:seed --class=EventSeeder

echo.
echo [4/7] Sync data Berita ke database lokal...
%PHP% artisan db:seed --class=BeritaSeeder

echo.
echo [5/7] Membersihkan cache konfigurasi...
%PHP% artisan config:clear

echo.
echo [6/7] Membersihkan cache tampilan (blade)...
%PHP% artisan view:clear

echo.
echo [7/7] Memastikan storage link aktif...
%PHP% artisan storage:link 2>nul
echo     (Storage link sudah aktif atau baru dibuat)

echo.
echo ============================================
echo  SELESAI! Database lokal sudah sinkron.
echo ============================================
goto END

:END
echo.
pause
