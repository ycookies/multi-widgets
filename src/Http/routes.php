<?php

use Dcat\Admin\MultiWidgets\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('multi-widgets', Controllers\MultiWidgetsController::class.'@index');