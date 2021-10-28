<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer id
 * @property string english_name
 * @property string code
 * @property int is_rtl
 */
class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = ['english_name', 'code', 'is_rtl'];

    public function Translate(): hasMany
    {
        return $this->hasMany(Translation::class, 'ref_id')->where('model_type', 'Language');
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }



    /**
     * @return string
     */
    public function getEnglishName(): string
    {
        return $this->english_name;
    }

    /**
     * @param string $english_name
     */
    public function setEnglishName(int $english_name): void
    {
        $this->english_name = $english_name;
    }



    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getIsRtl(): string
    {
        return $this->is_rtl;
    }

    /**
     * @param string $is_rtl
     */
    public function setIsRtl(int $is_rtl): void
    {
        $this->is_rtl= $is_rtl;
    }


}
