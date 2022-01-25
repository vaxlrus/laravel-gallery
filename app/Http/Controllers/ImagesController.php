<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ImageService;

class ImagesController extends Controller
{
    private ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;    
    }

    // Отображение всех картинок
    public function index()
    {
        // Получить список всех картинок
        $images = $this->imageService->getAll();

        return view('index', ['images' => $images]);
    }

    // Страница загрузки новой картинки
    public function create()
    {
        return view('create');
    }

    // Сохранение новой картинки
    public function store(Request $request)
    {
        $image = $request->file('image');
        $this->imageService->store($image);

        return redirect('/');
    }
    
    // Отображение единичной картинки
    public function getOne(int $id)
    {
        // Получить картинку
        $image = $this->imageService->getOne($id);

        return view('show', [
            'imageUrl' => $image->image
        ]);
    }

    // Страница редактирования картинки
    public function edit($id)
    {
        $imageArray = $this->imageService->getOne($id);

        return view('edit', [
            'imageId' => $imageArray->id,
            'imageUrl' => $imageArray->image
        ]);
    }

    // Обновление картинки
    public function update(Request $request, $id)
    {
        // Получить название нового файла в папку images
        $newFile = $request->file('image')->store('images');

        // Произвести обновление в бд
        $this->imageService->update($id, $newFile);

        return redirect('/');
    }

    // Удаление картинки
    public function delete($id)
    {
        $this->imageService->delete($id);
        
        return redirect('/');
    }
}
