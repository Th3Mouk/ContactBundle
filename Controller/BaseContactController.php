<?php

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
