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
        $oUser = new User();
//        \Zend\Debug::dump($this->_em->find('User\Entity\User',1));
        \Zend\Debug::dump($this->_em->getRepository('User\Entity\User')->findAll());
         
        die('ik ben de index action');
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
        
