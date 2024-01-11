<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id, // Id del llibre
            'user_id' => $this->user_id, // Id del propietari
            'propietari' => $this->user->name, // Nom del propietari
            'module_id' => $this->module_id, // Id del mòdul
            'modul' => $this->module->vliteral, // Nom del mòdul
            'editor' => $this->publisher, // Editor
            'preu' => $this->price, // Preu
            'pagines' => $this->pages, // Pàgines
            'estat' => $this->status, // Estat
            'comentaris' => $this->comments, // Comentaris
            'imatge' => $this->photo, // Imatge
            'venut' => $this->soldDate, // Data de venda
        ];
    }
}
