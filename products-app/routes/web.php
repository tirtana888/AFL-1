Route::group(['prefix'=>'products', 'as'=>'products.'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');    // now /products/edit/3
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('update'); // now /products/update/3
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');    // now /products/show/3
});
