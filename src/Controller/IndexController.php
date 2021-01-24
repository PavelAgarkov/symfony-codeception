<?php

namespace App\Controller;

use App\MyEvent;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @Route("/{slug}", name="show", defaults={"foo" : "bar"})
     * @param Request $request
     * @param LoggerInterface $logger
     */
    public function index(Request $request, LoggerInterface $logger)
    {
//        $logger->info("im in controller");
        echo ("im in controller<br>");
//        $this->createNotFoundException();
        $e = new MyEvent();
        $this->dispatcher->dispatch($e);
        $salt = openssl_random_pseudo_bytes(12);

        try {

            ps_new();
        } catch (\Throwable $exception) {
            dd($exception->getMessage());
        }

        dd($salt);

        return $this->render('IndexController/index.html.twig');
    }

    public function genSubQuery(): Response
    {
        return $this->render('IndexController/sub.html.twig');
    }
}