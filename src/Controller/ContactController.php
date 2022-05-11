<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\Type\AddContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact/{id}", name="contact",  requirements= {"id"="\d+"})
     */
    public function contact(ManagerRegistry $doctrine, $id): Response
    {

        $repository = $doctrine->getRepository(Contact::class);
        $contact = $repository->find($id);

        if (!$contact) {
            throw $this->createNotFoundException('Aucun contact n\'a été trouvé pour ' .$id);
        }
        
        return $this->render('public/contact.html.twig', [
            'contact' => $contact
        ]);
    }

    /**
     * @Route("/contact/add", name="AddContact")
     */
    public function create(Request $request): Response
    {

         // 1) build the form
         $user = new Contact();
         $form = $this->createForm(AddContactType::class, $user);
 
         // 2) handle the submit (will only happen on POST)
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
 
             // 3) save the User!
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($user);
             $entityManager->flush();
             
             return $this->redirectToRoute('home');              
 
         }
      

        return $this->render('security/contact.html.twig', [
            'formAddContactType' => $form->createView()
        ]);
    }

    /**
     * @Route("/contact/delete/{id}", name="DeleteContact", requirements={"id"="\d+"})
     */
    public function delete(ManagerRegistry $doctrine,$id): Response
    {
        $entityManger = $doctrine->getManager();
        $repository = $doctrine->getRepository(Contact::class);

        $contact = $repository->find($id);
        if (!$contact) {
            throw $this->createNotFoundException('Aucun contact n\'a été trouvé pour ' .$id);
        }
        $entityManger->remove($contact);
        $entityManger->flush();

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/contact/update/{id}", name="UpdateContact", requirements={"id"="\d+"})
     */
    public function update(ManagerRegistry $doctrine,$id): Response
    {
        $entityManger = $doctrine->getManager();
        $repository = $doctrine->getRepository(Contact::class);

        $contact = $repository->find($id);

        if (!$contact) {
            throw $this->createNotFoundException('Aucun contact n\'a été trouvé pour ' .$id);
        }
        $contact->setTelephone("New number");
        $entityManger->flush();

        return $this->redirectToRoute('home');
    }

}
