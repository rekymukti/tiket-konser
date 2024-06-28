use App\Http\Controllers\TicketBookingController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\CheckInController;

Route::get('/book-ticket', [TicketBookingController::class, 'showForm']);
Route::post('/book-ticket', [TicketBookingController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/tickets', [AdminTicketController::class, 'index']);
    Route::get('/admin/tickets/{id}/edit', [AdminTicketController::class, 'edit']);
    Route::post('/admin/tickets/{id}', [AdminTicketController::class, 'update']);
    Route::delete('/admin/tickets/{id}', [AdminTicketController::class, 'destroy']);

    Route::get('/check-in', [CheckInController::class, 'showForm']);
    Route::post('/check-in', [CheckInController::class, 'checkIn']);
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
