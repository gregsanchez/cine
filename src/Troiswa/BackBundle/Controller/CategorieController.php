<?php

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategorieController extends Controller
{
    public function indexAction()
    {
        $categories=$this->getDoctrine()->getRepository("TroiswaBackBundle:categories")->findAll();

        return $this->render('TroiswaBackBundle:categorie:index.html.twig',["allcategories"=>$categories]);
    }

}