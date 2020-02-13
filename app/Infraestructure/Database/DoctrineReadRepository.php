<?php

namespace App\Infrastructure\Database;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use PhoneBook\Repositories\ReadRepository;

abstract class DoctrineReadRepository extends EntityRepository implements ReadRepository
{
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata($this->getEntity()));
    }

    /**
     * @param string $alias
     * @param null   $indexBy
     *
     * @return QueryBuilder
     */
    public function createQueryBuilder($alias, $indexBy = null)
    {
        return
                $this->_em->createQueryBuilder()
                    ->select($alias)
                    ->from($this->_entityName, $alias, $indexBy);
    }

    abstract public function getEntity();

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        $entity = $this->findOne($id);

        if (! $entity) {
            throw new EntityNotFoundException($this->getEntity());
        }

        return $entity;
    }

    /**
     * {@inheritdoc}
     */
    public function findOne($id)
    {
        return $this->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->findAll();
    }

    public function refresh($entity)
    {
        $this->_em->refresh($entity);
    }
}
