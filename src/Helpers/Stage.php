<?php

namespace Classes\Helpers;

class Stage {
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
            1 => 'Speculative Application',
            2 => 'Online Application',
            3 => 'First Job Interview',
            4 => 'Second Job Interview',
            5 => 'Short Selection',
            6 => 'Contract negociation',
            7 => 'Job secured'
        );
    }
}