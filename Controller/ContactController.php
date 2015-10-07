<?php

namespace Th3Mouk\ContactBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Contact;
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

            $this->addFlash('success', 'Votre demande de contact à bien été transmise.');

            $entity = $this->getEntity();
            $form = $this->createCreateForm($entity);
        }

        return $this->render($this->getTemplate(), array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }
}