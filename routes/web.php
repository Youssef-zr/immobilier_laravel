<?php

/*
admin routes
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth:web', 'is_admin']], function () {

    // dashboard page index
    Route::get('/', 'homeController@index');
     // stattistics of building added in the year for a month
     Route::get('ak/statistics','homeController@buStatistics');
     Route::post('ak/statistics',['as'=>'ak.statistics','uses'=>'homeController@buStatistics']);

    // users data datatables
    Route::get('users/data', ['as' => "users.data", 'uses' => 'UserController@usersData']);
    // building datatables
    Route::get('bu/data', ['as' => "bu.data", 'uses' => 'AkkarController@buData']);
    // messages datatables
    Route::get('contact/data', ['as' => "contact.data", 'uses' => 'ContactController@contactData']);


    //users resource
    Route::resource('/users', 'UserController',['except'=>['destroy']]); #
    Route::post('users/editPassword', 'UserController@changePassword')->name('users/editPassword');
    Route::get('users/{id}/delete', ['as' => 'users.delete', 'uses' => 'UserController@delete']);

    // settings
    Route::get("settings", ['as' => 'settings.index', 'uses' => 'SettingController@index']);
    Route::post("settings/edit", ['as' => 'settings.edit', 'uses' => 'SettingController@edit']);

    // bu / building
    Route::resource('bu', 'akkarController',['except'=>['destroy']]);
    Route::get('bu/{id}/delete', ['as' => 'bu.delete', 'uses' => 'akkarController@destroy']);


    // user active and disable building (approve and watiing)
    route::get('bu/edit/{id}/{status}',['as'=>'user.bu.changeStatus','uses'=>'akkarController@changeStatus']);

    // contact // messages
    Route::resource('contact', 'ContactController', ['except' => ['store','create',"destroy"]]);
    Route::get('contact/{id}/delete', 'ContactController@delete', ['except' => ['store','create']]);

});

  Route::get('test','test@index');

/*
    user routes
    main_mode maintenance mode
*/

Route::group(['middleware' => ['web', 'main_mode']], function () {

    Route::get('/', 'akkarcontroller@home')->name('home');

    Auth::routes();

    // // login route
    Route::post('login', ['as' => 'login_post', 'uses' => 'UserController@login']);

    // register route
    Route::post('register_user', 'UserController@register');

    Route::get('/logout', 'Usercontroller@logout')->middleware('auth:web');

    // building routes bu
    Route::get('bu/show_all', ['as' => 'show_all_bu', 'uses' => 'akkarController@showAll']);
    Route::get('bu/forRent', ['as' => 'show_rent_bu', 'uses' => 'akkarController@showAll']);
    Route::get('bu/forBuy', ['as' => 'show_buy_bu', 'uses' => 'akkarController@showAll']);
    Route::get('bu/villa', ['as' => 'show_villa_bu', 'uses' => 'akkarController@showAll']);
    Route::get('bu/chalee', ['as' => 'show_chalee_bu', 'uses' => 'akkarController@showAll']);
    Route::get('bu/house', ['as' => 'show_home_bu', 'uses' => 'akkarController@showAll']);

    // single building page
    Route::get('singleBu/{id}', 'akkarController@singleBu');

    // search
    Route::get('search', ['as' => 'search', 'uses' => 'akkarController@search']);

    // contact
    Route::get('contact', function () {
        $title = 'اتصل بنا';
        return view('design.contact.contact', ['title' => $title]);
    });
    Route::post('contact', 'ContactController@store');

    // user / guest add new building
    Route::get('bu/add','akkarController@userCreateBu');
    Route::post('bu/add',['as'=>'userBu.create','uses'=>'akkarController@userStoreBu']);

    // search buildings with axios

    Route::get('/getBuildingAjax/{query}', 'akkarController@get_data_axios');


});

Route::group(['middleware' => 'auth'], function () {
    //
    Route::get('main_mode', function () {
        return view('errors/main_mode');
    });

    // all building approved for the auth user
    Route::get('user/bu_active','akkarController@allUserBuActive');

    // all building not approved for the auth user
    Route::get('user/bu_wattings','akkarController@allUserBuWAttings');

    // update his building by the user
    Route::get('user/bu/edit/{id}','akkarController@userEditBu');
    Route::patch('user/bu/update/{id}',['as'=>'user.updateBuilding','uses'=>'akkarController@userUpdateBu']);


    // edit user profile
    Route::get('user/profile','userController@profile');
    Route::patch('user/profile',['as'=>'user.profile','uses'=>'userController@updateProfile']);

    // user chnage password
    Route::patch('user/changePassword',['as'=>'user.changePassword','uses'=>'userController@userChangePassword']);
});
