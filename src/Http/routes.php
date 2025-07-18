<?php

use Illuminate\Support\Facades\Route;
use Dcat\Admin\GridSortable\Http\Controllers;

Route::post(
    'extension/grid-sort',
    Controllers\GridSortableController::class . '@sort'
)->name('dcat-admin-grid-sortable');
