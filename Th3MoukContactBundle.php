<?php

namespace Th3Mouk\ContactBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Th3Mouk\ContactBundle\DependencyInjection\Th3MoukContactExtension;

class Th3MoukContactBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new Th3MoukContactExtension();
        }

        return $this->extension;
    }
}
