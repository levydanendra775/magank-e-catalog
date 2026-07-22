<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$request = Illuminate\Http\Request::create('/admin/wisata', 'POST', [
    'nama' => 'Test Wisata',
    'kategori' => 'Alam',
    'kecamatan' => 'Magetan',
    'harga_tiket' => '10000',
    '_token' => csrf_token(), // CSRF might fail if outside web context
]);

$controller = new App\Http\Controllers\Admin\WisataController();
try {
    $response = $controller->store($request);
    echo "Success! Response status: " . $response->getStatusCode() . "\n";
    if ($response->isRedirect()) {
        echo "Redirects to: " . $response->getTargetUrl() . "\n";
    }
} catch (\Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
}
