<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 20/09/2018
 * Time: 15:22
 */

class pecl
{
    private $id_pecl;
    private $str_month;
    private $str_year;
    private $str_situation;
    private $dbl_value;
    private $tb_beneficiaries_id_beneficiaries;
    private $tb_city_id_city;

    /**
     * pecl constructor.
     * @param $id_pecl
     * @param $str_month
     * @param $str_year
     * @param $str_situation
     * @param $dbl_value
     * @param $tb_beneficiaries_id_beneficiaries
     * @param $tb_city_id_city
     */
    public function __construct($id_pecl, $str_month, $str_year, $str_situation, $dbl_value, $tb_beneficiaries_id_beneficiaries, $tb_city_id_city)
    {
        $this->id_pecl = $id_pecl;
        $this->str_month = $str_month;
        $this->str_year = $str_year;
        $this->str_situation = $str_situation;
        $this->dbl_value = $dbl_value;
        $this->tb_beneficiaries_id_beneficiaries = $tb_beneficiaries_id_beneficiaries;
        $this->tb_city_id_city = $tb_city_id_city;
    }

    /**
     * @return mixed
     */
    public function getIdPecl()
    {
        return $this->id_pecl;
    }

    /**
     * @param mixed $id_pecl
     */
    public function setIdPecl($id_pecl): void
    {
        $this->id_pecl = $id_pecl;
    }

    /**
     * @return mixed
     */
    public function getStrMonth()
    {
        return $this->str_month;
    }

    /**
     * @param mixed $str_month
     */
    public function setStrMonth($str_month): void
    {
        $this->str_month = $str_month;
    }

    /**
     * @return mixed
     */
    public function getStrYear()
    {
        return $this->str_year;
    }

    /**
     * @param mixed $str_year
     */
    public function setStrYear($str_year): void
    {
        $this->str_year = $str_year;
    }

    /**
     * @return mixed
     */
    public function getStrSituation()
    {
        return $this->str_situation;
    }

    /**
     * @param mixed $str_situation
     */
    public function setStrSituation($str_situation): void
    {
        $this->str_situation = $str_situation;
    }

    /**
     * @return mixed
     */
    public function getDblValue()
    {
        return $this->dbl_value;
    }

    /**
     * @param mixed $dbl_value
     */
    public function setDblValue($dbl_value): void
    {
        $this->dbl_value = $dbl_value;
    }

    /**
     * @return mixed
     */
    public function getTbBeneficiariesIdBeneficiaries()
    {
        return $this->tb_beneficiaries_id_beneficiaries;
    }

    /**
     * @param mixed $tb_beneficiaries_id_beneficiaries
     */
    public function setTbBeneficiariesIdBeneficiaries($tb_beneficiaries_id_beneficiaries): void
    {
        $this->tb_beneficiaries_id_beneficiaries = $tb_beneficiaries_id_beneficiaries;
    }

    /**
     * @return mixed
     */
    public function getTbCityIdCity()
    {
        return $this->tb_city_id_city;
    }

    /**
     * @param mixed $tb_city_id_city
     */
    public function setTbCityIdCity($tb_city_id_city): void
    {
        $this->tb_city_id_city = $tb_city_id_city;
    }
}