<?php

namespace App\Repositories;
use App\Interfaces\IImageRepository;
use App\Models\Image;


class ImageRepository extends BaseRepository implements IImageRepository
{
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }
}
