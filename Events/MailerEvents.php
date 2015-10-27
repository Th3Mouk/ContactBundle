<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\ContactBundle\Events;

use AppBundle\Entity\Contact;
use Symfony\Component\EventDispatcher\Event;

class MailerEvents extends Event
{
    /**
     * @var Contact
     */
    protected $contact;

    /**
     * MailerEvents constructor.
     *
     * @param $contact
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }
}
