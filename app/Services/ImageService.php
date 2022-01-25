<?php

namespace App\Services;

use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    private ImageRepository $imageRepository;
    private Request $request;

    public function __construct(ImageRepository $imageRepository, Request $request)
    {
        $this->request = $request;
        $this->imageRepository = $imageRepository;
    }

    // Получить все картинки
    public function getAll()
    {
        return $this->imageRepository->getAll();
    }

    // Получить одну картинку
    public function getOne(int $id)
    {
        return $this->imageRepository->getOne($id);
    }

    // Сохранение новой картинки
    public function store($image)
    {
        $fileName = $image->store('uploads');

        // Запись информации о файле в базу данных
        $this->imageRepository->insert($fileName);
    }

    // Обновление картинки
    public function update(int $id, string $newFileName)
    {
        // Получить старый файл
        $oldImage = $this->imageRepository->getOne($id);

        // Сохранить новый файл в бд
        $this->imageRepository->edit($id, $newFileName);
            
        // Удалить предыдущий файл
        Storage::delete($oldImage->image);
    }

    // Удаление картинки
    public function delete(int $id)
    {
        // Найти файл в бд
        $filename = $this->getOne($id);

        // Удалить файл в бд
        $this->imageRepository->delete($id);

        // Удалить файл с диска
        Storage::delete($filename->image);
    }
}