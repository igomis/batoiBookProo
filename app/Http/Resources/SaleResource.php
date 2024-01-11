<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            'book_id' => $this->book_id, // Id del propietari
            'propietari' => $this->book->user->name, // Nom del propietari
            'modul' => $this->book->module->vliteral, // Nom del mòdul
            'user_id' => $this->user_id, // Id del comprador
            'comprador' => $this->comprador->name, // Nom del comprador
            'date' => $this->date, // Data de compra
            'status' => $this->status, // Estat
        ];
    }
}
