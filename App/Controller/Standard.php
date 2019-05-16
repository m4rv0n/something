<?php

namespace App\Controller;

use App\Model\Product;
use App\Model\Repository\ProductRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Framework\Model;
use Framework\View;

class Standard extends \Framework\Controller {
    /**
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function indexAction () {
        $product_repository = new ProductRepository(Model::getEntityManager(), new ClassMetadata('App\Model\Product'));

        $products = $product_repository->findAll();
        View::renderTemplate('Base.html', ['products' => $products]);
    }

    /**
     * @param $amount
     *
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function createAction ($amount) {
        for ($x = 1; $x <= $amount; $x++) {
            $product = new Product();
            $product->setName('Product_' . $x);
            $product->setDescription('Product_Description_' . $x);
            $product->setImage('/static/images/product_' . $x . '.jpg');
            $product->setPrice($x);

            Model::getEntityManager()->persist($product);
            Model::getEntityManager()->flush();
        }
    }
}