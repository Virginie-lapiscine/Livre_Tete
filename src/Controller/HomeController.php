<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    // déclaration du tableau de données en attribut de la classe
    private $articles = [
                1 => [
                'title' => 'Article 1',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
                'image' => 'https://gal.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Fprismamedia_people.2F2017.2F07.2F03.2Fcd76a89a-9f7f-44fc-a066-06bbb34281af.2Ejpeg/2216x1536/quality/80/charles-pasqua.jpeg'
                ],
                2 => [
                'title' => 'Article 2',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
                'image' => 'http://s1.lprs1.fr/images/2018/05/15/7716630_a7834498-5761-11e8-aba9-269965d92401-1_940x500.jpg'
                ],
                3 => [
                'title' => 'Article 3',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
                'image' => 'https://tel.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2FTEL.2Enews.2F2018.2F01.2F12.2F28453de3-9265-4ba8-9b3d-1dae3e693d03.2Ejpeg/1150x495/crop-from/top/une-nouvelle-emission-pour-jamy-gourmaud.jpg'
                ],
                4 => [
                'title' => 'Article 4',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
                'image' => 'https://static.cnews.fr/sites/default/files/styles/image_640_360/public/jean-lassalle_0.jpg?itok=kzxd2dc3'
                ],
                5 => [
                'title' => 'Article 5',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
                'image' => 'https://www.lamanchelibre.fr/photos/maxi/649833.jpg'
                ],
                6 => [
                'title' => 'Article 6',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
                'image' => 'https://img.cdandlp.com/2016/10/imgL/118348804.jpg'
                ]
            ];

    /**
     * @Route("/home", name="home_page")
     * retourne 1 page html compilée par twig
     * passe le tableau articles en paramètre
     **/
    public function homePath(){
        // pour renvoyer les 3 derniers éléments du tableau
        // privilégier le slice dans le controller plutôt que dans le twig
        // $last_articles = array_slice($this->articles, -3);
        return $this->render('home.html.twig',
            [
                'articles' => $this->articles
                // remplacer la ligne du dessus par 'articles => $last_articles
                // dans le cas ou on fait le slice dans le controller
            ]
        );
    }

    /**
     * @Route("/articles", name="list_page")
     * retourne 1 page html
     **/
    public function listPath(){

        return $this->render('list_articles.html.twig',
            [
                'articles' => $this->articles
            ]
        );
    }

    /**
     * @Route("/articles/{id}", name="article_page")
     * ajout d'une wildcard dans le chemin pour l'id de l'article
     *
     * ajout du paramètre $id à la méthode article()
     **/
    public function article($id){

        return $this->render('article.html.twig',
            [
                // on récupère l'élément du tableau correspondant à l'id passé en paramètre
                'article' => $this->articles[$id]
            ]
        );
    }
}