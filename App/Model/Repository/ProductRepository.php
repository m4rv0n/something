<?php

namespace App\Model\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository {
    public function findById($id) {
        return $this->find($id);
    }
}