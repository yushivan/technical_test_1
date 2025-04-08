<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TaskApiController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = User::where('email', $request->email)->first();

    return response()->json([
        'token' => $user->createToken('api-token')->plainTextToken
    ]);
})->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [TaskApiController::class, 'index'])->name('api.tasks.index');
    Route::post('/tasks', [TaskApiController::class, 'store'])->name('api.tasks.store');
    Route::get('/tasks/{task}', [TaskApiController::class, 'show'])->name('api.tasks.show');
    Route::put('/tasks/{task}', [TaskApiController::class, 'update'])->name('api.tasks.update');
    Route::delete('/tasks/{task}', [TaskApiController::class, 'destroy'])->name('api.tasks.destroy');
});
