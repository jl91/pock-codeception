<?php

namespace Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="books")
 * @ORM\Entity(repositoryClass="\Domain\Repository\BooksRepository")
 */
class BooksEntity
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id_book", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;


    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=60, nullable=false)
     */
    public $name;

    /**
     * @var string
     * @ORM\Column(name="data", type="string", length=45, nullable=false)
     */
    public $data;

    /**
     * @var string
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    public $createdAt;

}