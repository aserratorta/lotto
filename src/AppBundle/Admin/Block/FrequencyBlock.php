<?php

namespace AppBundle\Admin\Block;

use Doctrine\ORM\EntityManager;
use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class FrequencyBlock
 *
 * @category Block
 * @package  AppBundle\Admin\Block
 * @author   Anton Serra <aserratorta@gmail.com>
 */
class FrequencyBlock extends BaseBlockService
{
    /** @var EntityManager */
    private $em;

    /**
     * Constructor
     *
     * @param string          $name
     * @param EngineInterface $templating
     * @param EntityManager   $em
     */
    public function __construct($name, EngineInterface $templating, EntityManager $em)
    {
        parent::__construct($name, $templating);
        $this->em = $em;
    }

    /**
     * Execute
     *
     * @param BlockContextInterface $blockContext
     * @param Response              $response
     *
     * @return Response
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        return $this->renderResponse(
            $blockContext->getTemplate(),
            array(
                'block'           => $blockContext->getBlock(),
                'settings'        => $blockContext->getSettings(),
                'title'           => 'Frequency Block',
                'number0Frequency' => $this->em->getRepository('AppBundle:LottoNumber')->getNumberDigitFrequency(0),
                'number1Frequency' => $this->em->getRepository('AppBundle:LottoNumber')->getNumberDigitFrequency(1),
                'number2Frequency' => $this->em->getRepository('AppBundle:LottoNumber')->getNumberDigitFrequency(2),
                'number3Frequency' => $this->em->getRepository('AppBundle:LottoNumber')->getNumberDigitFrequency(3),
                'number4Frequency' => $this->em->getRepository('AppBundle:LottoNumber')->getNumberDigitFrequency(4),
                'number5Frequency' => $this->em->getRepository('AppBundle:LottoNumber')->getNumberDigitFrequency(5),
                'number6Frequency' => $this->em->getRepository('AppBundle:LottoNumber')->getNumberDigitFrequency(6),
                'number7Frequency' => $this->em->getRepository('AppBundle:LottoNumber')->getNumberDigitFrequency(7),
                'number8Frequency' => $this->em->getRepository('AppBundle:LottoNumber')->getNumberDigitFrequency(8),
                'number9Frequency' => $this->em->getRepository('AppBundle:LottoNumber')->getNumberDigitFrequency(9),
            ),
            $response
        );
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return 'frequency_block';
    }

    /**
     * Set defaultSettings
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'title'    => 'Frequency Block',
                'content'  => 'Default content',
                'template' => '::Admin/Blocks/frequency.html.twig',
            )
        );
    }
}