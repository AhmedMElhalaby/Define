<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpseclib3\File\ASN1\Maps\Time;

/**
 * @property integer id
 * @property string coin_code
 * @property string price
 * @property integer time
 */
class Coin extends Model
{
    protected $table = 'coins';
    protected $fillable = ['coin_code','price','time'];

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
    public function getCoinCode(): string
    {
        return $this->coin_code;
    }

    /**
     * @param string $coin_code
     */
    public function setCoinCode(string $coin_code): void
    {
        $this->coin_code = $coin_code;
    }



    /**
     * @return double
     */
    public function getPrice(): double
    {
        return $this->price;
    }

    /**
     * @param double $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }




    /**
     * @return Time
     */
    public function getTime(): Time
    {
        return $this->time;
    }

    /**
     * @param double $time
     */
    public function setTime(int $time): void
    {
        $this->time = $time;
    }



}
