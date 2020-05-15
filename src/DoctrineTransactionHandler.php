<?php

declare(strict_types=1);

namespace Venomousboy\TransactionManager;

use Doctrine\ORM\EntityManagerInterface;

final class DoctrineTransactionHandler implements TransactionHandler
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function begin(): void
    {
        $this->getEntityManager()->beginTransaction();
    }

    public function commit(): void
    {
        $this->getEntityManager()->flush();
        $this->getEntityManager()->commit();
        $this->clear();
    }

    public function rollback(): void
    {
        $this->clear();
        $this->getEntityManager()->rollback();
    }

    public function clear(): void
    {
        if (!$this->getEntityManager()->getConnection()->isTransactionActive()) {
            $this->getEntityManager()->clear();
        }
    }

    private function getEntityManager(): EntityManagerInterface
    {
        return $this->em;
    }
}