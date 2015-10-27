<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\ContactBundle\Mailer;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Templating\EngineInterface;
use Th3Mouk\ContactBundle\Events\MailerEvents;
use Th3Mouk\ContactBundle\Events\MailerEventsDefinition;
use Th3Mouk\Mailer\BaseTwigMailer;

class ContactMailer extends BaseTwigMailer
{
    /**
     * @var string
     */
    protected $template;

    /**
     * @var EventDispatcherInterface
     */
    protected $event_dispatcher;

    /**
     * @var array()
     */
    protected $configuration;

    /**
     * ContactMailer constructor.
     *
     * @param \Swift_Mailer            $mailer
     * @param EngineInterface          $templating
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating, EventDispatcherInterface $eventDispatcher)
    {
        $this->event_dispatcher = $eventDispatcher;
        parent::__construct($mailer, $templating);
    }

    public function sendMail($entity)
    {
        $this->init();

        $event = new MailerEvents($entity);
        $this->event_dispatcher->dispatch(MailerEventsDefinition::PRE_SUBMIT_MAIL, $event);

        $this->renderHTMLBody($this->getTemplate(), $entity);

        $this->setFrom($this->getConfigurationData('from'));
        $this->setTo($this->getConfigurationData('to'));
        $this->setSubject($this->getConfigurationData('subject'));

        $return = $this->sendEmail();

        $event = new MailerEvents($entity);
        $this->event_dispatcher->dispatch(MailerEventsDefinition::POST_SUBMIT_MAIL, $event);

        return $return;
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
