<?php
Route::group(['prefix' => 'backend'], function()
{
    Route::get('crawler', function ()
    {
        return view('Backend::crawler');
    });
});
