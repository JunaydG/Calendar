<?php

namespace Calendar;

use DateTime;

class Event {

    private $id;

    private $name;

    private $description;

    private $start;

    private $end;

   
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getName()
    {
        return $this->name;
    }

    
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

  
    public function getDescription()
    {
        return $this->description ?? '';
    }

   
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

   
    public function getStart(): \DateTime
    {
        return new \DateTime($this->start);
    }

   
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

  
    public function getEnd(): \DateTime
    {
        return new \DateTime($this->end);
    }

   
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }
}