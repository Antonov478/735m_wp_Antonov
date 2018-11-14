<?php 
function getMenu($menu, $vertical=true) 
{ 
$style = ""; 
if(!$vertical) 
{ 
$style = "display:inline"; 
} 
echo '<ul style="list-style-type:none">'; 
foreach ($menu as $link=>$href) 
{ 
echo "<li style='$style'><a href=\"$href\">", $link, '</a></li>'; 
} 
echo '</ul>'; 
} 
?>

<?php 
					function reversestr($str){
                        
						$massive = str_split($str);
                        $revers = array_reverse($massive);
                        $rts = implode ("", $revers);
						return $rts;
                    }
                    $str = "The official site of the AO PZCM";
                    function mysort(array $arr) {
   					 $count = count($arr);
   					if ($count <= 1) {
  				    return $arr;
    				}
 
    				for ($i = 0; $i < $count; $i++) {
       					 for ($j = $count - 1; $j > $i; $j--) {
          					  if ($arr[$j] < $arr[$j - 1]) {
               						 $tmp = $arr[$j];
               						 $arr[$j] = $arr[$j - 1];
               						 $arr[$j - 1] = $tmp;
         						}
  						 }
   					 }
 
    				return $arr;
					}
$massive = array(7, 2, 26, 1, 0, 4, 6);

					?>