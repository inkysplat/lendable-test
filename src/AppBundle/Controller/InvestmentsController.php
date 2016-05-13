<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class InvestmentsController extends Controller
{
    /**
     * @Route("/investments/show")
     * @return JsonResponse
     */
    public function showAction()
    {
        $investor = $this->getUser();
        $investments = $this->getDoctrine()->getRepository('AppBundle:Investment')
            ->getInvestmentsByInvestor($investor);

        return new JsonResponse($investments, 200);
    }
}
