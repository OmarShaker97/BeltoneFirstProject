<?php

use App\Country;
use App\Post;
use App\User;
use App\Photo;
use App\Tag;
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

    DB::insert('insert into posts(title,body) values(?,?)', ['PHP is awesome with edwin', "PHP with Laravel is the best thing that has happened to PHP."]);
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

        $post = Post::find(2);

        echo $post->title;


       // foreach()

    });

    Route::get('/findwhere', function()
    {
        $posts = Post::where('id',2)->orderBy('id','desc')->take(1)->get();

        return $posts;

    });

    Route::get('/findmore', function(){

     //   $posts = Post::findOrFail(1);

     //   return $posts;

     $posts = Post::where('users_count', '<', 50)->firstOrFail();

    });

    Route::get('/basicinsert', function(){

        $post = new Post;
        
        $post->title = 'New Eloquent title insert';
        $post->body = "Wow eloquent is really cool! Look at this content!";

        $post->save();

    });

    Route::get('/basicupdate', function(){

        $post = Post::find(2);
        
        $post->title = 'New Eloquent title insert 2';
        $post->body = "Wow eloquent is really cool! Look at this content! 2";

        $post->save();

    });


    Route::get('/create2', function(){

        Post::create(['title'=>'the create method', 'body'=>'WOW I am learning a lot with Edwin']);

    });

    Route::get('/update2', function(){
        Post::where('id', 2)->where('is_admin',0)->update(['title'=>'NEW PHP Title', 'body'=>'I love my instructor']);
    });

    Route::get('/delete2', function(){

        $post = Post::find(2);

        $post->delete();

    });

    Route::get('delete3', function(){

        $post = Post::destroy(3); // If you know the key then use destroy

    });

    Route::get('/softdelete', function(){
        
        Post::find(4)->delete();
    });

    Route::get('/readsoftdelete', function(){
        
        echo Post::withTrashed()->where('id', 4)->get();

    });

    Route::get('/restore', function(){

        Post::withTrashed()->where('is_admin',0)->restore();

    });

    Route::get('/forcedelete', function(){
        Post::onlyTrashed()->where('is_admin',0)->forceDelete();
    });

    /* ======================================================
                        ELOQUENT RELATIONSHIPS
       ====================================================== */


    // One to One Relationship

    Route::get('/user/post/{id}', function($id){

        return User::find($id)->post;

    });

    // Inverse Relation

    Route::get('/post/{id}/user', function($id){

        return Post::find($id)->user->name; 

    });

    // One to Many Relationship

   /* Route::get('/posts', function(){

        $user = User::find(1);

        foreach($user->posts as $post){
            echo $post->title;
        }

    }); */

    // Many to many relationship

    Route::get('/user/{id}/role', function($id){

      $user = User::find($id); 

      foreach($user->roles as $role){
          echo $role->name;
      }

    }); 

    // Accessing the intermediate table / pivot table 

    Route::get('/user/pivot', function(){

        $user = User::find(1);

        foreach($user->roles as $role){
            echo $role->pivot->created_at;
        }

    });

    // 

    Route::get('/user/country',function(){

        $country = Country::find(4);

        foreach($country->posts as $post){
            echo $post->title .'</br>';
        }

    });


    // Polymorphic Relations

    Route::get('/user/photo', function(){

        $user = User::find(2);

        foreach($user->photos as $photo){
            return $photo;
        }

    });


    Route::get('/photo/{id}/post', function($id){

        $photo = Photo::findOrFail($id);

        return $photo->imageable;

    });

    // Polymorphic Many to Many

    Route::get('/post2/tag', function(){

        $post = Post::find(1);

        foreach($post->tags as $tag){
            echo $tag->name;
        }

    });


    
   /* Route::get('/tag/post', function(){ // Not working for some weird reason :/

        $tag = Tag::find(2);

       // echo $tag;

        foreach($tag->posts as $post){
            echo $post;
        }

    }); */


    /*
    |--------------------------------------------------------------------------
    | CRUD Application
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::resource('posts', 'PostsController');

    Route::post('posts/store', 'PostsController@store');

    Route::get('posts/update/{id}', 'PostsController@update');