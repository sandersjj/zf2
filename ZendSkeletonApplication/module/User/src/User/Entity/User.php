<?php
namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity 
 * @ORM\Table(name="users") 
 */
class User implements \IteratorAggregate
{
    
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
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

    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFirst_name() {
        return $this->first_name;
    }

    public function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    public function getLast_name() {
        return $this->last_name;
    }

    public function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    public function getInitials() {
        return $this->initials;
    }

    public function setInitials($initials) {
        $this->initials = $initials;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }


    public function toArray(){
        return get_object_vars($this);
    }

    public function getIterator() {
        return new \ArrayIterator($this);
    }

}