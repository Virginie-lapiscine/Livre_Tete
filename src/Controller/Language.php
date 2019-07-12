<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Language extends AbstractController
{
    const FRTITLE = 'CGV';
    const ENTITLE = 'CGV';
    const FRTEXT = 'Texte FR';
    const ENTEXT = 'Text EN';


    public function getTitleFrench(){
        return self :: FRTITLE;
    }
    public function getTextFrench(){
        return self :: FRTEXT;
    }


}