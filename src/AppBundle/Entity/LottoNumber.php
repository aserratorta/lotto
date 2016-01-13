<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LottoNumber
 *
 * @category Entity
 * @package  AppBundle\Entity
 * @author   Anton Serra <aserratorta@gmail.com>
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LottoNumberRepository")
 */
class LottoNumber extends AbstractBase
{

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     *
     *
     * Methods
     *
     *
     */

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return LottoNumber
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return LottoNumber
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

}
