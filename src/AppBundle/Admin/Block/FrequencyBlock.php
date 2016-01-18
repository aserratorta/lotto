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
//                'pendingMessages' => $this->em->getRepository('AppBundle:ContactMessage')->getPendingMessagesAmount(),
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