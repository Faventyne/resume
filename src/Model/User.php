<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 27/11/2017
 * Time: 21:38
 */

namespace Model;

/**
 * @Entity @Table(name="user")
 */
class User extends DbObject
{

    /**
     * @Column(name="usr_firstname", type="string")
     * @var string
     */
    protected $firstname;
    /**
     * @Column(name="usr_lastname", type="string")
     * @var string
     */
    protected $lastname;
    /**
     * @Column(name="usr_mail", type="string")
     * @var string
     */
    protected $mail;
    /**
     * @Column(name="usr_pwd", type="string")
     * @var string
     */
    protected $password;
    /**
     * @Column(name="usr_role", type="string")
     * @var string
     */
    protected $role;
    /**
     * @Column(name="usr_token", type="string")
     * @var string
     */
    protected $token;

    /**
     * User constructor.
     * @param string $firstname
     * @param string $lastname
     * @param string $mail
     * @param string $password
     * @param string $role
     * @param string $token
     */
    public function __construct($id=0,$firstname='', $lastname='', $mail='', $password='', $role='', $token='', $inserted='')
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->mail = $mail;
        $this->password = $password;
        $this->role = $role;
        $this->token = $token;
        parent::__construct($id,$inserted);
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
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
    public function getMail()
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRole()
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

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }




}