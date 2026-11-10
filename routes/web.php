cat > routes/web.php << 'EOF'
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/todo');
});

Route::get('/dashboard', function () {
    return redirect('/todo');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/todo', [TaskController::class, 'index'])->name('todo.index');
    Route::post('/todo', [TaskController::class, 'store'])->name('todo.store');
    Route::patch('/todo/{id}', [TaskController::class, 'toggle'])->name('todo.toggle');
    Route::delete('/todo/{id}', [TaskController::class, 'destroy'])->name('todo.destroy');
});

require __DIR__.'/auth.php';
EOF