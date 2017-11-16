<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineController extends Controller
{
    /**
     * @Route("/save")
     */
    public function saveAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pr = new Product();
        $pr->setName("Булка")
            ->setPrice(111)
            ->setDescription("Продукт");

        $em->persist($pr);

        // выполняет запрос
        $em->flush();

        return new Response("Продукт с id = {$pr->getId()} сохранен");
    }
    /**
     * @Route("/show/{productId}")
     */
    public function showAction($productId)
    {
        $pr = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($productId);

        if (!$pr) {
            throw $this->createNotFoundException(
                "Продукт с id = {$productId} не найден"
            );
        }

        return new Response("Продукт с id = {$productId} найден!");
    }
    /**
     * @Route("/update/{productId}/{name}")
     */
    public function updateAction($productId, $name)
    {
        $em = $this->getDoctrine()->getManager();
        $pr = $em->getRepository(Product::class)->find($productId);

        if (!$pr) {
            throw $this->createNotFoundException(
                "Продукт с id = {$productId} не найден"
            );
        }

        $pr->setName($name);
        $em->flush();

        return new Response("В продукте с id = {$pr->getId()} изменено имя! Новое имя {$pr->getName()}");
    }
    /**
     * @Route("/products")
     */
    public function productsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $prs = $em->getRepository(Product::class)
                ->findAll();
        dump($prs);
        die();
    }
}