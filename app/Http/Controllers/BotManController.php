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
  
        $botman->hears('(.+)', function($botman, $message) {
  
            if ($message == 'Zdravo' || $message == 'zdravo') {
                $this->askName($botman);
            }elseif ($message == 'Cijena' || $message == 'cijena' || $message == 'koja je cijena' || $message == 'Koja je cijena?' || $message == 'koliko kosta') {
                $botman->reply("Cijene naših proizvoda se kreću između 1KM i 10KM po komadu.");
            }else{
                $botman->reply("Nismo sigurni da imamo odgovor na to pitanje. Za više informacija, molimo, kontaktirajte nas na broj: +387 61 758 733.");
            }
  
        });
  
        $botman->listen();
    }
  
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Zdravo! Kako se zovete?', function(Answer $answer) {
  
            $name = $answer->getText();
  
            $this->say($name. ', kako Vam možemo pomoći?');
        });
    } 

}