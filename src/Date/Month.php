<?php

namespace App\Date;


class Month {

    private $months = ['Janvier','Février','Mars', 'Avril', 'Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'];






    // $month -> Mois Compris entre 1 et 12
    // $year L'année

    public function __construct(int $month,int $year)
    {
        if ($month < 1 || $month > 12) {
            throw new \Exception("Le mois $month n'est pas valide");
        }
        if ($year < 1970) {
            throw new \Exception("L'anner est inférieur à 1970");
        }
    }




    /**
     * Retourne le mois en toute lettre (ex:mars 2022)
     * @return string
     */
    public function __toString(): string 
    {
        
    }
}