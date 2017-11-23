window._backUpalert = alert;
  var removerAlert = function (){
      
      window.alert =alert =  function () {
      // debugger;
      console.log('alert ....');
        };
    }
    removerAlert();
       setInterval(()=>{
           removerAlert();
       }, 1000); 
         setTimeout(()=>{
           removerAlert();
       }, 1000); 