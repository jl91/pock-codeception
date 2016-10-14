<?php

namespace Domain\Repository;


trait MessagesTrait
{
    public function getMessages(){
        return $this->messages;
    }
}