<!DOCTYPE html>
<html>
<head>
  <title>The Quiz</title>
  <link href="quiz1.css" type="text/css" rel="stylesheet">
</head>
<body>
  <header>
  4 Little Questions to guess what you would like yo listen to
  </header>
   
   
<br><br><div class="a">Q1: Right now.... Would you rather<br>
      <label><input type="radio" name="q1" value='["Sad","Loved"]'   onclick="decd(this.value, this.name)">Take a deep breath and exhale slowly<br></label>
      <label><input type="radio" name="q1" value='["Crazy","Lost"]'  onclick="decd(this.value, this.name)">Take a deep breath and hold it in until you pass out<br></label>
      <label><input type="radio" name="q1" value='["Happy","Crazy"]' onclick="decd(this.value, this.name)">Take a deep breath and scream at the top of your voice<br></label>
</div><br>
<div class="b">2: If you were with a friend...Would you rather<br>
      <label><input type="radio" name="q2" value='["Happy","Crazy"]'onclick="decd(this.value, this.name)">Grab'em by the shoulders and shake their brains out<br></label>
      <label><input type="radio" name="q2" value='["Lost","Loved"]' onclick="decd(this.value, this.name)">Crush'em with a good tight hug<br></label>
      <label><input type="radio" name="q2" value='["Sad","Lost"]'   onclick="decd(this.value, this.name)">Play monopoly or cards until the end of time<br></label>
</div><br><br><br><br><br>
<br><div class="c">>Q3: If asked to be presented with a bevrage... Would you rather have<br>
      <label><input type="radio" name="q3" value='["Happy"]'     onclick="decd(this.value, this.name)">A hot glass of cappachino coffee<br></label>
      <label><input type="radio" name="q3" value='["Crazy"]'     onclick="decd(this.value, this.name)">A can of some strong Energy drink<br></label>
      <label><input type="radio" name="q3" value='["Sad","Lost"]'onclick="decd(this.value, this.name)">Somthing old and with a little C<sub>6</sub>H<sub>2</sub>O<br></label>
</div><br><br><br><br><br>
<div class = "d">Q4: Say you saw a flock of pigeons...Would you rather<br>
      <label><input type="radio" name="q4" value='["Happy","Loved"]'onclick="decd(this.value, this.name)">Run through them and make them all fly, Like in the movies<br></label>
      <label><input type="radio" name="q4" value='["Sad","Lost"]'   onclick="decd(this.value, this.name)">Sit and just watch or feed them your bread<br></label>
      <label><input type="radio" name="q4" value='["Crazy"]'        onclick="decd(this.value, this.name)">Wonder how many can you hit after the first warning shot<br></label>
</div>

<br><br><br><br><br><br><br><br><input type="submit" value="Yup! Done"input id="subton" type="button" value="Yup! That's About Right" onclick="fnl()">

<p id="x"></p>
<form action="Play.php" id="subid" hidden>
  <input name="qip">
</form>
</body>
<script>
var val,nme,ar1=[],ar2=[],ar3=[],ar4=[],arr=[],f=0;
  function decd(val,nme)
  {f=1;
   switch(nme)
   { case 'q1': ar1=JSON.parse(val);
                break;
     case 'q2': ar2=JSON.parse(val);
                break;
     case 'q3': ar3=JSON.parse(val);
                break;
     case 'q4': ar4=JSON.parse(val);
                break;
   }
  }
  function fnl()
  { var i=0,j,x,count=0,tno=0;
    if(f==0)
    {document.getElementById('x').innerHTML="At least one Answer is required";}
    else
    {document.getElementById('subton').disabled=true;
     document.getElementById('subton').value="Computing";
     ar1 = arr.concat(ar1,ar2,ar3,ar4);
     ar1.sort();
     x=ar1.length;
     //document.getElementById('x').innerHTML=ar1;
     while(i<x)
     { j=i+1;
       count=0;
       while(ar1[i]==ar1[j])
       {
        count++;
        j++;
       }
       i=j;
     if((count>tno))
     {
        j=arr.length-1;
         while(typeof arr[j]!='undefined')
         {
           arr.pop();
           j--;
         }
         arr.push(ar1[i-1]);
         tno=count;
      }
     else if (count==tno)
     {arr.push(ar1[i-1]);}
    }
  document.getElementById('x').innerHTML="You are feeling "+arr;
  document.getElementsByName('qip')[0].value=JSON.stringify(arr);
  document.getElementById('subid').submit();
  }
}
</script>
</html>

