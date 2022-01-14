<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PautaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'pauta_id'              => $this->pauta_id,
            // 'image'                 => $this->logo ? url("storage/{$this->logo}") : null,
            'tipo_pauta'            => $this->tipo_pauta,
            'titulo'                => $this->titulo,
            'incricoes_data_inicio' => Carbon::parse($this->incricoes_data_inicio)->format('d/m/Y'),
            'updated_at'            => Carbon::parse($this->updated_at)->format('d/m/Y'),
        ];
    }
}
