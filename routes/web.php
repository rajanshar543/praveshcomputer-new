<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CityServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Crawl files are served through Laravel so they resolve at the domain root
// whatever the web-server document root is.
Route::get('/robots.txt', function () {
    return response()->file(public_path('robots.txt'), ['Content-Type' => 'text/plain; charset=UTF-8']);
});

Route::get('/llms.txt', function () {
    return response()->file(public_path('llms.txt'), ['Content-Type' => 'text/plain; charset=UTF-8']);
});

Route::get('/sitemap.xml', function () {
    $pages = [
        '/' => 'Frontend/pages/index.blade.php',
        '/about-us' => 'Frontend/pages/about.blade.php',
        '/contact-us' => 'Frontend/pages/contact.blade.php',
        '/laptop-computer-repair-services' => 'Frontend/pages/services.blade.php',
    ];
    foreach (['agra', 'mathura', 'firozabad', 'bharatpur', 'etmadpur', 'fatehabad', 'hathras'] as $city) {
        $pages['/laptop-repairing-in-'.$city] = 'Frontend/pages/city-service.blade.php';
    }

    $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n".'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
    foreach ($pages as $path => $view) {
        $file = resource_path('views/'.$view);
        $lastmod = date('Y-m-d', file_exists($file) ? filemtime($file) : time());
        $xml .= '  <url><loc>https://praveshcomputers.com'.($path === '/' ? '/' : $path).'</loc><lastmod>'.$lastmod.'</lastmod></url>'."\n";
    }
    $xml .= '</urlset>'."\n";

    return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
});

// Cache reset for hosts without SSH. Disabled unless MAINTENANCE_KEY is set in .env;
// call as /optimize-clear?key=<MAINTENANCE_KEY>.
Route::get('/optimize-clear', function (\Illuminate\Http\Request $request) {
    $key = (string) env('MAINTENANCE_KEY', '');
    abort_unless($key !== '' && hash_equals($key, (string) $request->query('key')), 404);

    \Illuminate\Support\Facades\Artisan::call('optimize:clear');

    return 'Cache cleared.';
});

Route::get('/favicon.ico', function () {
    return response()->file(public_path('favicon.ico'), ['Content-Type' => 'image/x-icon']);
});

Route::get('/', function () {
    return view('Frontend.pages.index');
})->name('home');

Route::get('about-us', function () {
    return view('Frontend.pages.about');
})->name('about');

Route::get('laptop-computer-repair-services', function () {
    return view('Frontend.pages.services');
})->name('service');


Route::get('/dashboard', function () {
    return view('Backend.pages.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/register-repair-complaint', [ComplaintController::class, 'create'])->name('complaint.create');
Route::post('/complaint/store', [ComplaintController::class, 'store'])->name('complaint.store');
Route::get('/complaint/list', [ComplaintController::class, 'show'])->name('complaint.list');




Route::get('/contact-us', [ContactController::class, 'create'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/list', [ContactController::class, 'show'])->name('contact.list');

Route::get('/{cityServiceSlug}', [CityServiceController::class, 'show'])
    ->whereIn('cityServiceSlug', [
        'laptop-repairing-in-agra',
        'laptop-repairing-in-mathura',
        'laptop-repairing-in-firozabad',
        'laptop-repairing-in-bharatpur',
        'laptop-repairing-in-etmadpur',
        'laptop-repairing-in-fatehabad',
        'laptop-repairing-in-hathras',
    ])->name('city.service');

Route::get('/laptop-repair-in-{city}', function (string $city) {
    abort_unless(in_array($city, ['agra', 'mathura', 'firozabad', 'bharatpur', 'etmadpur', 'fatehabad', 'hathras'], true), 404);

    return redirect('/laptop-repairing-in-'.$city, 301);
});

Route::redirect('/about', '/about-us', 301);
Route::redirect('/service', '/laptop-computer-repair-services', 301);
Route::redirect('/services', '/laptop-computer-repair-services', 301);
Route::redirect('/contact', '/contact-us', 301);
Route::redirect('/complaint', '/register-repair-complaint', 301);


Route::post('/complaint/update-status', [ComplaintController::class, 'updateStatus'])
    ->name('complaint.updateStatus');
Route::post('/contact/update-status', [ContactController::class, 'updateStatus'])->name('contact.updateStatus');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
