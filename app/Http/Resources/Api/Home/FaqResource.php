<?php

namespace App\Http\Resources\Api\Home;

use App\Helpers\Functions;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{
    public function toArray($request): array
    {

        $question = Functions::Translation($this->getId(), 'question', 'Faq');
        $answer = Functions::Translation($this->getId(), 'answer', 'Faq');

        $Objects = array();
        $Objects['id'] = $this->id;
        $Objects['question'] = $question ? $question->Translate : $this->question;
        $Objects['answer'] = $answer ? $answer->Translate : $this->answer;
        return $Objects;
    }
}
