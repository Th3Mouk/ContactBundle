<?php

namespace Th3Mouk\ContactBundle\Mailer;

use Symfony\Component\Templating\EngineInterface;
use Th3Mouk\Mailer\BaseTwigMailer;

class ContactMailer extends BaseTwigMailer
{
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

    public function getTemplate()
    {
        return $this->container->getParameter('th3mouk.contact.template.mailer');
    }

    public function getConfigurationData($data)
    {
        return $this->container->getParameter('th3mouk.contact.datas.'.$data);
    }
}
