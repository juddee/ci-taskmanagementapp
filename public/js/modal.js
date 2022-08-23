       // modal target btn
       const modalTarget = document.querySelectorAll("#modal-target");
       // get data-handler value onclick
       let triggerHandler ;
       // get modal container by data-handler
       let triggerContainer;
       // get url from data-url
       let targetUrl;
       
       // Get the button that opens the modal
       let btnB = document.querySelectorAll("#action-handler");
       // Get the <span> element that closes the modal
       let span = document.getElementsByClassName("close")[0];
       var layer = document.querySelectorAll('.layer');
       // When the user clicks on the button, open the modal    
       btnB.forEach(el => {
       el.addEventListener('click', (e)=> {
           e.preventDefault()
           // getAttr
           triggerHandler = e.target.getAttribute('data-trigger')
           // assign data url
           targetUrl = e.target.getAttribute('data-url')
           
           // asign triggerContainer
           triggerContainer = document.getElementById(triggerHandler)
           // console.log(triggerContainer);
           // Get the modal
           triggerContainer.style.display ="block";
       })  
       });

       layer.forEach((el)=>{
           el.addEventListener('click', function(){
               triggerContainer.style.display ="none";
           });
       });
   
       // redirect the user
       modalTarget.forEach((el)=>{
            el.addEventListener('click', (e) => {
           
                e.preventDefault();
                window.location = targetUrl;
            })
       })

       document.getElementById('updateBtn').addEventListener('click',function(e){
           e.preventDefault();
           window.location = targetUrl;
       });