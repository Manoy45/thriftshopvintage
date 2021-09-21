<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/nous-contacter", name="contact")
     */
    public function index(Request $request): Response
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

                $mail = new Mail();
                $content = ('Prénom et Nom : '.$contact['firstname'].' '.$contact['lastname'].'<br/>Email : '.$contact['email'].'<br/>Message : '.$contact['message']);
                $mail->send('anthony.hacktham@gmail.com', 'Thrift Shop Vintage', 'Thrift Shop Vintage - Nouvelle demande de contact', $content);
     
                $this->addFlash('notice', 'Merci de nous avoir contacté. Notre équipe va vous répondre dans les meilleurs délais.');
            
            return $this->redirectToRoute('contact');
        }
        
        
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
