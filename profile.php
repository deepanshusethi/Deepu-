<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
<style>

</style>
<link href="after.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/style1.css" media="screen">
</head>
 <header1>
  <div id ="header">
<h2 id="logo ">
            <a href="profile.php"><img src = "logo.png" style=" width: 20%;height:200px; float:left;" alt = logo/>
		   
 <div class="form">

         
          
          <p>
          <?php 
     
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          
          <?php
          
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
          
          ?>
          
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>
          
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>



<br style="clear:both;"/>

</div></a></h2>
</header1>
<body>

    
<script src='js1.js'></script>
<script src="js/index.js"></script>
<div class="container">
  <a href="profile.php">Home</a>
  
  <div class="dropdown">
    <button class="dropbtn">moods</button>
    <div class="dropdown-content">
      <a href="happy.php">Happy</a>
      <a href="sad.php">sad</a>
      <a href="romantic.php">romantic</a>
      
      <a href="heartbroken.php">heart broken</a>
      <a href="party.php">party</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Era</button>
    <div class="dropdown-content">
      <a href="60.php">50's-90's </a>
      
      <a href="90.php">90's-2010's</a>
      
      <a href="newEra.php">New Era</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">singer's</button>
    <div class="dropdown-content">
      <a href="lata.php">Lata Mangeshkar</a>
      <a href="jagjit.php">Jagjit Singh</a>
      <a href="rahman.php">A.R. Rahman</a>
      <a href="ankit.php">Ankit Tiwari</a>
      <a href="arijit.php">Arijit Singh</a>
      <a href="sonu.php">Sonu Nigam</a>
      
      
      <a href="mohit.php">Mohit Chauhan</a>
      
      <a href="kishore.php">Kishore Kumar</a>
      <a href="rafi.php">Mohammand Rafi</a>
      
    </div>
  </div>
  
</div>




<script>
function openNav() {
    document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}
</script>
<br><br><br>
<div class="bb">
<nav >
  <a href=""><h2>Favourites</h2></a><br>
  <input type="button" value="Add to Fav" onclick="favr()">
  <h2>Your Playlists:</h2>
  <input id="adpl" type="button" hidden onclick="addtpl()">
   <nav id="ypl"></nav>
</nav>

<input type="button" value="Create Playlist" onclick="nhid()">
<input id="plnm" type="text" placeholder="Enter Playlist Name" hidden onchange="crtpl(this.value)">
</div><br> <br><br><br><br><br><br><br><br><br>
<div class="aa">
  <header>
<form>
  <input id="srfl" type="text" name="snme" size=50 placeholder="Search..."><br>
  <br><input list="art"  name="dib" placeholder="Artist" onchange="resg(this.value,this.placeholder)" autocomplete="off">
   <datalist id="art">
     <option value="Amy Winehouse">
     <option value="Linkin Park">
     <option value="Bring Me The Horizon">
   </datalist>
  <br><input list="alb" name="dib" placeholder="Album" onchange="resg(this.value,this.placeholder)"  autocomplete="off">
   <datalist id="alb">
     <option value="Back To Black">
     <option value="One More Light">
     <option value="That`s The Spirit">
   </datalist>
 <br><input list="gen" name="dib" placeholder="Genre" onchange="resg(this.value,this.placeholder)"  autocomplete="off">
   <datalist id="gen">
     <option value="Rock">
     <option value="Pop">
     <option value="Electronic">
     <option value="Bollywood">
     <option value="Clasical">
   </datalist>
 <br><input list="tim" name="dib" placeholder="Age" onchange="resg(this.value,this.placeholder)" autocomplete="off">
   <datalist id="tim">
     <option value="Today`s">
     <option value="2000s">
     <option value="90s">
     <option value="70s">
     <option value="50s">
   </datalist>
 <br><input list="lan" name="dib" placeholder="Language" onchange="resg(this.value,this.placeholder)" autocomplete="off">
   <datalist id="lan">
     <option value="Hindi">
     <option value="Punjabi">
     <option value="English">
     <option value="Spanish">
   </datalist>
 <br><input type="button" value="Search" onclick="srch()">
 </form>
 </header>
</div>
 <select name="ene" id="artist" hidden > </select>
 <select name="ene" id="album"  hidden> </select>
 <select name="ene" id="genre"  hidden> </select>
 <select name="ene" id="age"    hidden> </select>
 <select name="ene" id="language" hidden> </select>
 <h2 id="ls"></h2><br>
 

<h2 id="plpg"></h2>
<br><br>
<div class="cc">
<br> Currently Playing: <span id="cprl"></span><br><br>
 <input id="ppb" type="image" src="images/ply.gif" value="Play" onclick="pp()">
 <input type="image" src="images/next.png" value="Next" onclick="nxt()">
 <input id="pen" type="image" src="images/prev.png" value="Prev" onclick="prev()" disabled><br>
Volume: <input type="Range" value=100 min=10 max=100 onchange="vol(this.value)"><br>
Seek: <span id="curtm"></span> <input id="sek" type="Range" value=0 min=0 onchange="seek(this.value);"><span id="ttm"></span>
</div>
<div>
 <span><audio  id="aud" onended="nxt()"></audio></span>
  
</div>
<p id="dummy"></p>

<?php
  //$val = $_REQUEST['iv'];
  $stmt='create table if not exists `'.$email.'` (favourites int unique,sno int AUTO_INCREMENT, primary key(sno));';

  try
  {
   $cmd = new PDO('mysql:host=localhost;dbname=accounts', 'root', '');
   $cmd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $que=$cmd->query($stmt);
   $cmd =null;
   $cmd = new PDO('mysql:host=localhost;dbname=accounts', 'ext_user', '');
   $cmd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $stmt='select favourites from `'.$email.'` ;';
   $que=$cmd->query($stmt);
   $hld=[];
   $pls=[];
   $i=0;
   while($res=$que->fetch(PDO::FETCH_NUM))
    {
      if($res[0]==null)
      {continue;}
      $hld[]=$res[0];
    }
    $stmt="desc `".$email."`;";
    $que=$cmd->query($stmt);
    while($res=$que->fetch(PDO::FETCH_NUM))
     {
       if($res[0]=='sno')
       {continue;}
       $pls[]=$res[0];
     }
    $cmd=null;
    $cmd = new PDO('mysql:host=localhost;dbname=user_song_info', 'ext_user', '');
    while($i<count($hld))
     {
       $stmt='select title from song_list where sid='.$hld[$i].';';
       $que=$cmd->query($stmt);
       $res=$que->fetch(PDO::FETCH_NUM);
       $hld[$i]=$res[0];
       $i++;
     }
  }
  catch(PDOException $e)
  {
     echo "Connection failed: " . $e->getMessage();
  }
?>
<script>
 var plst=[],em='<?php echo $email ?>';
 var i=0,ppb=document.getElementById("ppb"),v,t,u;
 var aud=document.getElementById("aud");
 var arr=[];
    plst[0]='<?php echo json_encode($hld);?>';
    plst=JSON.parse(plst[0]);
    plload(plst);
function plload(arr)
{ i=0;
    document.getElementById('ls').innerHTML="";
    while(i<arr.length)
    {
      document.getElementById('ls').innerHTML+=arr[i]+"<br>";
      arr[i]="song_list/"+arr[i]+".mp3";
      i++;
    }
  aud.src=arr[0];
  arr.length=0;
}
var yplst=[];
  yplst[0]='<?php echo json_encode($pls)?>';
  yplst=JSON.parse(yplst[0]);
i=1;
  while(i<yplst.length)
  {
   crtpl(yplst[i])
   i++;
  }
 i=1;
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
{
    i-=2;
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
{ var m=0,s=aud.currentTime;
  document.getElementById("sek").value=aud.currentTime;
  while(s>60)
  {
    m++;
    s-=60;
  }
  document.getElementById("curtm").innerHTML=m+":"+parseInt(s);
}
var iv,ph;
function resg(iv,ph)
{var n=0;

  while(n<5)
  {
    if(document.getElementsByName('dib')[n].placeholder==ph)
    { n++;
      continue;
    }
    document.getElementsByName('dib')[n].hidden=true;
    n++;
  }
  ph=ph.toLowerCase();
  var agnt= new XMLHttpRequest();
  agnt.onreadystatechange=function()
  {
    if((this.readyState==4) && (this.status==200))
    { n=0;
      var ret=JSON.parse(this.responseText),j;
      while(n<5)
      { var sel=document.getElementsByName('ene')[n],op;
        if(sel.id==ph)
        { n++;
         continue;}
        sel.hidden=false;
        n++;
      }
      n=0;
      while(n<ret.length)
      { j=0;
        while(j<5)
        { var sel=document.getElementsByName("ene")[j],op;
          if(sel.id==ph)
          { j++;
           continue;}
          op=document.createElement("option");
          op.text=ret[n][j];
          sel.add(op);
          j++;
        }
        n++;
      }
    }
  }
  agnt.open("GET","seprate.php?iv="+iv+"&ph="+ph,true);
  agnt.send();
}
function srch()
{var n=0;
     while(n<5)
     { if(document.getElementsByName('ene')[n].hidden==false )
       {var chk=1;
         break;}
       n++;
     }
     n=0;
   if(document.getElementById("srfl").value!="")
   {
     var agnt = new XMLHttpRequest();
     var v=document.getElementById("srfl").value;
     agnt.onreadystatechange = function()
    {
     if (this.readyState == 4 && this.status == 200)
      {
       if(this.responseText!='[""]')
       {
         plst[0]="song_list/"+document.getElementById("srfl").value+".mp3";
         aud.src=plst[0];
         document.getElementById("ls").innerHTML=document.getElementById("srfl").value;
         document.getElementById("cprl").innerHTML=document.getElementById("srfl").value;;
       }
       else {
         document.getElementById("ls").innerHTML="No Such Song Found";
       }
     }
    }
    agnt.open("GET", "searchspec.php?v="+v, true);
    agnt.send();
   }
 else if (chk==1)
 {
   var agnt = new XMLHttpRequest(),nhv,nhc;
   while(n<5)
   { if(document.getElementsByName('dib')[n].hidden==false )
     { nhv=document.getElementsByName('dib')[n].value;
      nhc=document.getElementsByName('dib')[n].placeholder.toLowerCase();
       break;}
     n++;
    }
     agnt.onreadystatechange = function()
  {
   if (this.readyState == 4 && this.status == 200)
    {
      plst=JSON.parse(this.responseText);
      document.getElementById("cprl").innerHTML=plst[0];
      n=0;
      document.getElementById("ls").innerHTML="";
      while(n<plst.length)
      {
        document.getElementById("ls").innerHTML+=plst[n]+"<br>";
        plst[n]="song_list/"+plst[n]+".mp3";
        n++;
      }
         aud.src=plst[0];
    }
  }
  agnt.open("GET", "searchgiv.php?nhv="+nhv+"&nhc="+nhc, true);
  agnt.send();
 }
else
{document.getElementById("ls").innerHTML="Please Enter an Input String";}
}

function favr()
{
  {
    var agnt = new XMLHttpRequest();
    var id=aud.src;
    id=id.split('t/');
    id=id[2].split('.mp3');
    var nid=id[0].split('%20');
    nid=nid.join(" ");
  agnt.onreadystatechange = function()
   {
    if (this.readyState == 4 && this.status == 200)
     {
      document.getElementById("ls").innerHTML=nid+" is added to your Fav";
     }
   }
   agnt.open("GET", "favor.php?em="+em+"&id="+id[0], true);
   agnt.send();
  }
}

function nhid()
{
  document.getElementById("plnm").hidden=false;
}
var pnlm;
function crtpl(plnm)
{

  if(plnm=="")
  {
    document.getElementById("plpg").innerHTML="Please Enter a Name";
  }
  else
  {
   var agnt = new XMLHttpRequest();
   agnt.open("GET", "crtplaylist.php?em="+em+"&nm="+plnm, true);
   agnt.send();
   op=document.createElement("input");
   op.type='button';
   op.value=plnm;
   op.addEventListener("click",function(){shopl(this.value);});
   document.getElementById("ypl").appendChild(op);
   document.getElementById("plpg").innerHTML="Playlist created";
   document.getElementById("plnm").value="";
   document.getElementById("plnm").hidden=true;
  }
  //document.getElementById("ypl").innerHTML="new playlist"
}
var plva;
function shopl(v)
{
  document.getElementById("plpg").innerHTML="";
  var adpl=document.getElementById("adpl");
  var agnt = new XMLHttpRequest();
  adpl.value="Add to "+v;
  adpl.hidden=false;
  agnt.open("GET", "showplaylist.php?em="+em+"&id="+v, true);
  agnt.send();
   agnt.onreadystatechange=function()
   {
    if (this.readyState == 4 && this.status == 200)
     {var ypl=JSON.parse(this.responseText);
      if(ypl=='')
      {document.getElementById("plpg").innerHTML="Playlist is Empty"}
      else
      {plload(ypl);}
     }
   }
   plva=v;
}
function addtpl()
{
  var id=aud.src;
  id=id.split('t/');
  id=id[2].split('.mp3');
  var nid=id[0].split('%20');
  nid=nid.join(" ");
  var agnt = new XMLHttpRequest();
  agnt.onreadystatechange = function()
   {
    if (this.readyState == 4 && this.status == 200)
    {
     document.getElementById("plpg").innerHTML=(this.responseText);
    }
   }
  document.getElementById("dummy").innerHTML='';
  agnt.open("GET", "addtplaylist.php?em="+em+"&id="+id[0]+"&cnm="+plva, true);
  agnt.send();
}
document.getElementById("plpg").innerHTML="";
//document.getElementById("dummy").innerHTML=plst[0];
</script>



     
</body>
</html>
