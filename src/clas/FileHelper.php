<?php

namespace App\clas;

use phpDocumentor\Reflection\Types\Nullable;

class FileHelper
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
    public function __construct(string $file = null, int $minLength = 2, int $maxLength = 10)
    {
        if ($file) {
            $this->file = '../assets/JSON/' . $file . '.json';
        } else {
            $this->file = '../assets/JSON/services.json';
        }
        if ($minLength === null) {
            $this->$minLength = $minLength;
        }
        if ($maxLength === null) {
            $this->maxLength = $maxLength;
        }
    }

    public function getElementToJson()
    {
        return \json_decode(file_get_contents($this->file), true);
    }

    public function limitArray(array $array, int $minLength = null): array
    {
        if ($minLength === null) {
            $minLength = $this->minLength;
        }
        $res = [];
        $all = [];
        foreach ($array as $element) {
            $all[] = $element;
            if (count($res) < $minLength) {
                $res[] = $element;
            }
        }
        // var_dump($all);
        if (count($res) > 1) {
            return ["res" => $res, "all" => $all];
        }
    }

    public function getAllServices(array $array): array
    {
        $res = [];
        foreach ($array as $element) {
            // var_dump($element['services']);
            $services = $element['services'];
            foreach ($services as $service) {
                $res[] = $service;
            }
        }
        return $res;
    }

    public function limitMaxArray(array $array, int $maxLength = null): array
    {
        if ($maxLength === null) {
            $maxLength = $this->maxLength;
        }
        // dd($maxLength);
        $res = [];
        $lots = [];

        // dd($lengthArray);
        $lengthArray = count($array) % $maxLength;
        $lot = [];
        $i = 1;
        foreach ($array as $element) {
            if ($lengthArray > 0) {
                if (count($lot) < $maxLength) {
                    $lot[] = $element;
                }
            }
            // var_dump($i);
            $lots["lot $i "] = $lot;
        }
        $i++;
        $res = $lots;
        // var_dump($res);
        // dd($res);
        return $res;
    }

    public function getServicesLimited(array $array, int $minLength = null, int $maxLength = null): array
    {
        if ($maxLength === null) {
            $maxLength = $this->maxLength;
            // dd($maxLength);
        }
        if ($minLength === null) {
            $minLength = $this->minLength;
            // dd($minLength);
        }

        $res = [];
        $all = $this->limitMaxArray($this->getAllServices($array), $maxLength);
        // dd($all);
        foreach ($array as $typeService) {
            // dd($typeService);
            foreach ($typeService as $key => $services) {
                if ($key == 'services') {
                    $serviceLimited = $this->limitArray($services, $minLength)['res'];
                }
                // $test['services'] = $serviceLimited;
            }
            $shows['"' . $typeService['title'] . '"'] = [$serviceLimited, $typeService['title'], $typeService['p']];
        }

        $res = ["all" => $all, "shows" => $shows];
        return $res;
    }

    // (getElementToJsonClients) il recupere le dosier (JSON/clients) et y faire des iterations

    /**
     * getElementToJsonClients
     *
     * @param  array $array
     *
     * @return array
     */
    public function getElementToJsonClients(array $array): array
    {
        /**
         * @array doit etre la liste des sous dosier existent dans le repertoire (JSON/clients)
         */

        // liste des clients à la base
        $clients = [];
        foreach ($array as $client) {
            $file = '../assets/JSON/clients/' . $client . '/clients.json';
            $clients[] = \json_decode(file_get_contents($file), true);
        }
        // var_dump($clients);
        if (count($clients) >= 1) {
            return $clients;
        }
    }
    /**
     * filterElements
     *
     * @param  array|null $array
     *
     * @return array|null
     */
    public function filterElements(array $array = null): array | null
    {
        if ($array && count($array) >= 1) {
            return $array;
        }
        return null;
    }

    // (treeElementClients) fait le trieage des client en function de ces parametre

    /**
     * treeElementClients
     *
     * @param  array       $array
     * @param  string      $handler
     * @param  string|null $status
     * @param  int         $count
     *
     * @return array
     */
    public function treeElementClients(array $array, string $handler, string $status = null, int $count = 2): array | null
    {
        if ($status === 'all' && $count = 2) {
            $count = 10;
        }
        $treeClients = [];
        foreach ($array as $clients) {
            foreach ($clients as $client) {
                // var_dump($client['handler']);
                if ($client['handler'] === $handler) {
                    // var_dump($client);
                    if (count($treeClients) < $count) {
                        if ($status != 'all') {
                            if ($client['status'] == $status)
                                $treeClients[] = $client;
                        } else if ($status && $status === 'all') {
                            $treeClients[] = $client;
                        } else {
                            $treeClients[] = $client;
                        }
                    }
                }
            }
            // var_dump($treeClients);
            if (count($treeClients) >= 1) {
                return $treeClients;
            } else {
                // var_dump('cest null');
                return null;
            }
        }
    }

    public function treeElement()
    {
        foreach ($this->getElementToJson() as $value) {
            var_dump($value);
        }
    }

    public function treeElementBySlug(string $slug)
    {
        foreach ($this->getElementToJson() as $element) {
            if ($element['slug'] === $slug) {
                // var_dump($element);
                return $element;
            }
        }
    }

    function treeElementsServices(array $array, string $handler)
    {
        $res = [];
        foreach ($array as $value) {
            $services = $value['services'];
            foreach ($services as $key => $value) {
                // var_dump($value['typeofservice']);
                if ($value['typeofservice'] === $handler) {
                    $res[] = $value;
                }
            }
        }
        return $res;
    }
}
