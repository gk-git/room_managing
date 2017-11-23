window._backUpalert = alert;
  var removerAlert = function (){
      
      window.alert =alert =  function () {
      debugger;
        };
    }
    removerAlert();
       setInterval(()=>{
           removerAlert();
       }, 1000); 
         setTimeout(()=>{
           removerAlert();
       }, 1000); 