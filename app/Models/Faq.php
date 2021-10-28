<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer id
 * @property string|null question
 * @property string|null question_ar
 * @property mixed answer
 * @property mixed answer_ar
 * @property boolean is_active
 * @method Faq find(int $id)
 * @method static updateOrCreate(array $array, array $array1)
 */
class Faq extends Model
{
    protected $table = 'faqs';
    protected $fillable = ['question','answer','is_active'];
    public function Translate(): hasMany
    {
        return $this->hasMany(Translation::class, 'ref_id')->where('model_type', 'Faq');
    }
}
