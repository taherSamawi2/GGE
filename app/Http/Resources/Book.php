<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                'id'       => $this->id,
                'en_name'     => $this->getTranslation('name','en'),
                'ar_name'     => $this->getTranslation('name','ar'),
                'book_image'     => $this->getFirstMedia('books_images') ,
                'book_image_url'     => $this->getFirstMediaUrl('books_images') ,
                'book'     => $this->getFirstMedia('books') ,
                'book_url'     => $this->getFirstMediaUrl('books') ,
        ];
    }
}
