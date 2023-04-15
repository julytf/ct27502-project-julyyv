<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use id;
use App\Models\Comic;
use App\Models\Chapter;
use App\Enums\ComicStatus;
use App\Models\Comic_Genre;
use App\Models\Genre;

class ComicsController
{
    public static function detail($comic_id)
    {
        $comic = Comic::find($comic_id);
        $chapters = $comic->chapters;
        $genres = $comic->genres;
        return view(
            "comic",
            [
                "comic" => $comic,
                "chapters" => $chapters,
                "genres" => $genres,
            ],
            "main", // layout
        );
    }
    public static function adminIndex()
    {
        $data = Comic::get();
        return view(
            "admin/comics/index",
            [
                "comics" => $data,
            ],
            "admin", // layout
        );
    }
    
    public static function getOne($comic_id)
    {
        $comic = Comic::find($comic_id);
        $genres = Genre::get();
        $comic_genre_arr = $comic->genres()->get();
        return view(
            "admin/comics/detail",
            [
                "comic" => $comic,
                "genres" => $genres,
                "comic_genre_arr" => $comic_genre_arr,
            ],
            "admin", // layout
        );
    }
    public static function createView()
    {
        $genres = Genre::get();
        return view(
            "admin/comics/create",
            [
                "genres" => $genres
            ],
            "admin", // layout
        );
    }
    public static function create()
    {

        $name = $_POST["name"];
        $description = $_POST["description"] ? $_POST["description"] : null;
        $cover_image = $_FILES["cover_image"];
        $status = $_POST["status"] ?? null;
        $author = $_POST["author"] ? $_POST["author"] : null;

        $genres = $_POST["genre"];

        // foreach ($genres as $genre){
        //     if($genre){
                
        //     }
        // }

        if(!$name){
            flash_message()->create("Name khong duoc bo trong", "error");
            return redirect('/admin/comics');
        }

        if($cover_image['name'] != ''){

            $folder = '../public/img/';
            $cover_image_name = 'cover_image_' . rand(100000000,999999999);
            $ext = pathinfo($cover_image['name'], PATHINFO_EXTENSION);

            $path_file_cover_image = $folder . $cover_image_name . '.' . $ext ;

            while(file_exists($path_file_cover_image)){
                $cover_image_name = 'cover_image_' . rand(100000000,999999999);
                $path_file_cover_image = $folder . $cover_image_name . '.' . $ext ;
            }

            $path_store_cover_image = $cover_image_name . '.' . $ext;
            move_uploaded_file($cover_image["tmp_name"], $path_file_cover_image);
        }
        $comic = new Comic;
        $comic->fill([
            'name' => $name,
            'description' => $description,
            'cover_image' => $path_store_cover_image,
            'status' => $status,
            'author' => $author,
        ]);
        $comic->save();

        $comic->genres()->attach($genres);

        return redirect('/admin/comics');
    }
    public static function updateView($comic_id)
    {
        $comic = Comic::find($comic_id);
        $genres = Genre::get();
        $comic_genre_arr = $comic->genres()->get();

        // printf($genres);

        // die();

        return view(
            "admin/comics/update",
            [
                "comic" => $comic,
                "genres" => $genres,
                "comic_genre_arr" => $comic_genre_arr,
            ],
            "admin", // layout
        );
    }
    public static function update()
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $description = $_POST["description"] ? $_POST["description"] : null;
        $cover_image = $_FILES["cover_image"];
        $status = $_POST["status"] ? $_POST["status"] : null;
        $author = $_POST["author"] ? $_POST["author"] : null;
        $genres = $_POST["genre"];

        $comic = Comic::find($id);

        if( $cover_image['name'] == '' ){
            $comic->fill([
                'name' => $name,
                'description' => $description,
                'status' => $status,
                'author' => $author,
            ]);
            
            $comic->save();
            $comic->genres()->detach();
            $comic->genres()->attach($genres);
            return redirect('/admin/comics/'.$comic->id);
        }else{
            unlink("img/" . $comic->cover_image);

            $folder = '../public/img/';
            $cover_image_name = 'cover_image_' . rand(100000000,999999999);
            $ext = pathinfo($cover_image['name'], PATHINFO_EXTENSION);

            $path_file_cover_image = $folder . $cover_image_name . '.' . $ext ;

            while(file_exists($path_file_cover_image)){
                $cover_image_name = 'cover_image_' . rand(100000000,999999999);
                $path_file_cover_image = $folder . $cover_image_name . '.' . $ext ;
            }

            $path_store_cover_image = $cover_image_name . '.' . $ext;
            move_uploaded_file($cover_image["tmp_name"], $path_file_cover_image);

            $comic->fill([
                'name' => $name,
                'description' => $description,
                'cover_image' => $path_store_cover_image,
                'status' => $status,
                'author' => $author,
            ]);

            $comic->save();

            $comic->genres()->detach();
            $comic->genres()->attach($genres);

            return redirect('/admin/comics/'.$comic->id);
        }
    }
    public static function delete($comic_id)
    {
        $comic = Comic::find($comic_id);
        $chapters = $comic->chapters()->get();
        $comic->genres()->detach();
        if($chapters){
            foreach ($chapters as $chapter) {
                $images = $chapter->images()->get();
                if($images){
                    foreach ($images as $image) {
                        $image->delete_image();
                    }
                }
                $chapter->delete();
            }
        }
        $comic->delete_comic();
        return redirect('/admin/comics');
    }
}