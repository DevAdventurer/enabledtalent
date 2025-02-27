<?php
namespace App\Http\Resources\Admin\Skill;

use Illuminate\Http\Resources\Json\JsonResource;
class SkillResource extends JsonResource
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
            'name'=>$this->name,
            'status_id'=>$this->status_id,
            'status'=>status($this->status_id),
        ];
    }
}
