<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Comic_Genre;
use App\Models\Image;

class ComicsController
{
    public static function index()
    {
        $data = Comic::get();
        return view(
            "comics/index",
            [
                "comics" => $data,
            ],
            "main", // layout
        );
    }
    public static function adminIndex()
    {
        $data = Comic::get();
        return view(
            "comics/index",
            [
                "comics" => $data,
            ],
            "main", // layout
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
            "comics/create",
            [],
            "main", // layout
        );
    }
    public static function create()
    {
        $name = $_POST["name"];
        $description = $_POST["description"] ?? null;
        $image = $_FILES["image"];
<<<<<<< Updated upstream
        $cover_image = $_FILES["cover_image"];
=======
        $cover_image = $_FILES["cover_image"] ?? null;
>>>>>>> Stashed changes
        $status = $_POST["status"] ?? null;
        $others_name = $_POST["others_name"] ?? null;
        $country = $_POST["country"] ?? null;
        $release_date = $_POST["release_date"] ? $_POST["release_date"] : null;

        $folder = '../public/images/comics/';
        $sub_folder = 'images/comics/';


        $path_file_image = $folder . basename($image["name"]);
        $path_store_image = $sub_folder . basename($image["name"]);
        move_uploaded_file($image["tmp_name"], $path_file_image);

        if($cover_image['name'] != ''){
            $path_file_cover_image = $folder . basename($cover_image["name"]);
            $path_store_cover_image = $sub_folder . basename($cover_image["name"]);
            move_uploaded_file($cover_image["tmp_name"], $path_file_cover_image);
        }

        $comic = new Comic;
        $comic->fill([
            'name' => $name,
            'description' => $description,
            'image' => $path_store_image,
            'cover_image' => $path_store_cover_image,
            'status' => $status,
            'others_name' => $others_name,
            'country' => $country,
            'release_date' => $release_date
        ]);
        $comic->save();

        return redirect('/admin/comics');
    }
    public static function updateView($comic_id)
    {
        $comic = Comic::find($comic_id);

        return view(
            "comics/update",
            [
                "comic" => $comic,
            ],
            "main", // layout
        );
    }
    public static function update()
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $description = $_POST["description"] ?? null;
        $image = $_FILES["image"];
        $cover_image = $_FILES["cover_image"];
        $status = $_POST["status"] ?? null;
        $others_name = $_POST["others_name"] ?? null;
        $country = $_POST["country"] ?? null;
        $release_date = $_POST["release_date"] ? $_POST["release_date"] : null;

        $comic = Comic::find($id);

        if( $image['name'] == '' && $cover_image['name'] == '' ){
            $comic->fill([
                'name' => $name,
                'description' => $description,
                'status' => $status,
                'others_name' => $others_name,
                'country' => $country,
                'release_date' => $release_date
            ]);
            
            $comic->save();
            return redirect('/admin/comics');
        }

        $folder = '../public/images/comics/';
        $sub_folder = 'images/comics/';

        if($image['name'] != ''){
            $path_file_image = $folder . basename($image["name"]);
            $path_store_image = $sub_folder . basename($image["name"]);
            move_uploaded_file($image["tmp_name"], $path_file_image);
        }

        if($cover_image['name'] != ''){
            $path_file_cover_image = $folder . basename($cover_image["name"]);
            $path_store_cover_image = $sub_folder . basename($cover_image["name"]);
            move_uploaded_file($cover_image["tmp_name"], $path_file_cover_image);
        }

        $comic->fill($_POST);
        $comic->save();

        return redirect('/admin/comics');
    }
    public static function delete($comic_id)
    {
        $comic = Comic::find($comic_id);
        $chapter = Chapter::find($comic_id);
        $comic_genre = Comic_Genre::where('comic_id', $comic_id)->get();
        // foreach ($comic_genre as $genre) {
        //     $comic_id = $genre->comic_id;
        //     $genre_id = $genre->genre_id;
        //     print_r($genre_id);
        // }
        if($chapter){
            $image = Image::find($chapter['id']);
            die($image);
            if ($image){
                $image->delete();
            }
            $chapter->delete();
        }
        if($comic_genre){
            $comic_genre->delete();
        }
        Comic::find($comic_id)->delete();
        return redirect('/admin/comics');
    }
}