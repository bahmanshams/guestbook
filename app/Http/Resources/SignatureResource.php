<?php namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SignatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $request->id,
            'name' => $request->name,
            'avatar' => $request->avatar,
            'body' => $request->body,
            'date' => $request->created_at->diffForHumans(),
        ];
    }
}
