<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
