<?php

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FilmsController extends Controller
{
    public function indexAction()
    {
        //$films = $this->getDoctrine()->getRepository("TroiswaBackBundle:films")->findAll();
        $films = $this->getDoctrine()->getRepository("TroiswaBackBundle:films")->findBy([], ['titre' => 'ASC']);




        return $this->render('TroiswaBackBundle:film:index.html.twig',["allFilms"=>$films]);
    }

    public function showAction($id)
    {
        $film = $this->getDoctrine()->getRepository("TroiswaBackBundle:films")->find($id);

        return $this->render('TroiswaBackBundle:film:show.html.twig',["Film"=>$film]);

    }



}