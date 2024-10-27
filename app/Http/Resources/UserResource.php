<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'files' => $this->peopleFiles,
            'created' => $this->created_at->format('c'),
            'updated' => $this->updated_at->format('c'),
            'author' => $this->author
        ];
    }
}
