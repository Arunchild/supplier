<?php


$namespace = 'Supplier\Http\Controllers';


Route::group([
    'namespace' => $namespace,
    'middleware' => 'web'
], function(){

    Route::resource('supplier', 'SupplierController');

});