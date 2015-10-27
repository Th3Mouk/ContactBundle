<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\ContactBundle\Events;

final class MailerEventsDefinition
{
    const PRE_SUBMIT_MAIL = 'th3mouk.contact.mail.pre_submit';

    const POST_SUBMIT_MAIL = 'th3mouk.contact.mail.post_submit';
}
