<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ImageRepository
{
    // Получить все картинки
    public function getAll()
    {
        $images = DB::table('images')
            ->select('*')
            ->get();

        return $images->all();
    }

    // Получить одну картинку
    public function getOne(int $id)
    {
        $image = DB::table('images')
            ->select('*')
            ->where('id', $id)
            ->first();

        return $image;
    }

    // Вставка новой картинки
    public function insert(string $filename)
    {
        DB::table('images')->insert([
            'image' => $filename
        ]);

        return true;
    }

    // Изменение картинки
    public function edit(int $id, string $filename)
    {
        DB::table('images')
            ->where('id', $id)
            ->update(['image' => $filename]);

        return true;
    }

    // Удаление картинки
    public function delete(int $id)
    {
        DB::table('images')
        ->where('id' , '=', $id)
        ->delete();

        return true;
    }
}