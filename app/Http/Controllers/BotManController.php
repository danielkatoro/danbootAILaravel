<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
    {

    /**
    * Place your BotMan logic here.
    */

 public function handle()
  {

       $botman = app('botman');
       $botman->hears('{message}', function($botman, $message) {
       if ($message == 'hi')
        {
          $this->askName($botman);
        }
        else
        {
          $botman->reply("Ecrivez 'hi' pour tester...");
        }
     });

     $botman->listen();

  }

    /**
     * Place your BotMan logic here.
    */

    public function askName($botman)
    {

        $botman->ask('Hello! Quel est votre nom?', function(Answer $answer) {
        $name = $answer->getText();

        $this->say('Ravis de faire votre connaissance '.$name .'Comment je peux vous aider??');
      });

    }

  }
