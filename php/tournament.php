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

  $n = count($allplayers);
for ($r = 0; $r < $n - 1; $r++) { 
  $rounds[$r]=[$this->name,date("d.m.Y", strtotime(date("d.m.Y",strtotime(implode(".",(array_reverse(explode('.',$this->date))))))."$r days"))];
   for ($i = 0; $i < $n / 2; $i++) {
      if($i==$n - 1 - $i){
         continue;
      }

      $rounds[$r][] = $allplayers[$i]. $allplayers[$n - 1 - $i];
   }

   $allplayers[] = array_splice($allplayers, 1, 1)[0];
}
   $allplayers[] = array_splice($allplayers, 1, 1)[0];

  
 
    $str="";
   
     foreach($rounds as $k){
       foreach ($k as $key => $value) {
          $str.=$value."\n";
       }
       $str.="<br>";
     }
    
 
       echo $str;
   }

}


?>