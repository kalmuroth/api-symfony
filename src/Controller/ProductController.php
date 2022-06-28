<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Product;
use App\Form\Type\RegistrationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Doctrine\Persistence\ManagerRegistry;

use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;

class ProductController extends AbstractController
{
    /**
     * @Post(
     *      path = "/products",
     *      name = "app_product_add",
     *      requirements = {"id"="\d+"}
     * )
     * @View
     * @ParamConverter("product", converter="fos_rest.request_body")     
     */
    public function addAction(Product $product, ManagerRegistry $doctrine){
        $em = $doctrine->getManager();
        $em->persist($product);
        $em->flush();
        return $product;
    }

    /**
     * @Get(
     *      path = "/products/{id}",
     *      name = "app_product_get",
     *      requirements = {"id"="\d+"}
     * )
     * @View   
     */
    public function getAction(Product $product, ManagerRegistry $doctrine){
        $em = $doctrine->getManager();
        $em->persist($product);
        $em->flush();
        return $product;
    }

    /**
     * @Put(
     *      path = "/products/{id}",
     *      name = "app_product_put",
     *      requirements = {"id"="\d+"}
     * )
     * @View
     * @ParamConverter("product", converter="fos_rest.request_body")     
     */
    public function putAction(Product $product, ManagerRegistry $doctrine){
        $em = $doctrine->getManager();
        $em->persist($product);
        $em->flush();
        return $product;
    }
}