<?php
namespace App\Http\Resources\Admin\Page;

use Illuminate\Http\Resources\Json\JsonResource;
class PageResource extends JsonResource
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
            'title'=>$this->title??'N/A',
            'slug'=>$this->slug??'N/A',
        ];
    }
}
