<?php

namespace Tableless\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class IndexControlerController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('TablelessModelBundle:Post')->findAllInOrder();

        /** @var  $paginator */
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate($posts, $request->query->get('page', 1), 3);

        return [
            'pagination' => $pagination,
        ];
    }

    /**
     * @Route("/show/{id}", name="show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('TablelessModelBundle:Post')->find($id);

        if (!$post) {
            throw $this->createNotFoundException('O post não existe! Volte para home!');
        }

        return [
            'post' => $post,
        ];
    }
}
