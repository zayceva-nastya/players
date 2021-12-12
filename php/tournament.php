<?php 
class Tournament
{
    private string $name;
    private array $players=[];

    public function __construct($name, $date=NULL){
        $this->name = $name;
        $this->date  = $date??date("Y.m.d", strtotime("+1 day"));
    }

    public function addPlayer($player){
        $this->players[]=(array)$player;

        return $this;
    }


public function createPairs(){
   
 //все возможные пары игроков 
  $pairs=[];
  $size=count($this->players)-1;
  $keys = array_keys($this->players);
  $i=0;

  foreach($this->players as $player){
      for($j=$size,$t=1;$i<$j;$j--){     
 
          $pairs[$keys[$i].$keys[$j]]=[
              $this->players[$i],
              $this->players[$j],
        
          ];
      }    
    $i++;
  }

    ksort($pairs);
    $pairs=array_values($pairs);
    //турнир
    $games=[];
      for($j=0,$i=count($pairs)-1;$j<$i;$j++,$i--){
         $games[]=[
           'name'=> $this->name,
           'date'=>date("d.m.Y", strtotime(date("d.m.Y",strtotime(implode(".",(array_reverse(explode('.',$this->date))))))."+$j days")),
            $pairs[$i],
            $pairs[$j]
         ];
        
      }

       return $games;
   }

}


?>