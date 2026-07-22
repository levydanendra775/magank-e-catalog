<?php

$models = [
    'app/Models/Wisata.php' => <<<'PHP'
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'slug', 'kategori', 'kecamatan', 'alamat',
        'latitude', 'longitude', 'harga_tiket', 'jam_operasional',
        'deskripsi', 'fasilitas', 'thumbnail', 'status_publish',
    ];

    public function galleries()
    {
        return $this->hasMany(WisataGallery::class);
    }
}
PHP,

    'app/Models/WisataGallery.php' => <<<'PHP'
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisataGallery extends Model
{
    use HasFactory;

    protected $fillable = ['wisata_id', 'foto'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}
PHP,

    'app/Models/Umkm.php' => <<<'PHP'
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'pemilik', 'no_hp', 'alamat', 'kecamatan', 'logo', 'deskripsi',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}
PHP,

    'app/Models/Produk.php' => <<<'PHP'
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'umkm_id', 'nama', 'kategori', 'harga', 'foto', 'deskripsi', 'status',
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
PHP,

    'app/Models/Event.php' => <<<'PHP'
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'poster', 'lokasi', 'tanggal', 'jam', 'deskripsi', 'link_pendaftaran', 'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
PHP,

    'app/Models/Kuliner.php' => <<<'PHP'
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'foto', 'alamat', 'maps', 'menu_unggulan', 'jam_buka', 'no_hp',
    ];
}
PHP,

    'app/Models/Penginapan.php' => <<<'PHP'
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'jenis', 'harga_mulai', 'foto', 'alamat', 'maps', 'fasilitas', 'no_hp',
    ];
}
PHP,

    'app/Models/Berita.php' => <<<'PHP'
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'thumbnail', 'isi', 'penulis_id', 'status',
    ];

    public function penulis()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }
}
PHP,

    'app/Models/Banner.php' => <<<'PHP'
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'gambar', 'link', 'urutan'];
}
PHP,

    'app/Models/Galeri.php' => <<<'PHP'
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'foto', 'video', 'kategori'];
}
PHP,
];

foreach ($models as $path => $content) {
    file_put_contents(__DIR__ . '/' . $path, $content);
    echo "Written: $path\n";
}

echo "All models done!\n";
