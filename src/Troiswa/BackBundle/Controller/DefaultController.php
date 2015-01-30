<?php

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TroiswaBackBundle:Default:index.html.twig', array('name' => $name));
    }
    public function testAction()
    {
        //return new Response("ca va ou bien");
        return $this->render("TroiswaBackBundle:Default:test.html.twig");
    }
    public function prenomAction()
    {
        $prenom = "greg";
        $age = 42;
        $acteurs=[
            ["prenom"=>"Bruce","nom"=>"WILLIS"],
            ["prenom"=>"Harrison","nom"=>"FORD"],
            ["prenom"=>"José","nom"=>"GARCIA"],
        ];
        //return new Response("ca va ou bien");
        return $this->render("TroiswaBackBundle:Default:prenom.html.twig",
            [
                "firstPrenom"=>$prenom,
                "myAge"=>$age,
                "allActeurs" =>$acteurs
            ]);
    }

    public function testActeur()
    {
        return $this->render("TroiswaBackBundle:Default:prenom.html.twig");
    }

    public function themeAction()
    {
        return $this->render("TroiswaBackBundle:Default:theme.html.twig");
    }
}
