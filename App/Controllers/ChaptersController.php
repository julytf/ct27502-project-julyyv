<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use App\Models\Comic;
use App\Models\Chapter;
use App\Models\Comic_Genre;

class ChaptersController
{
    // public static function index()
    // {
    //     $data = Chapter::get();
    //     return view(
    //         "comics/index",
    //         [
    //             "comics" => $data,
    //         ],
    //         "main", // layout
    //     );
    // }
    // public static function details($comic_id)
    // {
    //     $data = Comic::where('id',$comic_id)->first();
    //     return view(
    //         "comics/details",
    //         [
    //             "comic" => $data,
    //         ],
    //         "main", // layout
    //     );
    // }
    public static function adminIndex($comic_id)
    {
        $data = Chapter::find($comic_id) ?? [];
        return view(
            "admin/chapters/index",
            [
                "chapters" => $data,
            ],
            "admin", // layout
        );
    }
    public static function getOne()
    {
        echo 'hello';
        echo "TODO:";
    }
    public static function createView()
    {
        return view(
            "admin/comics/create",
            [],
            "admin", // layout
        );
    }
    // public static function create()
    // {
    //     $name = $_POST["name"];
    //     $description = $_POST["description"] ? $_POST["description"] : null;
    //     $cover_image = $_FILES["cover_image"];
    //     $status = $_POST["status"] ?? null;
    //     $author = $_POST["author"] ? $_POST["author"] : null;

    //     if(!$name){
    //         flash_message()->create("Name khong duoc bo trong", "error");
    //         return redirect('/admin/comics');
    //     }

    //     if($cover_image['name'] != ''){

    //         $folder = '../public/img/comics/';
    //         $sub_folder = 'img/comics/';
    //         $cover_image_name = 'cover_image_' . rand(100000000,999999999);
    //         $ext = pathinfo($cover_image['name'], PATHINFO_EXTENSION);

    //         $path_file_cover_image = $folder . $cover_image_name . '.' . $ext ;

    //         while(file_exists($path_file_cover_image)){
    //             $cover_image_name = 'cover_image_' . rand(100000000,999999999);
    //             $path_file_cover_image = $folder . $cover_image_name . '.' . $ext ;
    //         }

    //         $path_store_cover_image = $sub_folder . $cover_image_name . '.' . $ext;
    //         move_uploaded_file($cover_image["tmp_name"], $path_file_cover_image);
    //     }
    //     $comic = new Comic;
    //     $comic->fill([
    //         'name' => $name,
    //         'description' => $description,
    //         'cover_image' => $path_store_cover_image,
    //         'status' => $status,
    //         'author' => $author,
    //     ]);
    //     $comic->save();

    //     return redirect('/admin/comics');
    // }
    // public static function updateView($comic_id)
    // {
    //     $comic = Comic::find($comic_id);

    //     return view(
    //         "admin/comics/update",
    //         [
    //             "comic" => $comic,
    //         ],
    //         "admin", // layout
    //     );
    // }
    // public static function update()
    // {
    //     $id = $_POST["id"];
    //     $name = $_POST["name"];
    //     $description = $_POST["description"] ? $_POST["description"] : null;
    //     $cover_image = $_FILES["cover_image"];
    //     $status = $_POST["status"] ? $_POST["status"] : null;
    //     $author = $_POST["author"] ? $_POST["author"] : null;

    //     $comic = Comic::find($id);

    //     if( $cover_image['name'] == '' ){
    //         $comic->fill([
    //             'name' => $name,
    //             'description' => $description,
    //             'status' => $status,
    //             'author' => $author,
    //         ]);
            
    //         $comic->save();
    //         return redirect('/admin/comics');
    //     }else{
    //         unlink($comic->cover_image);

    //         $folder = '../public/img/comics/';
    //         $sub_folder = 'img/comics/';
    //         $cover_image_name = 'cover_image_' . rand(100000000,999999999);
    //         $ext = pathinfo($cover_image['name'], PATHINFO_EXTENSION);

    //         $path_file_cover_image = $folder . $cover_image_name . '.' . $ext ;

    //         while(file_exists($path_file_cover_image)){
    //             $cover_image_name = 'cover_image_' . rand(100000000,999999999);
    //             $path_file_cover_image = $folder . $cover_image_name . '.' . $ext ;
    //         }

    //         $path_store_cover_image = $sub_folder . $cover_image_name . '.' . $ext;
    //         move_uploaded_file($cover_image["tmp_name"], $path_file_cover_image);

    //         $comic->fill([
    //             'name' => $name,
    //             'description' => $description,
    //             'cover_image' => $path_store_cover_image,
    //             'status' => $status,
    //             'author' => $author,
    //         ]);

    //         $comic->save();
    //         return redirect('/admin/comics');
    //     }
    // }
    // public static function delete($comic_id)
    // {
    //     $comic = Comic::find($comic_id);
    //     $chapters = $comic->chapters()->get();
    //     $comic_genre_arr = $comic->genres()->get();
    //     if($chapters){
    //         foreach ($chapters as $chapter) {
    //             $images = $chapter->images()->get();
    //             if($images){
    //                 foreach ($images as $image) {
    //                     $image->delete_image();
    //                 }
    //             }
    //             $chapter->delete();
    //         }
    //     }
    //     if($comic_genre_arr){
    //         foreach ($comic_genre_arr as $comic_genre) {
    //             // die($comic_genre->pivot);
    //             $comic_genre->pivot->delete();
    //         }
    //     }
    //     $comic->delete_comic();
    //     return redirect('/admin/comics');
    // }
}