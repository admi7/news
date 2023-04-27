<?php

namespace App\clas;

use phpDocumentor\Reflection\Types\Nullable;

class Annonces
{

    /**
     * @var string
     */
    public string $file;

    public int $maxLength = 10;

    public int $minLength = 2;

    /**
     * Constructor.
     * @param string $file
     */

    /**
     * __construtor
     *
     * @param  string|null $file
     * @param  int         $minLength
     * @param  int         $maxLength
     */
    public function __construct(string $file = '../assets/JSON/services.json', int $minLength = 2, int $maxLength = 10)
    {
        $this->file = '../assets/JSON/annonces.json';
        if ($minLength === null) {
            $this->$minLength = $minLength;
        }
        if ($maxLength === null) {
            $this->maxLength = $maxLength;
        }
    }

    public function getAnnonces()
    {
        return \json_decode(file_get_contents($this->file), true);
    }
}
