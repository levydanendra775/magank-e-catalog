<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WisataGallerySeeder extends Seeder
{
    /**
     * Sync PENUH data ke tabel `wisata_galleries`.
     * - Tambah data baru  ✅
     * - Update data lama  ✅
     * - Hapus data yang dihapus dari seeder  ✅
     *
     * Generate ulang file ini:
     *   php generate_seeders.php
     *
     * Jalankan seeder:
     *   php artisan db:seed --class=WisataGallerySeeder
     */
    public function run(): void
    {
        $data = [
            [
                'wisata_id'            => 1,
                'foto'                 => 'wisata/gallery/Tl72P79LQvEj90dcLa0sU8VvRGtRsCUVgPV0cjir.jpg',
                'created_at'           => '2026-08-12 11:11:30',
                'updated_at'           => '2026-08-12 11:11:30',
            ],
            [
                'wisata_id'            => 1,
                'foto'                 => 'wisata/gallery/vSs0CleSHRuHHTi1eKiaKGG3hwMKjYpstTUuiHix.jpg',
                'created_at'           => '2026-08-12 11:30:09',
                'updated_at'           => '2026-08-12 11:30:09',
            ],
            [
                'wisata_id'            => 1,
                'foto'                 => 'wisata/gallery/OqRwkee9wgt47tWfnW4v80KoEFqVXHR7OqN2QTyW.jpg',
                'created_at'           => '2026-08-12 11:34:00',
                'updated_at'           => '2026-08-12 11:34:00',
            ],
            [
                'wisata_id'            => 1,
                'foto'                 => 'wisata/gallery/FWQl5vQ6PDMPbRlnxB2vwXNwJmhreE4ANfgjj0CY.jpg',
                'created_at'           => '2026-08-12 11:37:34',
                'updated_at'           => '2026-08-12 11:37:34',
            ],
            [
                'wisata_id'            => 15,
                'foto'                 => 'wisata/gallery/NaRlwPBbgb9chZRXUzsBG3X0gBBwaJG3LMgYb9nb.jpg',
                'created_at'           => '2026-08-18 08:18:14',
                'updated_at'           => '2026-08-18 08:18:14',
            ],
            [
                'wisata_id'            => 15,
                'foto'                 => 'wisata/gallery/LrjdbadgWVSXApId8HFWecxeCZRb84E2HN8hUZMk.jpg',
                'created_at'           => '2026-08-18 08:18:23',
                'updated_at'           => '2026-08-18 08:18:23',
            ],
            [
                'wisata_id'            => 4,
                'foto'                 => 'wisata/gallery/gtxjmutnwMzOxTSAYvOa8N5vQsBtGTFuw2Jh0FAJ.jpg',
                'created_at'           => '2026-08-18 10:28:03',
                'updated_at'           => '2026-08-18 10:28:03',
            ],
            [
                'wisata_id'            => 4,
                'foto'                 => 'wisata/gallery/kVJi7OQt4ddftYLEoFaPi2K3fHD1l3n394ZFG5ok.jpg',
                'created_at'           => '2026-08-18 10:28:11',
                'updated_at'           => '2026-08-18 10:28:11',
            ],
            [
                'wisata_id'            => 4,
                'foto'                 => 'wisata/gallery/glVcrRwBX3jXXfBMPU52urTJS12zaXUgFyCPDvhV.jpg',
                'created_at'           => '2026-08-18 10:29:22',
                'updated_at'           => '2026-08-18 10:29:22',
            ],
            [
                'wisata_id'            => 4,
                'foto'                 => 'wisata/gallery/EUyJcNvwyBGZa8RvNlaOlzek025oaLd6tBVLBbFo.jpg',
                'created_at'           => '2026-08-18 10:30:06',
                'updated_at'           => '2026-08-18 10:30:06',
            ],
            [
                'wisata_id'            => 2,
                'foto'                 => 'wisata/gallery/2PHee7PFczHARCQMyFWsaweAqsgbfWonThmpEtxV.png',
                'created_at'           => '2026-08-18 11:08:59',
                'updated_at'           => '2026-08-18 11:08:59',
            ],
            [
                'wisata_id'            => 2,
                'foto'                 => 'wisata/gallery/834bKI10UvuLm0XB3FNQBYL8H8Xwox8lqKfiUyJQ.jpg',
                'created_at'           => '2026-08-18 11:08:59',
                'updated_at'           => '2026-08-18 11:08:59',
            ],
            [
                'wisata_id'            => 2,
                'foto'                 => 'wisata/gallery/9UyrjFJezxHsp12GsntFiRs6TTrqan99K6Ww17jr.jpg',
                'created_at'           => '2026-08-18 11:08:59',
                'updated_at'           => '2026-08-18 11:08:59',
            ],
            [
                'wisata_id'            => 14,
                'foto'                 => 'wisata/gallery/sibyKQqBliKVUPpX7FEFgtboitTK1oUnjoFN1XHK.jpg',
                'created_at'           => '2026-08-18 11:10:57',
                'updated_at'           => '2026-08-18 11:10:57',
            ],
            [
                'wisata_id'            => 14,
                'foto'                 => 'wisata/gallery/gZa4IL2qfLwCkmmIlUEcEayhNht5CHOXc1NCcbXf.webp',
                'created_at'           => '2026-08-18 11:10:57',
                'updated_at'           => '2026-08-18 11:10:57',
            ],
            [
                'wisata_id'            => 14,
                'foto'                 => 'wisata/gallery/i6jUxW2ksotRfq6ATLjeOqwnQ3LPdkCUPMxNUtpw.webp',
                'created_at'           => '2026-08-18 11:10:57',
                'updated_at'           => '2026-08-18 11:10:57',
            ],
            [
                'wisata_id'            => 14,
                'foto'                 => 'wisata/gallery/tChpdtznW85PXncu7qzKOozLzWEnLu9sCEbC5fJ8.webp',
                'created_at'           => '2026-08-18 11:10:57',
                'updated_at'           => '2026-08-18 11:10:57',
            ],
            [
                'wisata_id'            => 12,
                'foto'                 => 'wisata/gallery/zuWJvJXYEiDpJqrpyypXY3l2e1MU7uG8Q4IrJ3uE.webp',
                'created_at'           => '2026-08-18 11:12:56',
                'updated_at'           => '2026-08-18 11:12:56',
            ],
            [
                'wisata_id'            => 12,
                'foto'                 => 'wisata/gallery/x1Jy5zesFa2jurnYwZYYBzdSwprRLciZeSD0WfnG.jpg',
                'created_at'           => '2026-08-18 11:12:56',
                'updated_at'           => '2026-08-18 11:12:56',
            ],
            [
                'wisata_id'            => 12,
                'foto'                 => 'wisata/gallery/vJxVSS5kkMjkW2H6jU7RTSClJUXs5J3bm3PrWEp9.jpg',
                'created_at'           => '2026-08-18 11:12:56',
                'updated_at'           => '2026-08-18 11:12:56',
            ],
            [
                'wisata_id'            => 12,
                'foto'                 => 'wisata/gallery/RBJQLJQQArHxE8gPuw1Y6k2QbV4FPgQLlVWTmVhp.jpg',
                'created_at'           => '2026-08-18 11:12:56',
                'updated_at'           => '2026-08-18 11:12:56',
            ],
            [
                'wisata_id'            => 3,
                'foto'                 => 'wisata/gallery/qh8TeLZJBEWkHGVYkSFdLaoVG994YUDFg17YvQB7.jpg',
                'created_at'           => '2026-08-18 11:15:08',
                'updated_at'           => '2026-08-18 11:15:08',
            ],
            [
                'wisata_id'            => 3,
                'foto'                 => 'wisata/gallery/GSjh4eF0l3vg7wGDJWjapxLcUGNLoxROTQIRGkRH.jpg',
                'created_at'           => '2026-08-18 11:15:08',
                'updated_at'           => '2026-08-18 11:15:08',
            ],
            [
                'wisata_id'            => 3,
                'foto'                 => 'wisata/gallery/xQfU4ipoB2RXPqG9IW8tpsPQlw20b4AJN9HrM7VC.webp',
                'created_at'           => '2026-08-18 11:15:08',
                'updated_at'           => '2026-08-18 11:15:08',
            ],
            [
                'wisata_id'            => 5,
                'foto'                 => 'wisata/gallery/io45w3cYEsAq3l4xXUL4WDJ3UAzzWKbgglp87xCD.webp',
                'created_at'           => '2026-08-18 11:17:13',
                'updated_at'           => '2026-08-18 11:17:13',
            ],
            [
                'wisata_id'            => 5,
                'foto'                 => 'wisata/gallery/Lxzb5FHytj82eXnp0BB4XFlEzSk5cn9AFV4I8ZAP.jpg',
                'created_at'           => '2026-08-18 11:17:13',
                'updated_at'           => '2026-08-18 11:17:13',
            ],
            [
                'wisata_id'            => 5,
                'foto'                 => 'wisata/gallery/aCNeTJg6cW2kGeob0uZ6pw8OVc1dDJVY11GbTT84.png',
                'created_at'           => '2026-08-18 11:17:13',
                'updated_at'           => '2026-08-18 11:17:13',
            ],
            [
                'wisata_id'            => 5,
                'foto'                 => 'wisata/gallery/G7bpzD9akVgUtdil7KoWkP8LDEMAuh6B3Fx4PazQ.jpg',
                'created_at'           => '2026-08-18 11:17:13',
                'updated_at'           => '2026-08-18 11:17:13',
            ],
            [
                'wisata_id'            => 5,
                'foto'                 => 'wisata/gallery/Dy3xaXPRCcAB5UeZW7ipEcNfS443b0Xzi4bEqYKg.jpg',
                'created_at'           => '2026-08-18 11:17:13',
                'updated_at'           => '2026-08-18 11:17:13',
            ],
            [
                'wisata_id'            => 6,
                'foto'                 => 'wisata/gallery/57FPTfQLnaqadj3eIYfgL7OIvEIJvNJuGN5PZCZY.webp',
                'created_at'           => '2026-08-18 11:18:36',
                'updated_at'           => '2026-08-18 11:18:36',
            ],
            [
                'wisata_id'            => 6,
                'foto'                 => 'wisata/gallery/EUYTKp3IiAXvHhdYDbCrgmblvcP7GhukVLYzIvzS.jpg',
                'created_at'           => '2026-08-18 11:18:36',
                'updated_at'           => '2026-08-18 11:18:36',
            ],
            [
                'wisata_id'            => 6,
                'foto'                 => 'wisata/gallery/p1RY67enVDdMTr3nqvbA71WjWDaxqtBNrn7PPRTP.png',
                'created_at'           => '2026-08-18 11:18:36',
                'updated_at'           => '2026-08-18 11:18:36',
            ],
            [
                'wisata_id'            => 6,
                'foto'                 => 'wisata/gallery/yiLgd94cEsmbKC92PW5XuAdWqbYasAjOUgJyKgdS.jpg',
                'created_at'           => '2026-08-18 11:18:36',
                'updated_at'           => '2026-08-18 11:18:36',
            ],
            [
                'wisata_id'            => 7,
                'foto'                 => 'wisata/gallery/AXErNr05lYfPC5WJm6IolUMdLBpWeUNdQMoZOCGQ.jpg',
                'created_at'           => '2026-08-18 11:19:49',
                'updated_at'           => '2026-08-18 11:19:49',
            ],
            [
                'wisata_id'            => 7,
                'foto'                 => 'wisata/gallery/CVbq37NbNqMMIoOiKHQ6prfkpNtB3yyruaZ54gF0.webp',
                'created_at'           => '2026-08-18 11:19:50',
                'updated_at'           => '2026-08-18 11:19:50',
            ],
            [
                'wisata_id'            => 7,
                'foto'                 => 'wisata/gallery/OjSjrcpqufJNM2PNTzDFlLbqNSVFAv63kExobIHB.jpg',
                'created_at'           => '2026-08-18 11:19:50',
                'updated_at'           => '2026-08-18 11:19:50',
            ],
            [
                'wisata_id'            => 7,
                'foto'                 => 'wisata/gallery/pVs9Y8UeeTYC7uwSNqw2YGKtz8QxLNVHEh1Psl1n.jpg',
                'created_at'           => '2026-08-18 11:19:50',
                'updated_at'           => '2026-08-18 11:19:50',
            ],
            [
                'wisata_id'            => 7,
                'foto'                 => 'wisata/gallery/b05Iw8QUk0wgkk0IXTbvgn9BXOhznuCLJGGohGeV.jpg',
                'created_at'           => '2026-08-18 11:19:50',
                'updated_at'           => '2026-08-18 11:19:50',
            ],
            [
                'wisata_id'            => 8,
                'foto'                 => 'wisata/gallery/jsDvvqk4TQSiuZ7yUCWs9IDtn9JauLSWXlIStDEX.jpg',
                'created_at'           => '2026-08-18 11:20:59',
                'updated_at'           => '2026-08-18 11:20:59',
            ],
            [
                'wisata_id'            => 8,
                'foto'                 => 'wisata/gallery/xgSVFtchGMuMwYCe71cPrY9fxjjIPubP6mjPwNnq.jpg',
                'created_at'           => '2026-08-18 11:20:59',
                'updated_at'           => '2026-08-18 11:20:59',
            ],
            [
                'wisata_id'            => 8,
                'foto'                 => 'wisata/gallery/5R9ful4EFnJzOuZQI2NoJWWssY9GXOKwVjdSlPRK.jpg',
                'created_at'           => '2026-08-18 11:20:59',
                'updated_at'           => '2026-08-18 11:20:59',
            ],
            [
                'wisata_id'            => 9,
                'foto'                 => 'wisata/gallery/E89DJFtXWyXejKtFcMkaP4B7NMIVCPVpvZuAheJH.jpg',
                'created_at'           => '2026-08-18 11:22:52',
                'updated_at'           => '2026-08-18 11:22:52',
            ],
            [
                'wisata_id'            => 9,
                'foto'                 => 'wisata/gallery/ypyo6d43LgSGm3svQPAumNMJafaP4nd7LW5S996m.jpg',
                'created_at'           => '2026-08-18 11:22:52',
                'updated_at'           => '2026-08-18 11:22:52',
            ],
            [
                'wisata_id'            => 9,
                'foto'                 => 'wisata/gallery/XxOEcKNkVmKMgw8DuuldSqHhvCH3uN6HOcKhNsYu.jpg',
                'created_at'           => '2026-08-18 11:22:52',
                'updated_at'           => '2026-08-18 11:22:52',
            ],
            [
                'wisata_id'            => 9,
                'foto'                 => 'wisata/gallery/4wA6Irwpa81nqOXnYofEGzzeQTS1eRuFp6y0cOsv.webp',
                'created_at'           => '2026-08-18 11:22:52',
                'updated_at'           => '2026-08-18 11:22:52',
            ],
            [
                'wisata_id'            => 9,
                'foto'                 => 'wisata/gallery/uqWBdyOTwu7h7OJ7nlbg5jEo1V2xTt0BAHbXagM2.jpg',
                'created_at'           => '2026-08-18 11:22:52',
                'updated_at'           => '2026-08-18 11:22:52',
            ],
            [
                'wisata_id'            => 10,
                'foto'                 => 'wisata/gallery/MFsVd9HWoYqDbn3q3yDr7y4aPh4O7gbGcGjKwRXc.jpg',
                'created_at'           => '2026-08-18 11:24:01',
                'updated_at'           => '2026-08-18 11:24:01',
            ],
            [
                'wisata_id'            => 10,
                'foto'                 => 'wisata/gallery/9pqzWWbvfgjACsPnS5nbK6ljG6fVtPSnGV8EGzZ6.jpg',
                'created_at'           => '2026-08-18 11:24:01',
                'updated_at'           => '2026-08-18 11:24:01',
            ],
            [
                'wisata_id'            => 10,
                'foto'                 => 'wisata/gallery/QASLl3pndv8eKZ8MFHmnSrqsVhgLg70JBsVeJkYa.jpg',
                'created_at'           => '2026-08-18 11:24:01',
                'updated_at'           => '2026-08-18 11:24:01',
            ],
            [
                'wisata_id'            => 11,
                'foto'                 => 'wisata/gallery/nsed5ekkjbhxA1A3joLpjEyAio4hLiK8Er8PW7M4.jpg',
                'created_at'           => '2026-08-18 11:25:39',
                'updated_at'           => '2026-08-18 11:25:39',
            ],
            [
                'wisata_id'            => 11,
                'foto'                 => 'wisata/gallery/3yxWTTCEYUec9N1mPSU315IUyTUbn40ITioyQzlE.jpg',
                'created_at'           => '2026-08-18 11:25:39',
                'updated_at'           => '2026-08-18 11:25:39',
            ],
            [
                'wisata_id'            => 11,
                'foto'                 => 'wisata/gallery/yY7W2SnslB77bDE0hNgcdEWtQNB5cEJFQLo61urN.webp',
                'created_at'           => '2026-08-18 11:25:39',
                'updated_at'           => '2026-08-18 11:25:39',
            ],
            [
                'wisata_id'            => 11,
                'foto'                 => 'wisata/gallery/qWSrPQZhpyS3oWFEYNIIAJd2fhXD19CgUyGIOdeH.jpg',
                'created_at'           => '2026-08-18 11:25:39',
                'updated_at'           => '2026-08-18 11:25:39',
            ],
            [
                'wisata_id'            => 11,
                'foto'                 => 'wisata/gallery/qbHGrUN7vVJWehCpzwSEwAGZlA2V8ThPmbYHmi6j.jpg',
                'created_at'           => '2026-08-18 11:25:39',
                'updated_at'           => '2026-08-18 11:25:39',
            ],
            [
                'wisata_id'            => 13,
                'foto'                 => 'wisata/gallery/qY0T8nivIvVwj5svr7sEC7O6Q9goxzvZh7i19fAm.jpg',
                'created_at'           => '2026-08-18 11:27:35',
                'updated_at'           => '2026-08-18 11:27:35',
            ],
            [
                'wisata_id'            => 13,
                'foto'                 => 'wisata/gallery/TvGurWPikX7LoCvgBzbiKxbaXMdFFOoP5bnNYBeo.jpg',
                'created_at'           => '2026-08-18 11:27:35',
                'updated_at'           => '2026-08-18 11:27:35',
            ],
            [
                'wisata_id'            => 13,
                'foto'                 => 'wisata/gallery/vC0zzCK5IS5GE4ErJ0LE7HNu4RIFOGlvmi8TbwbM.jpg',
                'created_at'           => '2026-08-18 11:27:35',
                'updated_at'           => '2026-08-18 11:27:35',
            ],
            [
                'wisata_id'            => 13,
                'foto'                 => 'wisata/gallery/fpOHfcMhOwpPVGe7yQjlj1jzWd8HXykfdOkgaJlx.jpg',
                'created_at'           => '2026-08-18 11:27:35',
                'updated_at'           => '2026-08-18 11:27:35',
            ],
            [
                'wisata_id'            => 13,
                'foto'                 => 'wisata/gallery/7PPeewNvlbbHi1GcJVnA8R8nXarc1iPdCSogyzr5.jpg',
                'created_at'           => '2026-08-18 11:27:35',
                'updated_at'           => '2026-08-18 11:27:35',
            ],
            [
                'wisata_id'            => 16,
                'foto'                 => 'wisata/gallery/rrGrXgkGGURYYSoi73gEoXuJSeR5nftFSAyj6eGE.jpg',
                'created_at'           => '2026-08-18 11:29:03',
                'updated_at'           => '2026-08-18 11:29:03',
            ],
            [
                'wisata_id'            => 16,
                'foto'                 => 'wisata/gallery/K8eupNAXfU3MAJf3eFh4itGE3NgEJbix88S2PA5s.jpg',
                'created_at'           => '2026-08-18 11:29:03',
                'updated_at'           => '2026-08-18 11:29:03',
            ],
            [
                'wisata_id'            => 16,
                'foto'                 => 'wisata/gallery/0CsMAUOvxCts7fmhHzzQmEIyHBkzc0q4unUjpZqh.jpg',
                'created_at'           => '2026-08-18 11:29:03',
                'updated_at'           => '2026-08-18 11:29:03',
            ],
            [
                'wisata_id'            => 17,
                'foto'                 => 'wisata/gallery/ZkFKNUK8R8snmP0pwrML5CRqEpt2VURVoAfla0is.jpg',
                'created_at'           => '2026-08-18 11:31:42',
                'updated_at'           => '2026-08-18 11:31:42',
            ],
            [
                'wisata_id'            => 17,
                'foto'                 => 'wisata/gallery/65x4jicCTKLXXUso9aliRPz5sa0XklRlfvcyAPQo.jpg',
                'created_at'           => '2026-08-18 11:31:42',
                'updated_at'           => '2026-08-18 11:31:42',
            ],
            [
                'wisata_id'            => 17,
                'foto'                 => 'wisata/gallery/y7iLE0iGPbWrFVkLrIvmcqoqUrkl8BO6JA6N9wrU.jpg',
                'created_at'           => '2026-08-18 11:31:42',
                'updated_at'           => '2026-08-18 11:31:42',
            ],
            [
                'wisata_id'            => 18,
                'foto'                 => 'wisata/gallery/BtSgGkYjPg4He4nnQscbAbqxbt2BQSrPJjiTv1rv.jpg',
                'created_at'           => '2026-08-18 11:33:26',
                'updated_at'           => '2026-08-18 11:33:26',
            ],
            [
                'wisata_id'            => 18,
                'foto'                 => 'wisata/gallery/ccC9mycCTqMo2iwvhJqbC9neHKsocgqCVMFJO3hM.jpg',
                'created_at'           => '2026-08-18 11:33:26',
                'updated_at'           => '2026-08-18 11:33:26',
            ],
            [
                'wisata_id'            => 18,
                'foto'                 => 'wisata/gallery/RTK3od0RuBxwMRU0TZ8shwSLY8FBwC73lM7JbvI5.jpg',
                'created_at'           => '2026-08-18 11:33:26',
                'updated_at'           => '2026-08-18 11:33:26',
            ],
            [
                'wisata_id'            => 19,
                'foto'                 => 'wisata/gallery/QmgnzDlq9hMTOTRy5m6gsjkJmDUcsODJgIsijvKf.webp',
                'created_at'           => '2026-08-18 11:35:09',
                'updated_at'           => '2026-08-18 11:35:09',
            ],
            [
                'wisata_id'            => 19,
                'foto'                 => 'wisata/gallery/AzWOzmA69Rv3KpvjBKiTqgqSfrvAQn9iIt9jPNGJ.jpg',
                'created_at'           => '2026-08-18 11:35:09',
                'updated_at'           => '2026-08-18 11:35:09',
            ],
            [
                'wisata_id'            => 19,
                'foto'                 => 'wisata/gallery/kZESq50NZXgNYXzo9kUeIvO5hxb1dXGHMHF1UHWU.jpg',
                'created_at'           => '2026-08-18 11:35:09',
                'updated_at'           => '2026-08-18 11:35:09',
            ],
            [
                'wisata_id'            => 20,
                'foto'                 => 'wisata/gallery/mQINDPAwEE5k0f6EHYYuBG4vR5PO0bNDLFJOQGym.webp',
                'created_at'           => '2026-08-20 08:53:32',
                'updated_at'           => '2026-08-20 08:53:32',
            ],
            [
                'wisata_id'            => 20,
                'foto'                 => 'wisata/gallery/mK6oVrLYXH8KJgbcIO9hTESoqOIIg73WF3o7U84d.webp',
                'created_at'           => '2026-08-20 08:53:32',
                'updated_at'           => '2026-08-20 08:53:32',
            ],
            [
                'wisata_id'            => 20,
                'foto'                 => 'wisata/gallery/JzF78vw1e5UtmTsJKanFDBZf44U75QamnhHy7D3I.webp',
                'created_at'           => '2026-08-20 08:53:32',
                'updated_at'           => '2026-08-20 08:53:32',
            ],
            [
                'wisata_id'            => 20,
                'foto'                 => 'wisata/gallery/EJesc7roeVWJ5VpcBRk2r50vPss5D7QOJwjf7ydF.webp',
                'created_at'           => '2026-08-20 08:53:32',
                'updated_at'           => '2026-08-20 08:53:32',
            ],
            [
                'wisata_id'            => 20,
                'foto'                 => 'wisata/gallery/JkATuIP3k6cyDgSGk8iz1L7ozdZ4ceFvnS0cJBQG.webp',
                'created_at'           => '2026-08-20 08:53:32',
                'updated_at'           => '2026-08-20 08:53:32',
            ],
            [
                'wisata_id'            => 21,
                'foto'                 => 'wisata/gallery/cc2dv86JjI1dsU3AnOu0BuDUm1QiAbyg5ySg2LLw.webp',
                'created_at'           => '2026-08-20 08:57:15',
                'updated_at'           => '2026-08-20 08:57:15',
            ],
            [
                'wisata_id'            => 21,
                'foto'                 => 'wisata/gallery/irKBYGfEOjgltnri5GDq1VaRRk1jprm7uZdic45y.webp',
                'created_at'           => '2026-08-20 08:57:15',
                'updated_at'           => '2026-08-20 08:57:15',
            ],
            [
                'wisata_id'            => 21,
                'foto'                 => 'wisata/gallery/0eoUgqmbrhRkohiyGCd1onrxOnWB0Lrnoo3ZENCx.webp',
                'created_at'           => '2026-08-20 08:57:16',
                'updated_at'           => '2026-08-20 08:57:16',
            ],
            [
                'wisata_id'            => 21,
                'foto'                 => 'wisata/gallery/1YPZo4gEFOMi7Nbc7q79hdXNGs6SBPNPKXkPosj8.webp',
                'created_at'           => '2026-08-20 08:57:16',
                'updated_at'           => '2026-08-20 08:57:16',
            ],
            [
                'wisata_id'            => 21,
                'foto'                 => 'wisata/gallery/2Mwa2WMw5bPFlePKsQAW8VFeT7sOCoENXzfbNJlh.webp',
                'created_at'           => '2026-08-20 08:57:16',
                'updated_at'           => '2026-08-20 08:57:16',
            ],
        ];

        // ── Hapus data yang sudah tidak ada di seeder ──
        $activeKeys = array (
  0 => 'wisata/gallery/Tl72P79LQvEj90dcLa0sU8VvRGtRsCUVgPV0cjir.jpg',
  1 => 'wisata/gallery/vSs0CleSHRuHHTi1eKiaKGG3hwMKjYpstTUuiHix.jpg',
  2 => 'wisata/gallery/OqRwkee9wgt47tWfnW4v80KoEFqVXHR7OqN2QTyW.jpg',
  3 => 'wisata/gallery/FWQl5vQ6PDMPbRlnxB2vwXNwJmhreE4ANfgjj0CY.jpg',
  4 => 'wisata/gallery/NaRlwPBbgb9chZRXUzsBG3X0gBBwaJG3LMgYb9nb.jpg',
  5 => 'wisata/gallery/LrjdbadgWVSXApId8HFWecxeCZRb84E2HN8hUZMk.jpg',
  6 => 'wisata/gallery/gtxjmutnwMzOxTSAYvOa8N5vQsBtGTFuw2Jh0FAJ.jpg',
  7 => 'wisata/gallery/kVJi7OQt4ddftYLEoFaPi2K3fHD1l3n394ZFG5ok.jpg',
  8 => 'wisata/gallery/glVcrRwBX3jXXfBMPU52urTJS12zaXUgFyCPDvhV.jpg',
  9 => 'wisata/gallery/EUyJcNvwyBGZa8RvNlaOlzek025oaLd6tBVLBbFo.jpg',
  10 => 'wisata/gallery/2PHee7PFczHARCQMyFWsaweAqsgbfWonThmpEtxV.png',
  11 => 'wisata/gallery/834bKI10UvuLm0XB3FNQBYL8H8Xwox8lqKfiUyJQ.jpg',
  12 => 'wisata/gallery/9UyrjFJezxHsp12GsntFiRs6TTrqan99K6Ww17jr.jpg',
  13 => 'wisata/gallery/sibyKQqBliKVUPpX7FEFgtboitTK1oUnjoFN1XHK.jpg',
  14 => 'wisata/gallery/gZa4IL2qfLwCkmmIlUEcEayhNht5CHOXc1NCcbXf.webp',
  15 => 'wisata/gallery/i6jUxW2ksotRfq6ATLjeOqwnQ3LPdkCUPMxNUtpw.webp',
  16 => 'wisata/gallery/tChpdtznW85PXncu7qzKOozLzWEnLu9sCEbC5fJ8.webp',
  17 => 'wisata/gallery/zuWJvJXYEiDpJqrpyypXY3l2e1MU7uG8Q4IrJ3uE.webp',
  18 => 'wisata/gallery/x1Jy5zesFa2jurnYwZYYBzdSwprRLciZeSD0WfnG.jpg',
  19 => 'wisata/gallery/vJxVSS5kkMjkW2H6jU7RTSClJUXs5J3bm3PrWEp9.jpg',
  20 => 'wisata/gallery/RBJQLJQQArHxE8gPuw1Y6k2QbV4FPgQLlVWTmVhp.jpg',
  21 => 'wisata/gallery/qh8TeLZJBEWkHGVYkSFdLaoVG994YUDFg17YvQB7.jpg',
  22 => 'wisata/gallery/GSjh4eF0l3vg7wGDJWjapxLcUGNLoxROTQIRGkRH.jpg',
  23 => 'wisata/gallery/xQfU4ipoB2RXPqG9IW8tpsPQlw20b4AJN9HrM7VC.webp',
  24 => 'wisata/gallery/io45w3cYEsAq3l4xXUL4WDJ3UAzzWKbgglp87xCD.webp',
  25 => 'wisata/gallery/Lxzb5FHytj82eXnp0BB4XFlEzSk5cn9AFV4I8ZAP.jpg',
  26 => 'wisata/gallery/aCNeTJg6cW2kGeob0uZ6pw8OVc1dDJVY11GbTT84.png',
  27 => 'wisata/gallery/G7bpzD9akVgUtdil7KoWkP8LDEMAuh6B3Fx4PazQ.jpg',
  28 => 'wisata/gallery/Dy3xaXPRCcAB5UeZW7ipEcNfS443b0Xzi4bEqYKg.jpg',
  29 => 'wisata/gallery/57FPTfQLnaqadj3eIYfgL7OIvEIJvNJuGN5PZCZY.webp',
  30 => 'wisata/gallery/EUYTKp3IiAXvHhdYDbCrgmblvcP7GhukVLYzIvzS.jpg',
  31 => 'wisata/gallery/p1RY67enVDdMTr3nqvbA71WjWDaxqtBNrn7PPRTP.png',
  32 => 'wisata/gallery/yiLgd94cEsmbKC92PW5XuAdWqbYasAjOUgJyKgdS.jpg',
  33 => 'wisata/gallery/AXErNr05lYfPC5WJm6IolUMdLBpWeUNdQMoZOCGQ.jpg',
  34 => 'wisata/gallery/CVbq37NbNqMMIoOiKHQ6prfkpNtB3yyruaZ54gF0.webp',
  35 => 'wisata/gallery/OjSjrcpqufJNM2PNTzDFlLbqNSVFAv63kExobIHB.jpg',
  36 => 'wisata/gallery/pVs9Y8UeeTYC7uwSNqw2YGKtz8QxLNVHEh1Psl1n.jpg',
  37 => 'wisata/gallery/b05Iw8QUk0wgkk0IXTbvgn9BXOhznuCLJGGohGeV.jpg',
  38 => 'wisata/gallery/jsDvvqk4TQSiuZ7yUCWs9IDtn9JauLSWXlIStDEX.jpg',
  39 => 'wisata/gallery/xgSVFtchGMuMwYCe71cPrY9fxjjIPubP6mjPwNnq.jpg',
  40 => 'wisata/gallery/5R9ful4EFnJzOuZQI2NoJWWssY9GXOKwVjdSlPRK.jpg',
  41 => 'wisata/gallery/E89DJFtXWyXejKtFcMkaP4B7NMIVCPVpvZuAheJH.jpg',
  42 => 'wisata/gallery/ypyo6d43LgSGm3svQPAumNMJafaP4nd7LW5S996m.jpg',
  43 => 'wisata/gallery/XxOEcKNkVmKMgw8DuuldSqHhvCH3uN6HOcKhNsYu.jpg',
  44 => 'wisata/gallery/4wA6Irwpa81nqOXnYofEGzzeQTS1eRuFp6y0cOsv.webp',
  45 => 'wisata/gallery/uqWBdyOTwu7h7OJ7nlbg5jEo1V2xTt0BAHbXagM2.jpg',
  46 => 'wisata/gallery/MFsVd9HWoYqDbn3q3yDr7y4aPh4O7gbGcGjKwRXc.jpg',
  47 => 'wisata/gallery/9pqzWWbvfgjACsPnS5nbK6ljG6fVtPSnGV8EGzZ6.jpg',
  48 => 'wisata/gallery/QASLl3pndv8eKZ8MFHmnSrqsVhgLg70JBsVeJkYa.jpg',
  49 => 'wisata/gallery/nsed5ekkjbhxA1A3joLpjEyAio4hLiK8Er8PW7M4.jpg',
  50 => 'wisata/gallery/3yxWTTCEYUec9N1mPSU315IUyTUbn40ITioyQzlE.jpg',
  51 => 'wisata/gallery/yY7W2SnslB77bDE0hNgcdEWtQNB5cEJFQLo61urN.webp',
  52 => 'wisata/gallery/qWSrPQZhpyS3oWFEYNIIAJd2fhXD19CgUyGIOdeH.jpg',
  53 => 'wisata/gallery/qbHGrUN7vVJWehCpzwSEwAGZlA2V8ThPmbYHmi6j.jpg',
  54 => 'wisata/gallery/qY0T8nivIvVwj5svr7sEC7O6Q9goxzvZh7i19fAm.jpg',
  55 => 'wisata/gallery/TvGurWPikX7LoCvgBzbiKxbaXMdFFOoP5bnNYBeo.jpg',
  56 => 'wisata/gallery/vC0zzCK5IS5GE4ErJ0LE7HNu4RIFOGlvmi8TbwbM.jpg',
  57 => 'wisata/gallery/fpOHfcMhOwpPVGe7yQjlj1jzWd8HXykfdOkgaJlx.jpg',
  58 => 'wisata/gallery/7PPeewNvlbbHi1GcJVnA8R8nXarc1iPdCSogyzr5.jpg',
  59 => 'wisata/gallery/rrGrXgkGGURYYSoi73gEoXuJSeR5nftFSAyj6eGE.jpg',
  60 => 'wisata/gallery/K8eupNAXfU3MAJf3eFh4itGE3NgEJbix88S2PA5s.jpg',
  61 => 'wisata/gallery/0CsMAUOvxCts7fmhHzzQmEIyHBkzc0q4unUjpZqh.jpg',
  62 => 'wisata/gallery/ZkFKNUK8R8snmP0pwrML5CRqEpt2VURVoAfla0is.jpg',
  63 => 'wisata/gallery/65x4jicCTKLXXUso9aliRPz5sa0XklRlfvcyAPQo.jpg',
  64 => 'wisata/gallery/y7iLE0iGPbWrFVkLrIvmcqoqUrkl8BO6JA6N9wrU.jpg',
  65 => 'wisata/gallery/BtSgGkYjPg4He4nnQscbAbqxbt2BQSrPJjiTv1rv.jpg',
  66 => 'wisata/gallery/ccC9mycCTqMo2iwvhJqbC9neHKsocgqCVMFJO3hM.jpg',
  67 => 'wisata/gallery/RTK3od0RuBxwMRU0TZ8shwSLY8FBwC73lM7JbvI5.jpg',
  68 => 'wisata/gallery/QmgnzDlq9hMTOTRy5m6gsjkJmDUcsODJgIsijvKf.webp',
  69 => 'wisata/gallery/AzWOzmA69Rv3KpvjBKiTqgqSfrvAQn9iIt9jPNGJ.jpg',
  70 => 'wisata/gallery/kZESq50NZXgNYXzo9kUeIvO5hxb1dXGHMHF1UHWU.jpg',
  71 => 'wisata/gallery/mQINDPAwEE5k0f6EHYYuBG4vR5PO0bNDLFJOQGym.webp',
  72 => 'wisata/gallery/mK6oVrLYXH8KJgbcIO9hTESoqOIIg73WF3o7U84d.webp',
  73 => 'wisata/gallery/JzF78vw1e5UtmTsJKanFDBZf44U75QamnhHy7D3I.webp',
  74 => 'wisata/gallery/EJesc7roeVWJ5VpcBRk2r50vPss5D7QOJwjf7ydF.webp',
  75 => 'wisata/gallery/JkATuIP3k6cyDgSGk8iz1L7ozdZ4ceFvnS0cJBQG.webp',
  76 => 'wisata/gallery/cc2dv86JjI1dsU3AnOu0BuDUm1QiAbyg5ySg2LLw.webp',
  77 => 'wisata/gallery/irKBYGfEOjgltnri5GDq1VaRRk1jprm7uZdic45y.webp',
  78 => 'wisata/gallery/0eoUgqmbrhRkohiyGCd1onrxOnWB0Lrnoo3ZENCx.webp',
  79 => 'wisata/gallery/1YPZo4gEFOMi7Nbc7q79hdXNGs6SBPNPKXkPosj8.webp',
  80 => 'wisata/gallery/2Mwa2WMw5bPFlePKsQAW8VFeT7sOCoENXzfbNJlh.webp',
);
        $deleted = DB::table('wisata_galleries')
            ->whereNotIn('foto', $activeKeys)
            ->delete();
        if ($deleted > 0) {
            $this->command->warn("  ⚠ Dihapus {$deleted} data lama dari `wisata_galleries`.");
        }

        // ── Tambah / update data dari seeder ──
        foreach ($data as $item) {
            DB::table('wisata_galleries')->updateOrInsert(
                ['foto' => $item['foto']],
                $item
            );
        }

        $this->command->info('✓ WisataGallerySeeder: ' . count($data) . ' data aktif di database.');
    }
}
