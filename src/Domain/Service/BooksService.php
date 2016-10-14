<?php

namespace Domain\Service;


use Doctrine\ORM\EntityManager;
use Domain\Entity\BooksEntity;
use Domain\Repository\MessagesTrait;
use Domain\Repository\RepositoyInterface;

class BooksService implements RepositoyInterface
{

    private $messages = null;

    private $entityManager = null;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(\stdClass $data)
    {
        try {

            $em = $this->entityManager;
            $repository = $em->getRepository(BooksEntity::class);
            $entity = $repository->findOneById($data->id);

            if (!$entity instanceof BooksEntity) {
                $entity = new BooksEntity();
                $entity->name = $data->name;
                $entity->data = $data->data;
                $entity->createdAt = new \DateTime('now');

                $em->persist($entity);
                $em->flush();
                $this->messages = "OK";
                return true;
            }

            $entity->name = $data->name;
            $entity->data = $data->data;
            $em->merge($entity);
            $em->flush();
            $this->messages = "OK";
            return true;

        } catch (\Exception $e) {
            var_dump($e->getMessage());
            exit();
            $this->messages = "NOK";
            return false;
        }
    }

    use MessagesTrait;

}