<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::group(['method' => 'get'], function () {
    Route::get('/', 'index/index/index');
    Route::get('/menu', 'index/index/menu');
    Route::get('/add', 'index/index/add');
});
Route::group(['method' => 'post'], function () {
    Route::post('/start', 'index/index/start');
    Route::post('/stop', 'index/index/stop');
    Route::post('/change', 'index/index/change');
    Route::post('/add', 'index/index/add');
});
