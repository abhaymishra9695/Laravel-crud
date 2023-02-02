<?PhP

use Illuminate\SuPPort\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your aPPlication. These
| routes are loaded by the RouteServiceProvider within a grouP which
| contains the "web" middleware grouP. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('user', [UserController::class, 'index']);
// Route::get('user/show/{name}', [UserController::class, 'show']);
// Route::resource('Post', PostController::class);

// Route::get("connect", function(){
//     try {
//         DB::connection()->getPdo();
//         return "connection seccessfully";
//     }
//     catch(\ExcePtion $ex)
//     {
//         dd($ex->getMessage());
//     }
// });

// Route::get('test', function (){
    // Post::create([
      
    //     "title"=>"seccend insertion",
    //     "discription"=>"this is seccend insertion"

    // ]);
    // return Post::all();
    // return Post::find(2);
    // $data =Post::find(3);

    // if(! $data)
    // {
    //     return "data not found";
    // }
    // return $data;

    // $data=Post::find(2);
    // if(! $data)
    // {
    //     return "record not found.";
    // }

    // $data->update([
    //     "title"=>"laravel 9",
    //     "discription"=>"laravel 9 is latest version"
    // ]);
    // return "uPdate seccessfully";
    // $data=Post::find(2);
    // if(! $data)
    // {
    //     return "record not fount";
    // }else{
    //     $data->delete();
    //     return "delete data seccessfully";

    // }
// });

// Route::get('post',[PostController::class,'index']);
// Route::get('post/store',[PostController::class,'store']);
// Route::get('post/update',[PostController::class,'update']);
// Route::get('post/delete',[PostController::class,'destroy']);

Route::resource('posts',PostController::class);