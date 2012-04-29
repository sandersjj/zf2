<?php

namespace User;

return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'user' => 'User\Controller\UserController',
//                'user-index' => 'Page\Controller\IndexController',
            ),
//            'Zend\View\PhpRenderer' => array(
//                'parameters' => array(
//                    'options' => array(
//                        'script_paths' => array(
//                            'user' => __DIR__ . '/../view'
//                        ),
//                    ),
//                ),
//            ),
             'Zend\View\Resolver\TemplatePathStack' => array(
                'parameters' => array(
                    'paths'  => array(
                        'user' => __DIR__ . '/../view',
                    ),
                ),
            ),

            'User' => array(
                'parameters' => array(
                    'em' => 'doctrine_em'
                )
            ),
            'User\Manager' => array(
                'parameters' => array(
                    'em' => 'doctrine_em',
                )
            ),
            'User\Controller\UserController' => array(
                'parameters' => array(
                    'em' => 'doctrine_em',
                )
            ),
            'orm_driver_chain' => array(
                'parameters' => array(
                    'drivers' => array(
                        'Page' => array(
                            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                            'namespace' => __NAMESPACE__ . '\Entity',
                            'paths' => array('/../src/' . __NAMESPACE__ . '/Entity')
                        ),
                    ),
                ),
            ),
        ),
    ),
);