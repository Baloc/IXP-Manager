<?php

/*
|--------------------------------------------------------------------------
| Web Routes - These Required an Auth'd User
|--------------------------------------------------------------------------
*/


Route::group( [ 'namespace' => 'PatchPanel', 'prefix' => 'patch-panel-port', 'middleware' => 'patch-panel-port'], function() {
    Route::get( 'download-loa/{id}',                'PatchPanelPortController@downloadLoA' );
    Route::get( 'view-loa/{id}',                    'PatchPanelPortController@viewLoA' );

    Route::get( 'download-file/{pppfid}',           'PatchPanelPortController@downloadFile' );

    Route::get( 'view/{id}',                        'PatchPanelPortController@view' );
});

Route::group( [ 'prefix' => 'rs-prefixes' ], function() {
    Route::get(     'list',         'RsPrefixesController@list' )->name( 'rs-prefixes@list'  );
    Route::get(     'view/{cid}',   'RsPrefixesController@view' )->name( 'rs-prefixes@view'  );
});