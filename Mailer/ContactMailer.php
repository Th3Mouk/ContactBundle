<?php

namespace Th3Mouk\ContactBundle\Mailer;

use Symfony\Component\Templating\EngineInterface;
use Th3Mouk\Mailer\BaseTwigMailer;

class ContactMailer extends BaseTwigMailer
{
    /**
     * @var string
     */
    protected $template;

    /**
     * @var array()
     */
    protected $configuration;

    /**
     * ContactMailer constructor.
     *
     * @param \Swift_Mailer   $mailer
     * @param EngineInterface $templating
     */
    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating)
    {
        parent::__construct($mailer, $templating);
    }

    public function sendMail($entity)
    {
        $this->init();

        $this->renderHTMLBody($this->getTemplate(), $entity);

        $this->setFrom($this->getConfigurationData('from'));
        $this->setTo($this->getConfigurationData('to'));
        $this->setSubject($this->getConfigurationData('subject'));

        return $this->sendEmail();
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * @return mixed
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    public function getConfigurationData($data)
    {
        return $this->configuration[$data];
    }

    /**
     * @param mixed $configuration
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;
    }
}
