<?php
namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity 
 * @ORM\Table(name="users") 
 */
class User
{
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    private $first_name;
    /**
     * @ORM\Column(type="string")
     */
    private $last_name;
    /**
     * @ORM\Column(type="string")
     */
    private $initials;
    /**
     * @ORM\Column(type="string")
     */
    private $email;



}