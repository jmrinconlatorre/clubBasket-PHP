<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Equipo;
use App\Form\EquipoType;

/**
 * @Route("/equipo")
 */
class EquipoController extends AbstractController
{
    /**
     * @Route("/lista",name="listaEquipo")
     */
    public function listaEquipos()
    {
        $repository = $this->getDoctrine()->getRepository(Equipo::class);
        $equipos = $repository->findAll();
        return $this->render(
            'equipo/lista.html.twig',
            ['equipos'=>$equipos]
        );
    }

    /**
     * @Route("/nuevo",name="nuevoEquipo")
     */
    public function nuevoEquipo(Request $request){
        $equipo = new Equipo();
        
        $form = $this->createForm(EquipoType::class, $equipo);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $equipo = $form->getData();
            dd($equipo);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($equipo);
            $entityManager->flush();
    
            return $this->redirectToRoute('listaEquipo');
        }
        return $this->render('equipo/nuevoEquipo.html.twig', [
            'form' => $form->createView(),
        ]);
    
    }

    /**
     * @Route("/nuevoEquipoTemp",name="nuevoEquipoTemp")
     */
    // public function nuevoEquipoTemp(){
    //     $equipo = new Equipo();

    //     // $form = $this->createFormBuilder($equipo)
    //     // ->add('categoria')
    //     // ->add('sexo')
    //     // ->add('numJugadores')
    //     // ->add('save', SubmitType::class, ['label' => 'Crear equipo'])
    //     // ->getForm();

    //     dump($form);
    //     return $this->render('equipo/nuevoEquipoTemp.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
       
    // }
}
