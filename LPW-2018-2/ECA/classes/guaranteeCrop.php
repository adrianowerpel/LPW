<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 27/08/2018
 * Time: 22:08
 */

class guaranteeCrop
{
    private $id_guarantee_crop;
    private $srt_month;
    private $srt_year;
    private $dbl_value;
    private $tb_beneficiaries_id_beneficiaries;
    private $tb_city_id_city;

    /**
     * guaranteeCrop constructor.
     * @param $id_guarantee_crop
     * @param $srt_month
     * @param $srt_year
     * @param $dbl_value
     * @param $tb_beneficiaries_id_beneficiaries
     * @param $tb_city_id_city
     */
    public function __construct($id_guarantee_crop, $srt_month, $srt_year, $dbl_value, $tb_beneficiaries_id_beneficiaries, $tb_city_id_city)
    {
        $this->id_guarantee_crop = $id_guarantee_crop;
        $this->srt_month = $srt_month;
        $this->srt_year = $srt_year;
        $this->dbl_value = $dbl_value;
        $this->tb_beneficiaries_id_beneficiaries = $tb_beneficiaries_id_beneficiaries;
        $this->tb_city_id_city = $tb_city_id_city;
    }

    /**
     * @return mixed
     */
    public function getIdGuaranteeCrop()
    {
        return $this->id_guarantee_crop;
    }

    /**
     * @param mixed $id_guarantee_crop
     */
    public function setIdGuaranteeCrop($id_guarantee_crop): void
    {
        $this->id_guarantee_crop = $id_guarantee_crop;
    }

    /**
     * @return mixed
     */
    public function getSrtMonth()
    {
        return $this->srt_month;
    }

    /**
     * @param mixed $srt_month
     */
    public function setSrtMonth($srt_month): void
    {
        $this->srt_month = $srt_month;
    }

    /**
     * @return mixed
     */
    public function getSrtYear()
    {
        return $this->srt_year;
    }

    /**
     * @param mixed $srt_year
     */
    public function setSrtYear($srt_year): void
    {
        $this->srt_year = $srt_year;
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