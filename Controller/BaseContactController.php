<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseContactController extends Controller
{
    public function getEntity()
    {
        $class = $this->container->getParameter('th3mouk.contact.class.entity');

        return new $class();
    }

    public function getFormType()
    {
        $class = $this->container->getParameter('th3mouk.contact.class.form');

        return new $class();
    }

    public function getTemplate()
    {
        return $this->container->getParameter('th3mouk.contact.template.application');
    }
}
