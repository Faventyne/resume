<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 27/11/2017
 * Time: 21:37
 */

namespace src;

class Opportunity extends DbObject
{
    /** @var User */
    protected $user;
    /** @var string */
    protected $company;
    /** @var string */
    protected $role;
    /** @var int */
    protected $stage;
    /** @var int */
    protected $probability;
    /** @var string */
    protected $name;
    /** @var DateTime */
    protected $creadate;
    /** @var DateTime */
    protected $appdate;
    /** @var DateTime */
    protected $enddate;
    /** @var string */
    protected $department;
    /** @var string */
    protected $sector;
    /** @var bool */
    protected $intref;
    /** @var bool */
    protected $link;
    /** @var int */
    protected $candidates;

    /**
     * Opportunity constructor.
     * @param User $user
     * @param string $company
     * @param string $role
     * @param int $stage
     * @param int $probability
     * @param string $name
     * @param DateTime $creadate
     * @param DateTime $appdate
     * @param DateTime $enddate
     * @param string $department
     * @param string $sector
     * @param bool $intref
     * @param bool $link
     * @param int $candidates
     */
    public function __construct($id=0, User $user=null, $company='', $role='', $stage='', $probability=0, $name='', DateTime $creadate=null, DateTime $appdate=null, DateTime $enddate=null, $department='', $sector='', $intref=false, $link='', $candidates=0, $inserted='')
    {
        $this->user = $user;
        $this->company = $company;
        $this->role = $role;
        $this->stage = $stage;
        $this->probability = $probability;
        $this->name = $name;
        $this->creadate = $creadate;
        $this->appdate = $appdate;
        $this->enddate = $enddate;
        $this->department = $department;
        $this->sector = $sector;
        $this->intref = $intref;
        $this->link = $link;
        $this->candidates = $candidates;
        parent::__construct($id,$inserted);
    }

    public static function get($id)
    {
        // TODO: Implement get() method.
    }

    public static function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public static function getAllForSelect()
    {
        // TODO: Implement getAllForSelect() method.
    }

    public function saveDB()
    {
        // TODO: Implement saveDB() method.
    }

    public static function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }


}