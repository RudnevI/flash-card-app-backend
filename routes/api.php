<?php

use App\Http\Controllers\CrudController;
use App\Http\Middleware\ModelMiddleware;
use App\Models\Card;
use App\Models\Collection;
use App\Models\Level;
use App\Models\Option;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Question\Question;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$routes = [
    'collections',
    'cards',
    'levels',
    'statuses',
    'questions',
    'options',
    'profiles'
];

foreach ($routes as $route) {
    Route::controller(CrudController::class)->middleware(ModelMiddleware::class)->group(function () use ($route) {
        Route::get($route, ['uses' => 'get']);
        Route::get($route . '/criteria', 'getByCriteria');
        Route::post($route, 'create');
        Route::put($route . '/criteria', 'updateByCriteria');
        Route::delete($route .'/criteria', 'deleteByCriteria');
        Route::get($route.'/relations', 'getWithRelations');
    });
}
