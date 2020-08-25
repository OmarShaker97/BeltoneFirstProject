<?php

use App\Post;

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

Route::get('/show/{id}','PostsController@show');

//Route::resource('posts', 'PostsController');

// First Task

Route::get('post/{id}','PostsController@show_post');

Route::get('/contact', 'PostsController@contact');

Route::get('getUsers', 'UserController@getUsers');

Route::post('create','UserController@insert')->name('create');
Route::get('delete/{id}','UserController@destroy')->name('delete');

Route::get('/', function () {
    return view('welcome');
});


// Section 9

Route::get('/insert',function(){

    DB::insert('insert into posts(title,body) values(?,?)', ['PHP with Laravel', "PHP with Laravel is the best thing that has happened to PHP."]);
    echo "Insertion Done.";
});

Route::get('/read', function(){

    $results = DB::select('select * from posts where id = ?', [1]);
    foreach($results as $result){
        echo $result->title;
        echo $result->body;
    }
});

Route::get('/update',function(){

    $updated = DB::update('update posts set title = "Updated Title" where id = ?', [1]);

    return $updated;

});

Route::get('/delete', function(){

    $deleted = DB::delete('delete from posts where id = ?', [1]);

    return $deleted;

});


// Testing

/*Route::get('/about', function(){
 return "Hi about page";
});

Route::get('/contact', function(){
    return "Hi I am contact";
   });
   
Route::get('/post/{id}/{name}', function($id,$name){
    return "This is post number ".$id . " " . $name;
});

Route::get('admin/posts/example', array('as'=>'admin.home',function(){
    $url = route('admin.home');

    return "this url is ".$url;
})); */

/* =============================================
                      ELOQUENT
    ============================================ */

    Route::get('/find', function(){


        $posts = Post::all();
    });