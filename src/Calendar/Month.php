<?php

namespace Calendar;



class Month
{

    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    public $month;
    public $year;





    //int  $month -> Mois Compris entre 1 et 12
    // $year L'année

    public function __construct(int $month = null, int $year = null)
    {

        if ($month === null || $month < 1 || $month > 12) {
            $month = intval(date('m'));
        }
        if ($year === null  || $month < 1 || $month > 12) {
            $year = intval(date('Y'));
        }
        // if ($month < 1 || $month > 12) {
        //     throw new \Exception("Le mois $month n'est pas valide");
        // }
        // if ($year < 1970) {
        //     throw new \Exception("L'anner est inférieur à 1970");
        // }

        $this->month = $month;
        $this->year = $year;
    }


    public function getStartingDay(): \DateTime
    {

        return new \DateTime("{$this->year}-{$this->month}-01");
    }




    /**
     * Retourne le mois en toute lettre 
     * @return string
     */
    public function toString(): string
    {
        return $this->months[$this->month - 1] . ' ' . $this->year;
    }

    public function getWeeks()
    {
        $start = $this->getStartingDay();
        $end = (clone $start)->modify('+1 month -1 day');
        $weeks = intval($end->format('W')) - intval($start->format('W')) + 1;
        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }


    public function withinMonth(\DateTime $date): bool
    {
        return $this->getStartingDay()->format('Y-m') === $date->format(('Y-m'));
    }


    //Retourne le mois suivant
    public function nextMonth(): Month
    {
        $month = $this->month + 1;
        $year = $this->year;
        if ($month > 12) {
            $month = 1;
            $year += 1;
        }
        return new Month($month, $year);
    }


    //Retourne le mois precedent
    public function previousMonth(): Month
    {
        $month = $this->month - 1;
        $year = $this->year;
        if ($month < 1) {
            $month = 12;
            $year -= 1;
        }
        return new Month($month, $year);
    }
}
