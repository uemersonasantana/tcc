<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\ClienteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClienteController extends AbstractController
{
    /**
     * @Route("/", name="list")
     */
    public function index(): Response
    {
        $clientes = $this->getDoctrine()->getRepository(Cliente::class)->findAll();

        return $this->render('index.html.twig', [
            'titulo' => 'Teste cadastro de clientes',
            'clientes' => $clientes,
        ]);
    }

    /**
     * @Route("/novo", name="add")
     */
    public function add(Request $request)
    {
        $cliente = new Cliente();
        
        $form = $this->createForm(ClienteType::class, $cliente);
        $form->handleRequest($request);
        
        if ( $form->isSubmitted() && $form->isValid() ) {
            $cl = $this->getDoctrine()->getManager();

            $cl->persist($cliente);
            $cl->flush($cliente);

            $this->addFlash('success','Cliente adicionado com sucesso!');

            return $this->redirectToRoute('list');
        }

        return $this->render('forms/cliente.html.twig', [
            'titulo' => 'Novo cliente',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/editar/{id}", name="edit")
     */
    public function edit(Request $request, Cliente $cliente)
    {
        $form = $this->createForm(ClienteType::class, $cliente);
        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid() ) {
            $cl = $this->getDoctrine()->getManager();

            $cl->persist($cliente);
            $cl->flush($cliente);

            $this->addFlash('success','Informações editadas com sucesso!');

            return $this->redirectToRoute('list');
        }

        return $this->render('forms/cliente.html.twig', [
            'titulo' => 'Editar cliente',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("remover/{id}", name="remove")
     */
    public function remove(Cliente $id)
    {
        $cl = $this->getDoctrine()->getManager();
        $cl->remove($id);
        $cl->flush();

        $this->addFlash('success','Cliente removido!');
        
        return $this->redirectToRoute('list');
    }
}
