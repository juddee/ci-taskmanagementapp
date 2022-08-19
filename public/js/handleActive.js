btn.forEach(el => {
    el.addEventListener('click', (e)=> {
        e.preventDefault();
        // getAttr
        triggerHandler = e.target.getAttribute('data-trigger');
        // Get the modal
        showTasks(triggerHandler);
    })  
});

function showTasks(val)
{
    changeActive(val);
    handleToggleClass(val);
}

function changeActive(val)
{
    hr.forEach(el =>{
        if(el.classList.contains('my-hr'))
        {
            el.classList.remove('my-hr');
        }
    });
    hr[activeBar[val]].classList.add('my-hr');   
}

function handleToggleClass(val)
{
    modalContainer.forEach(el=>{
        if(el.classList.contains('show-task'))
        {
            el.classList.remove('show-task');
        }
    });
    
    addClass(val,'show-task');
}

function addClass(targetId,targetClass)
{
    if(document.getElementById(targetId))
    {
        document.getElementById(targetId).classList.add(targetClass);
    }
    
}
showTasks('todo');