<?php

namespace User\Controller;

use Zend\Mvc\Controller\ActionController,
    \User\Entity\User as User,
    Doctrine\ORM\EntityManager,
    Zend\EventManager\EventManager,
    Zend\EventManager\Event;


class UserController extends ActionController
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $_em;
    
    /**
     * 
     */
    public function setEntityManager(EntityManager $em)
    {   
        $this->_em = $em;
    }
    
    public function indexAction()
    {
//        $oManager = new \Page\Manager();
//        $aPages = $oManager->getAllPages();
//        \Zend\Debug::dump($aPages);
//        $oUser = new User();
//      

//        
    }
    
    public function listAction()
    {
        $aAllUsers =  $this->_em->getRepository('User\Entity\User')->findAll();
        
        
        $oOverview = new \User\overview($aAllUsers,array('id','firstName','lastName','initials','email', 'phoneNumber'));
        $sTable = $oOverview->output();
        
        
         return array(
             'users' => $aAllUsers,
             'table' => $sTable
        );
    }
    
    public function editAction()
    {
        die('dit is de edit action');
    }
    
    /**
     * 
     */
    public function createdatabaseAction()
    {   
        
        $tool = new \Doctrine\ORM\Tools\SchemaTool($this->_em);
        $classes = array(
            $this->_em->getClassMetadata('User\Entity\User')
        );
        $tool->dropSchema($classes);
        $tool->createSchema($classes);
    }
}
        
