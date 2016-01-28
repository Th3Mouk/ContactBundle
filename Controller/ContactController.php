<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\ContactBundle\Controller;

use AppBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Th3Mouk\ContactBundle\Entity\ContactInterface;

/**
 * Contact controller.
 */
class ContactController extends BaseContactController
{
    /**
     * Creates a form to create a Contact entity.
     *
     * @param Contact $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ContactInterface $entity)
    {
        $form = $this->createForm($this->getFormType(), $entity, array(
            'action' => $this->generateUrl('th3mouk_contact'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Contact entity.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction(Request $request)
    {
        $entity = $this->getEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            if ($this->container->hasParameter('th3mouk.contact.flash.success')) {
                $this->addFlash('success', $this->container->getParameter('th3mouk.contact.flash.success'));
            }

            $this->get('th3mouk.contact.mailer')->sendMail($entity);

            $entity = $this->getEntity();
            $form = $this->createCreateForm($entity);
        }

        return $this->render($this->getTemplate(), array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }
}
