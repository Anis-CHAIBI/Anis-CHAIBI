<?php
class Reservation
{
    private ?int $IdReser = null;
    private ?DateTime $dateReser = null;
   // private ?Date $per_Reser = null;
   // private ?int $cout_presta = null;
    private ?string $types_transport = null;

    public function __construct($id, $dr,/*$pr,$cp,*/ $tt)
    {
        $this->IdReser = $id;
        $this->dateReser = $dr;
        //$this->per_Reser = $pr;
        //$this->cout_presta = $cp;
        $this->types_transport = $tt;
    }

    /**
     * Get the value of idreser
     */
    public function getIdReser()
    {
        return $this->IdReser;
    }

    

    
    /**
     * Get the value of dateReser
     */
    public function getdateReser()
    {
        return $this->dateReser;
    }

    /**
     * Set the value of dateReser
     *
     * @return  self
     */
    public function setdateReser($dateReser)
    {
        $this->dateReser = $dateReser;

        return $this;
    }

    /**
     * Get the value of per_Reser
     */
    /*public function getper_Reser()
    {
        return $this->per_Reser;
    }*/

    /**
     * Set the value of per_Reser
     *
     * @return  self
     */
   /* public function setper_Reser($per_Reser)
    {
        $this->per_eReser = $per_Reser;

        return $this;
    }*/

    /**
     * Get the value of cout_presta
     */
    /*public function getcout_presta()
    {
        return $this->cout_presta;
    }*/

    /**
     * Set the value of cout_presta
     *
     * @return  self
     */
   /* public function setcout_presta($cout_presta)
    {
        $this->cout_presta = $cout_presta;

        return $this;
    }*/

    /**
     * Get the value of types_transport
     */
    public function gettypes_transport()
    {
        return $this->types_transport;
    }

    /**
     * Set the value of types_transport
     *
     * @return  self
     */
    public function settypes_transport($types_transport)
    {
        $this->types_transport = $types_transport;

        return $this;
    }
}
?>