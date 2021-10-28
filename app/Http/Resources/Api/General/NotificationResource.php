<?php

namespace App\Http\Resources\Api\General;

use App\Helpers\Functions;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    public function toArray($request): array
    {
        $title = Functions::Translation($this->getId(), 'title', 'Notification');
        $message = Functions::Translation($this->getId(), 'message', 'Notification');
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['title'] = ($title ? $title->Translate : $this->getTitle());
        $Objects['message'] = ($message ? $message->Translate : $this->getMessage());
        $Objects['ref_id'] = $this->getRefId();
        $Objects['type'] = $this->getType();
        $Objects['read_at'] = ($this->getReadAt())?Carbon::parse($this->getReadAt())->format('Y-m-d h:i A'):null;
        $Objects['created_at'] = ($this->created_at)?Carbon::parse($this->created_at)->format('Y-m-d h:i A'):null;
        return $Objects;
    }
}
