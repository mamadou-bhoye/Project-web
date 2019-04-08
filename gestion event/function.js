
function CheckDate(d) {
      
      var amin=1999;
      var amax=2100; 
      var separateur="/"; 
      var j=(d.substring(0,2));
      var m=(d.substring(3,5));
      var a=(d.substring(6));
      var ok=1;
      if ( ((isNaN(j))||(j<1)||(j>31)) && (ok==1) ) {
         alert("Le jour n'est pas correct."); ok=0;
      }
      if ( ((isNaN(m))||(m<1)||(m>12)) && (ok==1) ) {
         alert("Le mois n'est pas correct."); ok=0;
      }
      if ( ((isNaN(a))||(a<amin)||(a>amax)) && (ok==1) ) {
         alert("L'année n'est pas correcte."); ok=0;
      }
      if ( ((d.substring(2,3)!=separateur)||(d.substring(5,6)!=separateur)) && (ok==1) ) {
         alert("Les séparateurs doivent être des "+separateur); ok=0;
      }
      if (ok==1) {
         var d2=new Date(a,m-1,j);
         j2=d2.getDate();
         m2=d2.getMonth()+1;
         a2=d2.getFullYear();
         if (a2<=100) {a2=1900+a2}
         if ( (j!=j2)||(m!=m2)||(a!=a2) ) {
            alert("La date "+d+" n'existe pas !");
            ok=0;
         }
      }
      return ok;
   }

