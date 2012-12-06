<?php

namespace Watertank\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Watertank\ApiBundle\Entity\TempLog;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{


    /**
     * @Route("/api/temp")
     * @Template()
     */
    public function temppostAction()
    {
        $query = $this->getRequest()->query;
        $senserId = $query->get('sid');
        $temp = $query->get('temp');
        $timestamp = $query->get('timestamp');


/*
        //validation
        if(!(is_int($senserId) && is_float($temp) && is_int($timestamp))){
            $errorJson = array(
                'code' => -1,
                'message' => 'ERROR!!!!'
            );
            $jsonEncoder = new JsonEncode();
            return $jsonEncoder->encode($errorJson, 'json');
        }
*/
        //
        $tempLog = new TempLog();
        $tempLog->setTempType($senserId);
        $tempLog->setTemperature($temp);
        $aa = new \DateTime();
        $aa->setTimestamp($timestamp);

        $tempLog->setLoggingDate($aa);
//        $tempLog->setLoggingDate(date("Y-m-d H:i:s", time()));

        $em = $this->getDoctrine()->getManager();
        $em->persist($tempLog);
        $em->flush();

        $successJson = array(
            'code' => 1
        );

        $jsonEncoder = new JsonEncode();
        $response = new Response($jsonEncoder->encode($successJson, 'json'));
        $response->headers->set('Content-Type', 'application/json; charset=utf-8');
        return $response;
    }

    /**
     * @Route("/api/img")
     */
    public function imgAction()
    {
        /* @var $uploadFile \Symfony\Component\HttpFoundation\File\UploadedFile */
        $uploadFile = $this->getRequest()->files->get('img');

        if($uploadFile === null){
            throw $this->createNotFoundException("error.");
        }

        $filename = $uploadFile->getPathname();

        $successJson = array(
            'code' => 1,
            'imgpath' => $filename
        );

        $jsonEncoder = new JsonEncode();
        $response = new Response($jsonEncoder->encode($successJson, 'json'));
        $response->headers->set('Content-Type', 'application/json; charset=utf-8');
        return $response;
    }
}
