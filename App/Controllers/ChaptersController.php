<?php

namespace App\Controllers;

require_once '../vendor/autoload.php';

use App\Models\Comic;
use App\Models\Chapter;
use App\Models\Comic_Genre;
use App\Models\Image;

class ChaptersController
{
    public static function detail($comic_id, $chapter_id)
    {
        $chapter = Chapter::find($chapter_id);
        $comic = Comic::find($chapter->comic_id);
        $images = $chapter->images;
        $previous_chapter_id = Chapter::where('comic_id', $comic_id)->where('id', '<', $chapter->id)->max('id');
        $next_chapter_id = Chapter::where('comic_id', $comic_id)->where('id', '>', $chapter->id)->min('id');
        return view(
            "chapter",
            [
                'comic' => $comic,
                'chapter' => $chapter,
                'images' => $images,
                'previous_chapter_id' => $previous_chapter_id,
                'next_chapter_id' => $next_chapter_id,
            ],
            "main", // layout
        );
    }
    public static function getOne($chapter_id)
    {
        $chapter = Chapter::find($chapter_id);
        $images = $chapter->images;

        return view(
            "admin/chapters/detail",
            [
                "chapter" => $chapter,
                "images" => $images,
            ],
            "admin", // layout
        );
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
        $chapters = Comic::find($comic_id)->chapters()->get();
        $name = $_POST["name"] ? $_POST["name"] : null;
        $index_chapter = $_POST["index_chapter"];

        if ($index_chapter == '' || findObjectByIndex($index_chapter, $chapters) !== false) {
            return redirect("/admin/comics/" . $comic_id );
        }
        $chapter = new Chapter();
        $chapter->fill([
            "name" => $name,
            "index_chapter" => $index_chapter,
            "comic_id" => $comic_id
        ]);
        $chapter->save();

        // ------- handle create images ---- 

        $folder = '../public/img/';
        $total = count($_FILES['upload']['name']);

        for ($i = 0; $i < $total; $i++) {

            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            $file_name = rand(100000000, 999999999);

            //Make sure we have a file path
            if ($tmpFilePath != "") {
                //Setup our new file path
                $ext = pathinfo($_FILES['upload']['name'][$i], PATHINFO_EXTENSION);
                $path_file_image = $folder . $file_name . '.' . $ext;
                while (file_exists($path_file_image)) {
                    $file_name = rand(100000000, 999999999);
                    $path_file_image = $folder . $file_name . '.' . $ext;
                }
                $store = $file_name . '.' . $ext;
                move_uploaded_file($tmpFilePath, $path_file_image);

                $image = new Image();
                $image->fill([
                    "file" => $store,
                    "index_image" => $i,
                    "chapter_id" => $chapter->id
                ]);
                $image->save();
            }
        }

        return redirect("/admin/comics/" . $comic_id);
    }
    public static function updateView($comic_id, $chapter_id)
    {
        $chapter = Chapter::find($chapter_id);
        $images = $chapter->images;

        return view(
            "admin/chapters/update",
            [
                "chapter" => $chapter,
                "images" => $images,
            ],
            "admin", // layout
        );
    }
    public static function update($comic_id, $chapter_id)
    {
        $chapters = Comic::find($comic_id)->chapters()->get();
        $id = $_POST["id"];
        $name = $_POST["name"] ? $_POST["name"] : null;
        $index_chapter = $_POST["index_chapter"];

        $temp_chapter = findObjectByIndex($index_chapter, $chapters);
        if ($temp_chapter !== false && $temp_chapter["index_chapter"] != $index_chapter) {
            return redirect("/admin/comics/" . $comic_id . "/chapters");
        }
        if ($index_chapter == '') {
            return redirect("/admin/comics/" . $comic_id);
        }

        $chapter = Chapter::find($id);

        $chapter->fill([
            "name" => $name,
            "index_chapter" => $index_chapter,
        ]);
        $chapter->save();

        // ------- handle create images ---- 

        // delete all images of chapter
        $images = $chapter->images()->get();
        if ($images) {
            foreach ($images as $image) {
                $image->delete_image();
            }
        }

        $folder = '../public/img/';
        $total = count($_FILES['upload']['name']);

        for ($i = 0; $i < $total; $i++) {

            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            $file_name = rand(100000000, 999999999);

            //Make sure we have a file path
            if ($tmpFilePath != "") {
                //Setup our new file path
                $ext = pathinfo($_FILES['upload']['name'][$i], PATHINFO_EXTENSION);
                $path_file_image = $folder . $file_name . '.' . $ext;
                while (file_exists($path_file_image)) {
                    $file_name = rand(100000000, 999999999);
                    $path_file_image = $folder . $file_name . '.' . $ext;
                }
                $store = $file_name . '.' . $ext;
                move_uploaded_file($tmpFilePath, $path_file_image);

                $image = new Image();
                $image->fill([
                    "file" => $store,
                    "index_image" => $i,
                    "chapter_id" => $chapter->id
                ]);
                $image->save();
            }
        }

        return redirect("/admin/comics/" . $comic_id);
    }
    public static function delete($comic_id, $chapter_id)
    {
        $chapter = Chapter::find($chapter_id);
        $images = $chapter->images()->get();
        if ($images) {
            foreach ($images as $image) {
                $image->delete_image();
            }
        }
        $chapter->delete();
        return redirect('/admin/comics/' . $comic_id);
    }
}
