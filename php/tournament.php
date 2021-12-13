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
   
    $allplayers=[];
  foreach($this->players as $k=>$v){
    $allplayers[]=$v[array_key_first($v)];
  }
 //все возможные пары игроков 
  $pairs=[];
  $size=count($allplayers)-1;
  $keys = array_keys($allplayers);
  $i=0;
        foreach($allplayers as $player){
        
            for($j=$size;$j>$i;$j--)
            {   
                $pairs[$keys[$i].$keys[$j]]=
                  $allplayers[$i]."-".
                  $allplayers[$j];
        
               
            }  
            
    $i++;
        
        }

    ksort($pairs);
    $pairs=array_values($pairs);
  //  турнир


    $games=[];

 
      for($j=0,$i=count($pairs)-1;$j<$i;$j++,$i--){
 
          $games[]=[
           'name'=> $this->name,
           'date'=>date("d.m.Y", strtotime(date("d.m.Y",strtotime(implode(".",(array_reverse(explode('.',$this->date))))))."+$j days")),
            $pairs[$i],
            $pairs[$j],
      
      
         ];
        
        
      }
    $str="";
       foreach($games as $k=>$v){
       
         foreach($v as $key=>$value){
             $str.=$value."\n";
         }
       }
       return $str;
   }

}


?>