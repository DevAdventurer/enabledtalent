<?php
namespace App\Http\Resources\Admin\Section;

use Illuminate\Http\Resources\Json\JsonResource;
class SectionResource extends JsonResource
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
            'sn' => ++$request->start,
            'id'=>$this->id,
            'name'=>$this->name??'N/A',
            'snippet_name'=>$this->snippet_name??'N/A',
        ];
    }
}
