<?php

namespace src;

//use Classes\Exceptions\InvalidSqlQueryException;

abstract class DbObject
{


    /**
     * @Id @Column(name="usr_id", type="integer") @GeneratedValue
     * @var int
     */
    protected $id;


    /**
     * @Column(name="usr_inserted", type="datetime")
     * @var string
     */
    protected $inserted;

    public function __construct($id = 0, $inserted = '')
    {
        $this->id = $id;
        /*
        if (is_numeric($inserted)) {
            $this->inserted = $inserted;
        } else {
            $this->inserted = strtotime($inserted);
        }*/
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /*
     * @param int $id
     */
    /*
    public function setId(int $id)
    {
        $this->id = $id;
    }
    */

    public function getInserted()
    {
        return $this->inserted;
    }

    /**
     * @param \DateTime $inserted
     */
    public function setInserted(\DateTime $inserted)
    {
        $this->inserted = $inserted;
    }



}