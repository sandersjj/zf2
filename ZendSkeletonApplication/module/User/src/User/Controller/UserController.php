<?php

namespace User\Controller;

use Zend\Mvc\Controller\ActionController,
    User\Entity\User,
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
        
        
         
        die('ik ben de index action');
    }
    
    public function listAction()
    {
        
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
        
