<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Lang" content="en">
<title>پیاده سازی الگوریتم های طبیق رشته</title>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="al.js"></script>
<style>
fieldset{
    margin: 5px;
}
.c {
    border: 1px solid;
    margin-left: 0px;
    display: inline-block;
    width: 20px !important;
    height: 20px !important;
    text-align: center;
}
#pattern{
    margin-left: 107px;
    position: absolute;
}
</style>
</head>
<body style="direction: rtl;">
      <fieldset style="width:60%;margin: auto;">
      <pre>سید عباس حسینی
            پیاده سازی الگوریتم: rabin-karp
            
            مرتبه زمانی اجرا:<img src="https://wikimedia.org/api/rest_v1/media/math/render/svg/17b8e46ab3a2a5c04dfc0659093b7c2018d264ba" class="mwe-math-fallback-image-inline" aria-hidden="true" style="vertical-align: -0.838ex; width:17.745ex; height:2.843ex;" alt="{\displaystyle \Theta (m(n-m+1))}">
      </pre>
      <form action="al-robin-kerp.php" method="POST">
      <table>
        <tr>
            <td>
            <label>طول رشته[m]</label>
            <input type="text" size="5" id="m" value="20" name="m">
            </td>
            <td>
            <label>طول الگو[n]</label>
            <input type="text" size="5" id="n" value="3" name="n">
            </td>
            <td>
            <label>الفبای رشته[<img src="https://wikimedia.org/api/rest_v1/media/math/render/svg/9e1f558f53cda207614abdf90162266c70bc5c1e" class="mwe-math-fallback-image-inline" aria-hidden="true" style="vertical-align: -0.338ex; width:1.678ex; height:2.176ex;" alt="\Sigma ">]</label>
            <input type="text" size="30" id="sigma" name="sigma" value="1,2,3,4,5,6,7,8,9,0"> 
            </td>
            <td>
                <input type="submit" value="ساخت رشته و الگو">
            </td>
        </tr>
      </table> 
      </fieldset>
      <fieldset style="width:60%;margin: auto;direction: ltr;">
      <table>     
      <tr>
          <td width="100px">T  متن:</td>
          <td>
          <?php
               global $m;
               global $n;
               function sigma(){
//                   return(rand(0,1));
                    if(isset($_POST['sigma'])){
                      $alfba=str_replace(',','',$_POST['sigma']);
                      $count=strlen($alfba);
                      $c=rand(0,$count-1) ;
//                      echo $count;exit;
                      $alfba= explode(',',$_POST['sigma']);
                      return($alfba[$c]);
//                      print_r($alfba);exit;
                    }
               }
               if(isset($_POST['m'])){
                   
                   for ($i = 1; $i <= $_POST['m']; $i++) 
                   {
                       $curval=sigma();
                       $m[$i]=$curval;
                       echo '<td class="c">'.$curval.'</td>';
                   }
//                   print_r($m);exit;
               }
          ?>
          </td>
      </tr>
      <tr>
          <td colspan="1">P الگو:</td>
          <tr id="pattern">
          <?php
             if(isset($_POST['n'])){           
                   
                   for ($i = 1; $i <= $_POST['n']; $i++) 
                   {
                       $curval=sigma();
                       $n[$i]=$curval;
                       echo '<td class="c">'.$curval.'</td>';
                   }
               }
          ?>
          </tr>
      </tr>
      <tr>
        <td>
        <br/>
        <br/>
        <br/>
        <?php
                if(isset($_POST['start'])){
                      $m=implode($m,',');
                      $m=str_replace(',','',$m);
                      $n=implode($n,',');
                      $n=str_replace(',','',$n);
                      $s=0;
                   for ($i = 0; $i <= ($_POST['m']-$_POST['n']); $i++) 
                   {
                       
                       $nm=substr($m,$i,$_POST['n']);
                       if($nm === $n){
                           $s++;
                           $shift = $s * 20;
                           echo '<span style="color:green;">['.$nm."i=".$i.']</span><br>';
                           echo'<script>$("#pattern").css("margin-left",'.$shift.'px);</script>';
                       }else{
                           echo $nm."i=".$i.'<br>';
                       }
                       
                   }
                   echo '<br/>تعداد تطبیق:'.$s;
                } 
          ?>                       
              <input type="hidden" id="start" value="true" name="start">
              <input type="submit" value="جستجوی الگو" > 
         </form>
        </td>
      </tr>
      </table>
      </fieldset>
</body>
</html>
