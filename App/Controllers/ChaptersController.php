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
        $data = Comic::find($comic_id)->chapters()->get() ?? [];
        return view(
            "admin/chapters/index",
            [
                "chapters" => $data, 'comic_id' => $comic_id
            ],
            "admin", // layout
        );
    }
    public static function getOne()
    {
        echo 'hello';
        echo "TODO:";
    }
    public static function createView($comic_id)
    {
        return view(
            "admin/chapters/create",
            [
                "comic_id" => $comic_id
            ],
            "admin", // layout
        );
    }
    public static function create($comic_id)
    {
        $name = $_POST["name"] ? $_POST["name"] : null;
        $index_chapter = $_POST["index_chapter"];
        $comic_id = $_POST["comic_id"];
        if($index_chapter == ''){
            return redirect("/admin/comics/" . $comic_id . "/chapters");
        }
        $chapter = new Chapter();
        $chapter->fill([
            "name" => $name,
            "index_chapter" => $index_chapter,
            "comic_id" => $comic_id
        ]);
        $chapter->save();

        return redirect("/admin/comics/" . $comic_id . "/chapters");
    }
    public static function updateView($comic_id,$chapter_id)
    {
        $chapter = Chapter::find($chapter_id);

        return view(
            "admin/chapters/update",
            [
                "chapter" => $chapter,
            ],
            "admin", // layout
        );
    }
    public static function update($comic_id)
    {
        $id = $_POST["id"];
        $name = $_POST["name"] ? $_POST["name"] : null;
        $index_chapter = $_POST["index_chapter"];

        if($index_chapter == ''){
            return redirect("/admin/comics/" . $comic_id . "/chapters");
        }

        $chapter = Chapter::find($id);

        $chapter->fill([
            "name" => $name,
            "index_chapter" => $index_chapter,
        ]);
        $chapter->save();

        return redirect("/admin/comics/" . $comic_id . "/chapters");

    }
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