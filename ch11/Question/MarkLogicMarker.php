<?php

namespace Question;
require_once 'Marker.php';
require_once 'RegexpMarker.php';
require_once 'MarkLogicMarker.php';
class MarkLogicMarker extends Marker
{
private MarkeParse $engine;

public function __construct(string $test)
{
    parent::__construct($test);
    $this->engine = new MarkLogicMarker($test);
}

    /**
     * @param string $response
     * @return bool
     */
    public function mark(string $response): bool
    {
        // TODO: Implement mark() method.

         return $this->engine->evaluate($response);
    }

    public function testMaker(){
        $input = 'five';
        $markers = [
            new RegexpMarker("/f.ve"),
            new MatchMarker("five"),
            new MarkLogicMarker('$input equals "five"')
        ];
        print_r($markers);
        foreach ($markers as $marker){
            print get_class($marker) ."\n";
            $question = new TextQuestion("how many beans make five",$marker);
        }

        foreach (["five","four"] as $response){
            print "response : $response ";
            if($question->mark($response)){
                print "well done \n";
            }else{
                print "never mind\n";
            }
        }

    }
}

(new MarkLogicMarker())->testMaker();