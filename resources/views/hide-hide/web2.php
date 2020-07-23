








//CRUD-Suket-Pindah
Route::get('suket-pindah', 'PindahController@index')->name('pindah.index');
Route::get('suket-pindah/create', 'PindahController@create')->name('pindah.create');
Route::post('suket-pindah/store', 'PindahController@store')->name('pindah.store');
Route::get('suket-pindah/edit/{id}', 'PindahController@edit');
Route::get('suket-pindah/delete/{id}', 'PindahController@destroy');
Route::post('suket-pindah/update/{id}', 'PindahController@update');

//CRUD-Suket-Domisili
Route::get('suket-domisili', 'DomisiliController@index')->name('domisili.index');
Route::get('suket-domisili/create', 'DomisiliController@create')->name('domisili.create');
Route::post('suket-domisili/store', 'DomisiliController@store')->name('domisili.store');
Route::get('suket-domisili/edit/{id}', 'DomisiliController@edit');
Route::get('suket-domisili/delete/{id}', 'DomisiliController@destroy');
Route::post('suket-domisili/update/{id}', 'DomisiliController@update');

//CRUD-Suket-Domisili-Lembaga
Route::get('suket-domisili-lembaga', 'DomisiliLembagaController@index')->name('lembaga.index');
Route::get('suket-domisili-lembaga/create', 'DomisiliLembagaController@create')->name('lembaga.create');
Route::post('suket-domisili-lembaga/store', 'DomisiliLembagaController@store')->name('lembaga.store');
Route::get('suket-domisili-lembaga/edit/{id}', 'DomisiliLembagaController@edit');
Route::get('suket-domisili-lembaga/delete/{id}', 'DomisiliLembagaController@destroy');
Route::post('suket-domisili-lembaga/update/{id}', 'DomisiliLembagaController@update');

//CRUD-Suket-Janda/Duda
Route::get('suket-janda-duda', 'JandaDudaController@index')->name('janda_duda.index');
Route::get('suket-janda-duda/create', 'JandaDudaController@create')->name('janda_duda.create');
Route::post('suket-janda-duda/store', 'JandaDudaController@store')->name('janda_duda.store');
Route::get('suket-janda-duda/edit/{id}', 'JandaDudaController@edit');
Route::get('suket-janda-duda/delete/{id}', 'JandaDudaController@destroy');
Route::post('suket-janda-duda/update/{id}', 'JandaDudaController@update');

//CRUD-Suket-Belum-Menikah
Route::get('suket-belum-menikah', 'BelumMenikahController@index')->name('blm_menikah.index');
Route::get('suket-belum-menikah/create', 'BelumMenikahController@create')->name('blm_menikah.create');
Route::post('suket-belum-menikah/store', 'BelumMenikahController@store')->name('blm_menikah.store');
Route::get('suket-belum-menikah/edit/{id}', 'BelumMenikahController@edit');
Route::get('suket-belum-menikah/delete/{id}', 'BelumMenikahController@destroy');
Route::post('suket-belum-menikah/update/{id}', 'BelumMenikahController@update');


//CRUD-Suket-Babinsa
Route::get('suket-babinsa', 'BabinsaController@index')->name('babinsa.index');
Route::get('suket-babinsa/create', 'BabinsaController@create')->name('babinsa.create');
Route::post('suket-babinsa/store', 'BabinsaController@store')->name('babinsa.store');
Route::get('suket-babinsa/edit/{id}', 'BabinsaController@edit');
Route::get('suket-babinsa/delete/{id}', 'BabinsaController@destroy');
Route::post('suket-babinsa/update/{id}', 'BabinsaController@update');

//CRUD-Suket-Taksiran-Tanah
Route::get('suket-taksiran-tanah', 'TaksiranTanahController@index')->name('tanah.index');
Route::get('suket-taksiran-tanah/create', 'TaksiranTanahController@create')->name('tanah.create');
Route::post('suket-taksiran-tanah/store', 'TaksiranTanahController@store')->name('tanah.store');
Route::get('suket-taksiran-tanah/edit/{id}', 'TaksiranTanahController@edit');
Route::get('suket-taksiran-tanah/delete/{id}', 'TaksiranTanahController@destroy');
Route::post('suket-taksiran-tanah/update/{id}', 'TaksiranTanahController@update');

