<?php

/*
 * This file is part of the mingyoung/wechat-playground.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Illuminate\Support\Facades\Route;
use WeChatPlayground\Http\Controllers;
use WeChatPlayground\Http\Middleware\EnsureAccountIsConfigured;

Route::get('wechat-playground-api/request', Controllers\RequestController::class.'@index');
Route::post('wechat-playground-api/request', Controllers\RequestController::class.'@store')->middleware(EnsureAccountIsConfigured::class);
Route::get(config('wechat-playground.path').'/{view?}', Controllers\ViewController::class)->where('view', '.*');
