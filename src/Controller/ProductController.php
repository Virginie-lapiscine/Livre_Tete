<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $products = [
        [
            'title' => 'Trotinette 1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
            'image' => 'https://images.oxybul.com/Photo/IMG_FICHE_PRODUIT/Image/500x500/3/324168.jpg',
            'id' => 1
        ],
        [
            'title' => 'Trotinette 2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
            'image' => 'https://images.oxybul.com/Photo/IMG_FICHE_PRODUIT/Image/500x500/3/324168.jpg',
            'id' => 2
        ],
        [
            'title' => 'Trotinette 3',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
            'image' => 'https://images.oxybul.com/Photo/IMG_FICHE_PRODUIT/Image/500x500/3/324168.jpg',
            'id' => 3
        ],
        [
            'title' => 'Trotinette 4',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
            'image' => 'https://images.oxybul.com/Photo/IMG_FICHE_PRODUIT/Image/500x500/3/324168.jpg',
            'id' => 4
        ],
        [
            'title' => 'Trotinette 5',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
            'image' => 'https://images.oxybul.com/Photo/IMG_FICHE_PRODUIT/Image/500x500/3/324168.jpg',
            'id' => 5
        ],
        [
            'title' => 'Trotinette 6',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
            'image' => 'https://images.oxybul.com/Photo/IMG_FICHE_PRODUIT/Image/500x500/3/324168.jpg',
            'id' => 6
        ],
        [
            'title' => 'Trotinette 7',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
            'image' => 'https://images.oxybul.com/Photo/IMG_FICHE_PRODUIT/Image/500x500/3/324168.jpg',
            'id' => 7
        ],
        [
            'title' => 'Trotinette 8',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum explicabo fuga ipsa nostrum officiis placeat quas quisquam ullam unde vitae. Blanditiis dolore enim perspiciatis quos rerum similique sint ut? Laboriosam.',
            'image' => 'https://images.oxybul.com/Photo/IMG_FICHE_PRODUIT/Image/500x500/3/324168.jpg',
            'id' => 8
        ]

    ];

    /**
     * @Route("/produits", name="list_products")
     *
     * méthode qui envoie en paramètre le tableau products vers le fichier twig product_list
     * et retourne en réponse le fichier html compilé par twig
     * */
    public function listProducts(){
        return $this->render('product_list.html.twig',
            [
                'products' => $this->products
            ]
        );
    }

    /**
     * @Route("/produits/{id}", name="show_product")
     *
     * envoie en paramètre les données du produit dont l'id est passé dans l'url
     * retourne en réponse le fichier product compilé
     * */
    public function showProduct($id){
        // pour chaque élément du tableau products, je compare la valeur de la clé 'id' à $id
        foreach($this->products as $product){
            // si la condition est true, je déclare et assigne les variables de l'élément sélectionné
            if($product['id'] == $id){
                $title = $product['title'];
                $content = $product['content'];
                $image = $product['image'];
            }

        }
        return $this->render('product.html.twig',
            [
                'title' => $title,
                'content' => $content,
                'image' => $image
            ]
        );
    }

    /**
     * @Route("/cgv", name="cgv")
     */
    public function viewCgv(Request $request){
        $langue = $request->query->get('lang');
        return $this->render('cgv.html.twig',
            [
                'langue' => $langue
            ]
        );
    }

    /**
     * @Route("/sidebar", name="sidebar")
     */
    public function getProduct(){

        return $this->render('product2.html.twig',
            [
                'product' => $this->products[1]
            ]);
    }
}