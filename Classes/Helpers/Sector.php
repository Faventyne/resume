<?php

namespace Classes\Helpers;

class Sector {
    /** @var int */
    private $id;
    /** @var string */
    private $name;

    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    public static function getListForSelect() {
        return array(
            1 => 'Agriculture, Forest, Fishing',
            2 => 'Extractive Industries',
            3 => 'Manufacturing Industries',
            4 => 'Electricity, Gaz',
            5 => 'Water & Waste Treatment',
            6 => 'Construction',
            7 => 'Cars & Vehicules',
            8 => 'Transport',
            9 => 'Accommodation, Catering',
            10 => 'Publishing, IT & Communication',
            11 => 'Finance, Insurance, Accounting',
            12 => 'Real Estate',
            13 => 'Research',
            14 => 'Administrative services',
            15 => 'Public Sector',
            16 => 'Teaching',
            17 => 'Health',
            18 => 'Arts',
            19 => 'Non-profit Organizations & Unions'


        );
    }
}