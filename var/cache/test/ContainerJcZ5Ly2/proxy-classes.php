<?php

namespace ContainerJcZ5Ly2;

include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/Controller/ValueResolverInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/event-dispatcher/EventSubscriberInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/Controller/ArgumentResolver/RequestPayloadValueResolver.php';

class RequestPayloadValueResolverGhostB42fd45 extends \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestPayloadValueResolver implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'serializer' => [parent::class, 'serializer', parent::class],
        "\0".parent::class."\0".'translator' => [parent::class, 'translator', parent::class],
        "\0".parent::class."\0".'validator' => [parent::class, 'validator', parent::class],
        'serializer' => [parent::class, 'serializer', parent::class],
        'translator' => [parent::class, 'translator', parent::class],
        'validator' => [parent::class, 'validator', parent::class],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('RequestPayloadValueResolverGhostB42fd45', false)) {
    \class_alias(__NAMESPACE__.'\\RequestPayloadValueResolverGhostB42fd45', 'RequestPayloadValueResolverGhostB42fd45', false);
}
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/src/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManagerGhost85163ea extends \Doctrine\ORM\EntityManager implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'cache' => [parent::class, 'cache', null],
        "\0".parent::class."\0".'closed' => [parent::class, 'closed', null],
        "\0".parent::class."\0".'config' => [parent::class, 'config', null],
        "\0".parent::class."\0".'conn' => [parent::class, 'conn', null],
        "\0".parent::class."\0".'eventManager' => [parent::class, 'eventManager', null],
        "\0".parent::class."\0".'expressionBuilder' => [parent::class, 'expressionBuilder', null],
        "\0".parent::class."\0".'filterCollection' => [parent::class, 'filterCollection', null],
        "\0".parent::class."\0".'metadataFactory' => [parent::class, 'metadataFactory', null],
        "\0".parent::class."\0".'proxyFactory' => [parent::class, 'proxyFactory', null],
        "\0".parent::class."\0".'repositoryFactory' => [parent::class, 'repositoryFactory', null],
        "\0".parent::class."\0".'unitOfWork' => [parent::class, 'unitOfWork', null],
        'cache' => [parent::class, 'cache', null],
        'closed' => [parent::class, 'closed', null],
        'config' => [parent::class, 'config', null],
        'conn' => [parent::class, 'conn', null],
        'eventManager' => [parent::class, 'eventManager', null],
        'expressionBuilder' => [parent::class, 'expressionBuilder', null],
        'filterCollection' => [parent::class, 'filterCollection', null],
        'metadataFactory' => [parent::class, 'metadataFactory', null],
        'proxyFactory' => [parent::class, 'proxyFactory', null],
        'repositoryFactory' => [parent::class, 'repositoryFactory', null],
        'unitOfWork' => [parent::class, 'unitOfWork', null],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('EntityManagerGhost85163ea', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManagerGhost85163ea', 'EntityManagerGhost85163ea', false);
}
