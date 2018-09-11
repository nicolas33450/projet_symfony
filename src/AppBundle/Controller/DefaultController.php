<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Unirest;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @route("/test",name="test")
     */
    public function testAction(Request $request){
        return $this->render('default/test.html.twig');
    }

    /**
     * @route("/accueil",name="accueil")
     */
    public function accueil(Request $request){
        return $this->render('default/accueil.html.twig');
    }

     /**
     * @route("/presentation",name="presentation")
     */
    public function presentation(Request $request){
        $users = [];
        
        $user["nom"] = "Dupont";
        $user["prenom"] = "Pierre";
        $user["pays"] = "France";
        array_push($users,$user);
        
        $user["nom"] = "Durand";
        $user["prenom"] = "jaky";
        $user["pays"] = "Belgique";
        array_push($users,$user);
       
        return $this->render('default/presentation.html.twig',['users'=>$users]);
    }

     /**
     * @route("/galerie",name="galerie")
     */
    public function galerie(Request $request){
        $users = [];
        $user["photo"] = "../image/nain.png";
        $user["nom"] = "Dupont";
        $user["prenom"] = "Pierre";
        $user["pays"] = "France";
        array_push($users,$user);
        $user["photo"] = "../image/new_york.jpeg";
        $user["nom"] = "Durand";
        $user["prenom"] = "jaky";
        $user["pays"] = "Belgique";
        array_push($users,$user);
        $user["photo"] = "../image/nain.png";
        $user["nom"] = "Dupont";
        $user["prenom"] = "Pierre";
        $user["pays"] = "France";
        array_push($users,$user);
        $user["photo"] = "../image/new_york.jpeg";
        $user["nom"] = "Durand";
        $user["prenom"] = "jaky";
        $user["pays"] = "Belgique";
        array_push($users,$user);
        $user["photo"] = "../image/nain.png";
        $user["nom"] = "Dupont";
        $user["prenom"] = "Pierre";
        $user["pays"] = "France";
        array_push($users,$user);
        $user["photo"] = "../image/new_york.jpeg";
        $user["nom"] = "Durand";
        $user["prenom"] = "jaky";
        $user["pays"] = "Belgique";
        array_push($users,$user);
        
        return $this->render('default/galerie.html.twig',['users'=>$users]);
        
    }

     /**
     * @route("/contact",name="contact")
     */
    public function contact(Request $request){
        return $this->render('default/contact.html.twig');
    }

     /**
     * @route("/portfolio",name="portfolio")
     */
    public function portfolio(Request $request){

        $response = unirest\Request::get('http://api.themoviedb.org/3/movie/top_rated?sort_by=popularity.desc&language=fr-FR&api_key=87dfa1c669eea853da609d4968d294be');
        return $this->render('default/portfolio.html.twig',['reponse'=>$response->body]);
    }

    /**
     * @route("/article/{id}",name="article",requirements={"id":"\d+"})
     */
    public function articleAction(Request $request, $id){

        $response = unirest\Request::get('http://api.themoviedb.org/3/movie/'.$id.'?language=fr-FR&api_key=87dfa1c669eea853da609d4968d294be');
        return $this->render('default/article.html.twig',['reponse'=>$response->body,'id'=>$id]);
    }
}
