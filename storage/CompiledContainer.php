<?php
/**
 * This class has been auto-generated by PHP-DI.
 */
class CompiledContainer extends DI\CompiledContainer{
    const METHOD_MAPPING = array (
  'entity-manager' => 'get1',
  'PhoneBook\\Repositories\\PersistRepository' => 'get2',
  'PhoneBook\\Repositories\\ContactRepository' => 'get3',
  'PhoneBook\\Repositories\\PhoneBookRepository' => 'get4',
);

    protected function get1()
    {
        return $this->resolveFactory(static function (\Psr\Container\ContainerInterface $container) {
    return \App\Factories\DoctrineFactory::EntityManager();
}, 'entity-manager');
    }

    protected function get2()
    {
        return $this->resolveFactory(static function (\Psr\Container\ContainerInterface $container) {
    return new \App\Infrastructure\Database\DoctrinePersistRepository($container->get('entity-manager'));
}, 'PhoneBook\\Repositories\\PersistRepository');
    }

    protected function get3()
    {
        return $this->resolveFactory(static function (\Psr\Container\ContainerInterface $container) {
    return new \App\Infrastructure\Database\DoctrineContactRepository($container->get('entity-manager'));
}, 'PhoneBook\\Repositories\\ContactRepository');
    }

    protected function get4()
    {
        return $this->resolveFactory(static function (\Psr\Container\ContainerInterface $container) {
    return new \App\Infrastructure\Database\DoctrinePhoneBookRepository($container->get('entity-manager'));
}, 'PhoneBook\\Repositories\\PhoneBookRepository');
    }

}
