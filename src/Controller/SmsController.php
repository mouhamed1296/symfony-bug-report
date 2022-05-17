<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\Bridge\Twilio\TwilioTransport;
use Symfony\Component\Notifier\Exception\TransportExceptionInterface;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\TexterInterface;
use Symfony\Component\Routing\Annotation\Route;

class SmsController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/sms', name: 'app_sms')]
    public function index(TexterInterface $texter): Response
    {
        $message = new SmsMessage(
            '+221781109025',
            'hello world'
        );
        $result = $texter->send($message);
        dd($result);
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SmsController.php',
        ]);
    }
}
