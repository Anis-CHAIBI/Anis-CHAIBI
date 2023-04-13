<?php
class Locations
{
    private ?int $num_loc = null;
    private ?DateTime  $d_dep = null;
    private ?DateTime $d_arr = null;
    private ?string $etat_loc = null;
    private ?string $duree_loc = null;

    public function __construct($nu, $de, $ar, $el, $dl)
    {
        
        $this->num_loc = $nu;
        $this->d_dep = $de;
        $this->d_arr = $ar;
        $this->etat_loc = $el;
        $this->duree_loc = $dl;
    }

    /**
     * Get the value of num_loc
     */
    public function getnum_loc()
    {
        return $this->num_loc;
    }

    /**
     * Get the value of d_dep
     */
    public function getd_dep()
    {
        return $this->d_dep;
    }

    /**
     * Set the value of d_dep
     *
     * @return  self
     */
    public function setd_dep($d_dep)
    {
        $this->d_dep = $d_dep;

        return $this;
    }

    /**
     * Get the value of d_arr
     */
    public function getd_arr()
    {
        return $this->d_arr;
    }

    /**
     * Set the value of d_arr
     *
     * @return  self
     */
    public function setd_arr($d_arr)
    {
        $this->d_arr = $d_arr;

        return $this;
    
    }

    /**
     * Get the value of etat_loc
     */
    public function getetat_loc()
    {
        return $this->etat_loc;
    }

    /**
     * Set the value of etat_loc
     *
     * @return  self
     */
    public function setetat_loc($etat_loc)
    {
        $this->etat_loc = $etat_loc;

        return $this;
    }

    /**
     * Get the value of duree_loc
     */
    public function getduree_loc()
    {
        return $this->duree_loc;
    }

    /**
     * Set the value of duree_loc
     *
     * @return  self
     */
    public function setduree_loc($duree_loc)
    {
        $this->duree_loc = $duree_loc;

        return $this;
    }

    
}
?>