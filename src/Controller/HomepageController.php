<?php

namespace App\Controller;

use App\Entity\Recept;
use App\Form\MedicijnFormType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Drug;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\Routing\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomepageController extends AbstractController
{
    /**
     * @\Symfony\Component\Routing\Annotation\Route("/", name="home")
     */
    public function showAll(EntityManagerInterface $em)
    {
        /*
        $drug_1 = new Drug();
        $drug_1->setNaam("diclofenac");
        $drug_1->setWerking("pijnstiller, koortsverlagende werking,
         ontstekingsremmende werking. Goed bij acute
          pijn en chronische ziektes zoals reuma en jicht");
        $drug_1->setBijwerkingen("pijn op de borst, kortademingheid, zwarte of zeer 
        donkere ontlasting, ophoesten van bloed, blauwe plekken");
        $drug_1->setVerzekerd("jaa");

        $drug_2 = new Drug();
        $drug_2->setNaam("amoxicilline");
        $drug_2->setWerking("breedspectrum antibioticum, actief tegen 
        grampositieve en gramnegatieve bacteriën");
        $drug_2->setBijwerkingen("braken, buikpijn, diarree, spijsverteringsstoornissen, huidirritaties,
         maagdarm-stoornissen");
        $drug_2->setVerzekerd("jaa");

        $drug_3 = new Drug();
        $drug_3->setNaam("omeprazol");
        $drug_3->setWerking("remt de productie van overmatig maagzuur. Omeprazol behoort tot de klasse van protonremmers.
         Omeprazol wordt ingezet ter preventie en behandeling van maagzweren.");
        $drug_3->setBijwerkingen("duizeligheid, verwarring, snelle en onregelmatige hartslag, schokkende
         spierbewegingen, zich schrikachtig voelen, spierkrampen, spierzwakte of slap gevoel.");
        $drug_3->setVerzekerd("nee");

        $em->persist($drug_1);
        $em->persist($drug_2);
        $em->persist($drug_3);

        $em->flush();
        */
        $dbDrugs = $em->getRepository(Drug::class);
        $drugs = $dbDrugs->findAll();

        $dbRecepten = $em->getRepository(Recept::class);
        $recepten = $dbRecepten->findAll();

        return $this->render("medication.html.twig" , [
            'drugs' => $drugs,
        ]);

    }
    /**
     * @route("/newDrugForm", name="drugform")
     */
    function addDrug(EntityManagerInterface $em, Request $request)
    {
        $drugForm = $this->createForm(MedicijnFormType::class);

        $drugForm->handleRequest($request);
        if ($drugForm->isSubmitted() && $drugForm->isValid())
        {
            $drug = $drugForm->getData();

            $em->persist($drug);

            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('newDrugForm.html.twig', [
            'drugForm' => $drugForm->createView(),
        ]);

    }

    /**
     *  @\Symfony\Component\Routing\Annotation\Route("/", name="home")
     */
    function showRecept(EntityManagerInterface $em)
    {
        $dbRecepten = $em->getRepository(Recept::class);
        $recepten = $dbRecepten->findAll();

        return $this->render("recepten.html.twig" , [
            'recepten' => $recepten,
        ]);
    }

    /**
     * @Route("/newRecept", name="receptform")
     */
    function addRecept(EntityManagerInterface $em)
    {
        /*
        $recept_1 = new Recept();
        $recept_1->setDatum("11-01-2021");
        $recept_1->setDossis("een keer per dag na de maaltijd");
        $recept_1->setDuur(4);
        $recept_1->setMedicijn($drug);

        $em->persist($recept_1);
        $em->flush();
        */
        //$drug = $em->getRepository(Drug::class)->find(121);
        return $this->render("newReceptForm.html.twig");
    }


}