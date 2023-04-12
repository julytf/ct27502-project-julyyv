<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use App\Models\Comic;
use App\Models\Chapter;
use App\Models\Comic_Genre;
use App\Models\Genre;

class GenresController
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
    public static function adminIndex()
    {
        $data = Genre::get();
        return view(
            "admin/genres/index",
            [
                "genres" => $data,
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
            "admin/genres/create",
            [],
            "admin", // layout
        );
    }
    public static function create()
    {
        $name = $_POST["name"];
        $description = $_POST["description"];
        if($name == '' || $description == '' ){
            return redirect("/admin/genres");
        }
        $genre = new genre();
        $genre->fill([
            "name" => $name,
            "description" => $description,
        ]);
        $genre->save();

        return redirect("/admin/genres");
    }
    public static function updateView($genre_id)
    {
        $genre = Genre::find($genre_id);

        return view(
            "admin/genres/update",
            [
                "genre" => $genre,
            ],
            "admin", // layout
        );
    }
    public static function update($genre_id)
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        if($name == '' || $description == '' ){
            return redirect("/admin/genres");
        }
        $genre = Genre::find($genre_id);

        $genre->fill([
            "name" => $name,
            "description" => $description,
        ]);
        $genre->save();

        return redirect("/admin/genres");

    }
    public static function delete($genre_id)
    {
        $genre = Genre::find($genre_id);
        $comic_genre_arr = $genre->comics()->get();
        if($comic_genre_arr){
            foreach ($comic_genre_arr as $comic_genre) {
                // die($comic_genre->pivot);
                $comic_genre->pivot->delete();
            }
        }
        $genre->delete();
        return redirect('/admin/genres');
    }
}