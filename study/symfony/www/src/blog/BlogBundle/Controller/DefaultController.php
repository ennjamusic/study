<?php

namespace blog\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use blog\BlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $products = $this->getDoctrine()
            ->getRepository('blogBlogBundle:Post')
            ->findAll();

        if (!$products) {
            throw $this->createNotFoundException();
        }
        return $this->render('blogBlogBundle:Default:index.html.twig', array('products' => $products));
    }

    public function showAction($id)
    {

        $product = $this->getDoctrine()
            ->getRepository('blogBlogBundle:Post')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }
        return $this->render('blogBlogBundle:Default:view.html.twig', array('product' => $product));
    }

    public function addAction(Request $request)
    {


        $product = new Post();
        $form = $this->createFormBuilder($product)
            ->add('title', 'textarea')
            ->add('text', 'textarea')
            ->getForm();

        if ($request->getMethod() == 'POST') {

            $form->submit($request);
            if ($form->isValid()) {
                $product->setTitle($form->getData()->getTitle());
                $product->setText($form->getData()->getText());

                $validator = $this->get('validator');
                $errors = array();
                $errors = $validator->validate($product);

                if (count($errors) > 0) {
                    return new Response(print_r($errors, true));
                } else {
                    $em = $this->getDoctrine()->getEntityManager();
                    $em->persist($product);
                    $em->flush();
                }
//                return $this->redirect($this->generateUrl('task_success'));
            }
        }

        return $this->render('blogBlogBundle:Default:add.html.twig', array('form' => $form->createView()));
    }
}
