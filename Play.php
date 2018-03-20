<html>
<link rel="stylesheet" href="play.css" media="screen">
<body>
<div class="hh">
  <p id="dummy"></p>
<input id="ppb" type="button" value="Play" onclick="pp()">
<input type="button" value="Next" onclick="nxt()">
<input id="pen" type="button" value="Prev" onclick="prev()" disabled><br>
Volume: <input type="Range" value=100 min=10 max=100 onchange="vol(this.value)"><br>
Seek:<span id="curtm"></span> <input id="sek" type="Range" value=0 min=0 onchange="seek(this.value);"><span id="ttm"></span>
</div>

<div>
  <span><audio id="aud" onended="nxt()"></audio></span>
  <br> Currently Playing: <span id="cprl"></span><br>
</div>
</body>
<?php
   $val = $_REQUEST['qip'];
   $val=json_decode($val);
  $stmt='select title from song_list where feel=\''.$val[0].'\';';

  try
  {
   $cmd = new PDO('mysql:host=localhost;dbname=user_song_info', 'ext_user', '');
   $cmd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $que=$cmd->query($stmt);
   $hld=[];
   while($res=$que->fetch(PDO::FETCH_NUM))
    {
      $hld[]=$res[0];
    }
  }
  catch(PDOException $e)
  {
     echo "Connection failed: " . $e->getMessage();
  }
?>
<script>
 var plst=[];
 var i=0,f,ppb=document.getElementById("ppb"),v,t,u;
 var aud=document.getElementById("aud");
    plst[0]='<?php echo json_encode($hld);?>';
    plst=JSON.parse(plst[0]);
    f=plst.length;
    while(i<f)
    {
      document.getElementById("dummy").innerHTML+=plst[i]+"<br>";
      plst[i]="song_list/"+plst[i]+".mp3";
      i++;
    }
 i=1;
 f=0;
 if(f==0)
 {
  f=1;
  aud.src=plst[0];
 }
 function nxt()
 {
    document.getElementById("pen").disabled=false;
    clearInterval(u);
    aud.src=plst[i];
    aud.load();
    i++;
    ppb.value="Play";
}
function prev()
{   i-=2;
    aud.src=plst[i];
    aud.load();
    i++;
    ppb.value="Play";
   if(i==1)
     {document.getElementById("pen").disabled=true;}
}
function pp()
{
  if(ppb.value=="Play")
  {
    aud.play();
    ppb.value="Pause";
    u=setInterval(upd,2000);
  }
  else
  { clearInterval(u);
    aud.pause();
    ppb.value="Play";
  }

}
function vol(v)
{
  aud.volume=(v/100);
}
aud.onloadeddata=function()
{
  document.getElementById("sek").max=aud.duration;
  var id=aud.src;
  id=id.split('t/');
  id=id[2].split('.mp3');
  id=id[0].split('%20');
  id=id.join(" ");
document.getElementById("cprl").innerHTML=id;
  var m=0,s=aud.duration;
  while(s>60)
  {
    m++;
    s-=60;
  }
  document.getElementById("ttm").innerHTML=m+":"+parseInt(s);
  u=setInterval(upd,2000);
}
function seek(t)
{
  aud.currentTime=t;
}
function upd()
{
  var m=0,s=aud.currentTime;
  document.getElementById("sek").value=aud.currentTime;
  while(s>60)
  {
    m++;
    s-=60;
  }
  document.getElementById("curtm").innerHTML=m+":"+parseInt(s);
}
</script>
</html>
