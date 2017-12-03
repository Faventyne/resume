<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 27/11/2017
 * Time: 22:07
 */

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
            1 => 'Buying',
            2 => 'Administration, Accounting, Finance',
            3 => 'IT & Telecom',
            4 => 'Engineering, Technical',
            5 => 'Managing, Direction',
            6 => 'Marketing, Advertising',
            7 => 'Production, Construction',
            8 => 'Research & Development',
            9 => 'Human Resources',
            10 => 'Administrative & Service Support',
            11 => 'Legal',
            12 => 'Transports & Logistics',
            13 => 'Sales',
        );
    }
}