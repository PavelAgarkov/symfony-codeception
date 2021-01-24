<?php


namespace App\EventListener;


use App\MyEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Contracts\EventDispatcher\Event;

class UserAgentSubscriber implements EventSubscriberInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => ['onKernelController', 0],
            RequestEvent::class => 'onKernelRequest',
            MyEvent::class => 'onMyEvent'
        ];
    }

    public function onMyEvent(Event $e): void
    {
        $e->ex();
        echo 'onMyEvent' . '</br>';
//        dd($e);
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        $userAgent = $request->headers->get('User-agent');
        echo 'onKernelRequest' . '</br>';
//        dd($request->attributes);

        // меняет контроллер на указанное замыкание
//        $request->attributes->set('_controller', function ($slug = null) {
//            dd($slug);
//            return new Response('I just');
//        });

//        $event->setResponse(new Response("Hayyy"));
//        $this->logger->info("im dead");
    }

    public function onKernelController(Event $event): void
    {
        $request = $event->getRequest();

        $userAgent = $request->headers->get('User-agent');
        echo 'onKernelController' . '</br>';
//        $event->setResponse(new Response("Hayyy"));
//        $this->logger->info("im dead");
    }
}