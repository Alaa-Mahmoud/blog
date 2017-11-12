<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware'=>['web'] ],function(){

    /**************
     * Blog Routes
     * ************/

    Route::get('/',[
        'uses'=>'PostController@getBlogIndex',
        'as' => 'blog.index'
    ]);

    Route::get('/blog/{post_id}',[
        'uses'=>'PostController@getSinglePost',
        'as'  =>'blog.single'
    ]);

    /* Other Routes*/

    Route::get('/about',function(){

        return view('frontend.other.about');
    })->name('about');

    Route::get('/contact',[
       'uses'=>'ContactMessageController@getContactIndex',
        'as'=>'contact'
    ]);

/************************
 *  Admin Authentication Routes
 *************************/

 Route::get('/admin/login',[
     'uses'=>'AdminController@getLogin',
     'as' =>'admin.login'
 ]);

    Route::post('/admin/login',[
        'uses'=>'AdminController@posLogin',
        'as' =>'admin.login'
    ]);

  Route::get('/admin/logout',[
      'uses'=>'AdminController@logOut',
      'as'=>'admin.logout'
  ]);

/************************
*  Admin Dashboard Routes
*************************/
 Route::group([
     'prefix'=>'/admin',
      'middleware'=>'auth'
 ], function (){

     Route::get('/',[
         'uses'=>'AdminController@getIndex',
         'as'=>'admin.index'
     ]);

     Route::get('/blog/categories',[
        'uses'=>'CategoriesController@getCategoryIndex',
         'as'=>'admin.blog.category'
     ]);

     Route::post('/blog/categories',[
         'uses'=>'CategoriesController@createCategory',
         'as'=>'admin.blog.category.create'
     ]);

     Route::get('blog/categories/{category_id}/edit',[
         'uses'=>'CategoriesController@editCategory',
         'as'=>'admin.blog.category.edit'
     ]);

     Route::post('blog/categories/{category_id}/update',[
         'uses'=>'CategoriesController@updateCategory',
         'as'=>'admin.blog.category.update'
     ]);



     Route::get('blog/categories/{category_id}/delete',[
         'uses'=>'CategoriesController@deleteCategory',
         'as'=>'admin.blog.category.delete'
     ]);




     Route::get('/blog/posts/create',[
         'uses'=>'PostController@getCreatePost',
         'as'=>'admin.blog.create_post'
     ]);

     Route::post('/blog/post/create',[
         'uses'=>'PostController@PostCreatePost',
         'as'=>'admin.blog.post.create'
     ]);

     Route::get('/blog/posts',[
          'uses' =>'PostController@getPostIndex',
           'as' => 'admin.blog.index'
     ]);


     Route::get('/blog/post/{post_id}',[
         'uses'=>'PostController@getSinglePostAdmin',
          'as'=>'admin.blog.post'
     ]);

    Route::get('/blog/post/{post_id}/edit',[
        'uses'=>'PostController@getUpdatePost',
        'as'=>'admin.blog.post.edit'
    ]);
 });

    Route::post('/blog/post/update',[
        'uses'=>'PostController@postUpdatePost',
        'as'=>'admin.blog.post.update'
    ]);

    Route::get('/blog/post/{post_id}/delete',[
        'uses'=>'PostController@getDeletePost',
        'as'=>'admin.blog.post.delete'
    ]);

});
