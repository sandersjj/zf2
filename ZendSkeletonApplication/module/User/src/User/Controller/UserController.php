<?php

namespace User\Controller;

use Zend\Mvc\Controller\ActionController,
    \User\Entity\User as User,
    Doctrine\ORM\EntityManager;

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
        $aAllUsers =  $this->_em->getRepository('User\Entity\User')->findAll();
        
        
        $oOverview = new \User\overview($aAllUsers,array('id','first_name','last_name','initials','email'));
        $sTable = $oOverview->output();
        
        
         return array(
             'users' => $aAllUsers,
             'table' => $sTable
        );
//        
    }
    
    public function listAction()
    {
        die('ik ben de list action');
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
        
