<?php

namespace Troiswa\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Troiswa\BackBundle\Entity\acteurs;
use Troiswa\BackBundle\Form\acteursType;

class ActeurController extends Controller
{
    public function indexAction()
    {
        $acteurs=$this->getDoctrine()->getRepository("TroiswaBackBundle:acteurs")->findAll();


        /*[
        [
            "id"=>1,
            "prenom" => "josé",
            "nom" => "garcia",
            "sexe" => "Homme",
            "biographie" => "lorem ipsum"
        ],
        [
            "id"=>2,
            "prenom" => "mel",
            "nom" => "gibson",
            "sexe" => "Homme",
            "biographie" => "lorem ipsum"
        ],
        [
            "id"=>3,
            "prenom" => "Leonardo",
            "nom" => "Dicaprio",
            "sexe" => "Homme",
            "biographie" => "lorem ipsum"
        ],
    ] ;*/

        return $this->render('TroiswaBackBundle:acteur:index.html.twig',["allActeurs"=>$acteurs]);
    }


    public function showAction($id)
    {
        $acteur = $this->getDoctrine()->getRepository("TroiswaBackBundle:acteurs")->find($id);

            if(empty($acteur))
            {throw $this->createNotFoundException("l'acteur n'existe pas");
            }


        return $this->render('TroiswaBackBundle:acteur:show.html.twig',["Acteur"=>$acteur]);

    }


    public function addAction(Request $request)
    {
        $acteur = new acteurs();
       // $acteur ->setPrenom("greg");

        /*$formulaire= $this->createFormBuilder($acteur)
           ->add("prenom","text")
            ->add("nom","text")
            ->add("dateDeNaissance","date")
            ->add("sexe",'choice', array(
                'choices'   => array(0 => 'Masculin', 1 => 'Féminin'),
                'expanded'  => true,
                'data' => 0
            ))
            ->add("biographie","textarea")
            ->add("fichier","file")
            ->add("ajouter","submit")
           ->getForm();
        */

        $formulaire= $this->createForm(new acteursType(), $acteur)->add("ajouter","submit");

        //if("POST" == $request->getMethod())

        //{
            //$formulaire->bind($request);

        $formulaire->handleRequest($request);

            if ($formulaire->isValid())
            {
                $acteur->upload();
                $em = $this->getDoctrine()->getManager();
                $em->persist($acteur);
                $em->flush();
            }
       // }
            return $this->render('TroiswaBackBundle:acteur:add.html.twig',["formulaire"=>$formulaire->createView()]);
    }




        public function editerAction($id,Request $request)
        {
            $acteur = $this->getDoctrine()->getRepository("TroiswaBackBundle:acteurs")->find($id);

            $formulaire= $this->createFormBuilder($acteur)
                ->add("prenom","text")
                ->add("nom","text")
                ->add("dateDeNaissance","date")
                ->add("sexe",'choice', array(
                    'choices'   => array(0 => 'Masculin', 1 => 'Féminin'),
                    'required'  => false,
                ))
                ->add("biographie","textarea")
                ->add("fichier","file")
                ->add("ajouter","submit")
                ->getForm();

            //if("POST" == $request->getMethod())

            //{
            //$formulaire->bind($request);

            $formulaire->handleRequest($request);

            if ($formulaire->isValid())

            {
                $acteur->upload();
            }
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($acteur);
                $em->flush();
            }
            // }

            return $this->render('TroiswaBackBundle:acteur:add.html.twig',["formulaire"=>$formulaire->createView()]);

        }

}