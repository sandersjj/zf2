<?php
$settings = array(
    
    'use_annotations'   => true,
    
    'annotation_file'   => __DIR__ . '/../../vendor/DoctrineORMModule/vendor/doctrine-orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php',
    
    'production'        => false,
    
    'cache'             => 'array',
    
    'memcache'          => array(
        'host'  => '127.0.0.1',
        'port'  => '11211'
    ),
    
    'connection'        => array(
        'driver'    => 'pdo_mysql',
        'host'      => 'localhost',
        'port'      => '3306',
        'user'      => 'root',
        'password'  => '',
        'dbname'    => 'zf2'
    ),
    
    'driver'        => array(
        'class'     => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
        'namespace' => 'Application\Entity',
        'paths'     => array('module/Application/src/Application/Entity')
        
    ),
    
    'namespace_aliases' => array(),
    );
    
/**
 * YOU DO NOT NEED TO EDIT BELOW THIS LINE.
 */
$cache = array('array', 'memcache', 'apc');
if (!in_array($settings['cache'], $cache)) {
    throw new InvalidArgumentException(sprintf(
        'cache must be one of: %s',
        implode(', ', $cache)
    ));
}
$settings['cache'] = 'doctrine_cache_' . $settings['cache'];

return array(
    'doctrine_orm_module' => array(
        'annotation_file' => $settings['annotation_file'],
        'use_annotations' => $settings['use_annotations'],
    ),
    'di' => array(
        'instance' => array(
            'doctrine_memcache' => array(
                'parameters' => $settings['memcache']
            ),
            'orm_config' => array(
                'parameters' => array(
                    'opts' => array(
                        'entity_namespaces' => $settings['namespace_aliases'],
                        'auto_generate_proxies' => !$settings['production']
                    ),
                    'metadataCache' => $settings['cache'],
                    'queryCache'    => $settings['cache'],
                    'resultCache'   => $settings['cache'],
                )
            ),
            'orm_connection' => array(
                'parameters' => array(
                    'params' => $settings['connection']
                ),
            ),
            'orm_driver_chain' => array(
                'parameters' => array(
                    'drivers' => array(
                        'application_annotation_driver' => $settings['driver']
                    ),
                    'cache' => $settings['cache']
                )
            ),
        ),
    ),
);
    
    
