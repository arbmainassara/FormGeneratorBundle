<?php

namespace Ineat\FormGeneratorBundle\Controller;

use Ineat\FormGeneratorBundle\Entity\FormContainer;
use Ineat\FormGeneratorBundle\Form\FormContainerType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * FormContainer controller.
 *
 * @Route("/formcontainer")
 */
class FormContainerController extends Controller
{

    /**
     * Lists all FormContainer entities.
     *
     * @Route("/", name="formcontainer")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IneatFormGeneratorBundle:FormContainer')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new FormContainer entity.
     *
     * @Route("/", name="formcontainer_create")
     * @Method("POST")
     * @Template("IneatFormGeneratorBundle:FormContainer:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new FormContainer();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('formcontainer_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a FormContainer entity.
     *
     * @param FormContainer $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(FormContainer $entity)
    {
        $form = $this->createForm(new FormContainerType(), $entity, array(
            'action' => $this->generateUrl('formcontainer_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FormContainer entity.
     *
     * @Route("/new", name="formcontainer_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new FormContainer();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a FormContainer entity.
     *
     * @Route("/{id}", name="formcontainer_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IneatFormGeneratorBundle:FormContainer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormContainer entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing FormContainer entity.
     *
     * @Route("/{id}/edit", name="formcontainer_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IneatFormGeneratorBundle:FormContainer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormContainer entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a FormContainer entity.
     *
     * @param FormContainer $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(FormContainer $entity)
    {
        $form = $this->createForm(new FormContainerType(), $entity, array(
            'action' => $this->generateUrl('formcontainer_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FormContainer entity.
     *
     * @Route("/{id}", name="formcontainer_update")
     * @Method("PUT")
     * @Template("IneatFormGeneratorBundle:FormContainer:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IneatFormGeneratorBundle:FormContainer')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormContainer entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('formcontainer_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a FormContainer entity.
     *
     * @Route("/{id}", name="formcontainer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IneatFormGeneratorBundle:FormContainer')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FormContainer entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('formcontainer'));
    }

    /**
     * Creates a form to delete a FormContainer entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('formcontainer_delete', array('id' => $id)))
                    ->setMethod('DELETE')
                    ->add('submit', 'submit', array('label' => 'Delete'))
                    ->getForm()
        ;
    }
}
