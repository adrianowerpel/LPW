<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 18/09/2018
 * Time: 16:52
 */

class familyBag
{
    private $id_family_bag;
    private $str_mes_comp;
    private $str_ano_comp;
    private $str_mes_ref;
    private $str_ano_ref;
    private $dbl_data_saque;
    private $dbl_valor_saque;
    private $tb_beneficiaries_id_beneficiaries;
    private $tb_city_id_city;

    /**
     * familyBag constructor.
     * @param $id_family_bag
     * @param $str_mes_comp
     * @param $str_ano_comp
     * @param $str_mes_ref
     * @param $str_ano_ref
     * @param $dbl_data_saque
     * @param $dbl_valor_saque
     * @param $tb_beneficiaries_id_beneficiaries
     * @param $tb_city_id_city
     */
    public function __construct($id_family_bag, $str_mes_comp, $str_ano_comp, $str_mes_ref, $str_ano_ref, $dbl_data_saque, $dbl_valor_saque, $tb_beneficiaries_id_beneficiaries, $tb_city_id_city)
    {
        $this->id_family_bag = $id_family_bag;
        $this->str_mes_comp = $str_mes_comp;
        $this->str_ano_comp = $str_ano_comp;
        $this->str_mes_ref = $str_mes_ref;
        $this->str_ano_ref = $str_ano_ref;
        $this->dbl_data_saque = $dbl_data_saque;
        $this->dbl_valor_saque = $dbl_valor_saque;
        $this->tb_beneficiaries_id_beneficiaries = $tb_beneficiaries_id_beneficiaries;
        $this->tb_city_id_city = $tb_city_id_city;
    }

    /**
     * @return mixed
     */
    public function getIdFamilyBag()
    {
        return $this->id_family_bag;
    }

    /**
     * @param mixed $id_family_bag
     */
    public function setIdFamilyBag($id_family_bag): void
    {
        $this->id_family_bag = $id_family_bag;
    }

    /**
     * @return mixed
     */
    public function getStrMesComp()
    {
        return $this->str_mes_comp;
    }

    /**
     * @param mixed $str_mes_comp
     */
    public function setStrMesComp($str_mes_comp): void
    {
        $this->str_mes_comp = $str_mes_comp;
    }

    /**
     * @return mixed
     */
    public function getStrAnoComp()
    {
        return $this->str_ano_comp;
    }

    /**
     * @param mixed $str_ano_comp
     */
    public function setStrAnoComp($str_ano_comp): void
    {
        $this->str_ano_comp = $str_ano_comp;
    }

    /**
     * @return mixed
     */
    public function getStrMesRef()
    {
        return $this->str_mes_ref;
    }

    /**
     * @param mixed $str_mes_ref
     */
    public function setStrMesRef($str_mes_ref): void
    {
        $this->str_mes_ref = $str_mes_ref;
    }

    /**
     * @return mixed
     */
    public function getStrAnoRef()
    {
        return $this->str_ano_ref;
    }

    /**
     * @param mixed $str_ano_ref
     */
    public function setStrAnoRef($str_ano_ref): void
    {
        $this->str_ano_ref = $str_ano_ref;
    }

    /**
     * @return mixed
     */
    public function getDblDataSaque()
    {
        return $this->dbl_data_saque;
    }

    /**
     * @param mixed $dbl_data_saque
     */
    public function setDblDataSaque($dbl_data_saque): void
    {
        $this->dbl_data_saque = $dbl_data_saque;
    }

    /**
     * @return mixed
     */
    public function getDblValorSaque()
    {
        return $this->dbl_valor_saque;
    }

    /**
     * @param mixed $dbl_valor_saque
     */
    public function setDblValorSaque($dbl_valor_saque): void
    {
        $this->dbl_valor_saque = $dbl_valor_saque;
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