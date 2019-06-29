<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Front-End Routes

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/{slug}',[
    'uses' => 'FrontEndController@single',
    'as' => 'post.single'
]);

Auth::routes();

Route::get('/test',function(){
    return App\User::find(6)->profile;
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    //Users Route

    Route::get('/users',[
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('user/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);

    Route::get('user/not_admin/{id}',[
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not_admin'
    ]);
    
    Route::get('/user/create',[
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/user/store',[
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);

    //Profile Routes
    Route::get('/user/profile',[
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::get('/user/delete/{id}',[
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::get('/user/profile',[
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::get('/home',[
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::get('/post/create',[
        'uses' => 'PostsController@create',
        'as' => 'post.create'
    ]);

    Route::get('/posts',[
        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);

    Route::get('/posts/trashed',[
        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);

    Route::post('/post/store',[
        'uses' => 'PostsController@Store',
        'as' => 'post.store'
    ]);

    Route::get('/post/edit/{id}',[
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);

    Route::post('/post/update/{id}',[
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);

    Route::get('/post/trash/{id}',[
        'uses' => 'PostsController@destroy',
        'as' => 'posts.trash'
    ]);

    Route::get('/post/delete/{id}',[
        'uses' => 'PostsController@kill',
        'as' => 'post.delete'
    ]);

    Route::get('/post/restore/{id}',[
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('/category/create',[
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store',[
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);

    Route::get('/categories',[
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);

    Route::post('/category/update/{id}',[
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);
    Route::get('/category/edit/{id}',[
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    Route::get('/category/delete/{id}',[
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);

    //Tag Routes
    
    Route::get('/tag/create',[
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);

    Route::post('/tag/store',[
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);

    Route::get('/tags',[
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);

    Route::get('/tag/edit/{id}',[
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

    Route::post('/tag/update/{id}',[
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}',[
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);


    //Settings Route
    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);

    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);
});


