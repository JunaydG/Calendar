<?php


class Event
{

    private $id;

    private $name;

    private $description;

    private $start;

    private $end;

    private $categorie;




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


    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }


    public function getDescription()
    {
        return $this->description ?? '';
    }


    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }


    public function getStart(): \DateTime
    {
        return new \DateTime($this->start);
    }


    public function setStart(string $start)
    {
        $this->start = $start;

        return $this;
    }


    public function getEnd(): \DateTime
    {
        return new \DateTime($this->end);
    }


    public function setEnd(string $end)
    {
        $this->end = $end;

        return $this;
    }




    public function getCategorie()
    {
        return $this->categorie;
    }


    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }
}
