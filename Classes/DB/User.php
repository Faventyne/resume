<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 27/11/2017
 * Time: 21:38
 */

class User
{
    /** @var string */
    protected $firstname;
    /** @var string */
    protected $lastname;
    /** @var string */
    protected $mail;
    /** @var string */
    protected $pwd;
    /** @var string */
    protected $role;

    /**
     * User constructor.
     * @param string $firstname
     * @param string $lastname
     * @param string $mail
     * @param string $pwd
     * @param string $role
     */
    public function __construct($firstname, $lastname, $mail, $pwd, $role)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->mail = $mail;
        $this->pwd = $pwd;
        $this->role = $role;
    }

    /**
     * User constructor.
     * @param User $firstname
     * @param string $lastname
     * @param string $mail
     * @param string $pwd
     * @param string $role
     */

    /**
     * @return User
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param User $firstname
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }
    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * @param string $pwd
     */
    public function setPwd(string $pwd)
    {
        $this->pwd = $pwd;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role)
    {
        $this->role = $role;
    }


    /** @var string */


}

