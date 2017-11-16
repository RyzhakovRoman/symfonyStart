<?php
//namespace AppBundle\Controller;

//use AppBundle\Entity\Product;
//use AppBundle\Entity\Task;
//use AppBundle\Form\TaskType;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\HttpFoundation\JsonResponse;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;

//class FormController extends Controller
//{
//    /**
//     * @Route("/dql_query")
//     */
//    public function dqlQueryAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $query = $em->createQuery('SELECT p
//            FROM AppBundle:Product p
//            WHERE p.price > :price
//            ORDER BY p.price ASC')->setParameter('price', 19.80);
//
//        $pr = $query->getResult();
//
//        if (!$pr) {
//            throw $this->createNotFoundException('no product found for');
//        }
//
//        return $this->render('entity/entity.html.twig', [ 'prod' => $pr ]);
//    }
//
//    /**
//     * @Route("/delete/{id}")
//     */
//    public function deleteAction($id)
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $pr = $this->getDoctrine()->getRepository(Product::class)->find($id);
//
//        if (!$pr) {
//            throw $this->createNotFoundException('no product found for id ' . $id);
//        }
//
//        $em->remove($pr);
//        $em->flush();
//
//        return new Response('deleted');
//    }
//
//    /**
//     * @Route("/update/{id}")
//     */
//    public function updateAction($id)
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $pr = $em->getRepository(Product::class)->find($id);
//
//        if (!$pr) {
//            throw $this->createNotFoundException(
//                'Product not found, id = ' . $id
//            );
//        }
//
//        $pr->setName('New product name2');
//
//        $em->flush();
//
//        return $this->render('entity/entity.html.twig', [
//            'prod' => $pr
//        ]);
////        return $this->redirectToRoute('extract', ['id' => $id]);
//    }
//
//    /**
//     * @Route("/extract/{id}", name="extract")
//     */
//    public function extractAction($id)
//    {
//        $pr = $this->getDoctrine()->getRepository(Product::class)
//            ->find($id);
//
//        if (!$pr) {
//            throw $this->createNotFoundException('no product found for id ' . $id);
//        }
//
//        return $this->render('entity/entity.html.twig', [
//            'product' => $pr
//        ]);
//    }
//
//    /**
//     * @Route("/add_product")
//     */
//    public function addProductAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $pr = new Product();
//        $pr
//            ->setName('keyboard')
//            ->setPrice(19.99)
//            ->setDescription('Ergonomic and stylish');
//
//        $em->persist($pr);
//
//        $em->flush();
//
//        return new Response('Продукт сохранен с id = ' . $pr->getId());
//    }
//
//    /**
//     * @Route("/form", name="form")
//     */
//    public function formAction(Request $request)
//    {
//        $task = new Task();
//
//        $form = $this->createFormBuilder($task)
//            ->add('task', TextType::class, ['label' => 'Task name'])
//            ->add('dueDate', \Symfony\Component\Form\Extension\Core\Type\DateType::class, ['widget' => 'single_text'])
//            ->add('save', SubmitType::class, array('label' => 'Create Post'))
//            ->getForm();
//
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            var_dump($form->getData());
//            return $this->redirectToRoute('task_success');
//        }
//
//        return $this->render('forms/form.html.twig', [
//            'form' => $form->createView()
//        ]);
//    }
//
//    /**
//     * @Route("/form2", name="form2")
//     */
//    public function form2Action(Request $request)
//    {
//        $task = new Task();
//
//        $form = $this->createForm(TaskType::class, $task);
//    }
//
//    /**
//     * @Route("/task_success", name="task_success")
//     *
//     * @return Response
//     */
//    public function successAction()
//    {
//        return new Response('Форма успешно отправленна');
//    }
//
////    /**
////     * Matches /blog exactly
////     *
////     * @Route("/blog/{page}", name="blog_list", requirements={"page": "\d+"})
////     */
////    public function listAction(Request $request, $page = 1)
////    {
//////        return new Response('listAction ---- ' . $page . ' url ---- ' . $this->generateUrl('blog_list', array('page' => $page)));
////    }
////    /**
////     * @Route("/img/{name}", name="img")
////     *
////     * @param $name
////     */
////    public function showImgAction($name)
////    {
////        return $this->file('img/Two-Monitors-Wallpapers.jpg');
////    }
//}