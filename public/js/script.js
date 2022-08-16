var toggleBtn = document.getElementById("toggleBtn");
var menu = document.getElementById('sidebar');
var closeBtn = document.getElementById("closeBtn");
// var addBoard = document.getElementById("add-board");
// var addBoardForm = document.getElementById("modal-wrapper");

toggleBtn.addEventListener('click', handleToggleMenu);
closeBtn.addEventListener('click', closeSideBar);
// addBoard.addEventListener('click', handleToggleAddBoard);
// addBoardForm.addEventListener('click', handlecloseModal);
function handleToggleMenu()
{
    menu.classList.add('d-open');
}

function closeSideBar()
{
    menu.classList.remove('d-open')
}



// Get the button that opens the modal
let btn = document.querySelectorAll("#modal-handler");
// Get the container of list of all the different task status todo container/doing container/done container
var modalContainer= document.querySelectorAll(".modal-container");
// Get the active task status span for todo/doing/done innernav
var hr = document.querySelectorAll(".hr");
// activebar array for tracking
var activeBar ={'todo':0,'doing':1,'done':2};
// Get the add board btn
var addBoardBtn = document.getElementById('add-board-btn');
// Get modal that holds the add task & board form
var dModal = document.getElementById('board-modal');
// Get the add boardform
var boardForm =document.getElementsByClassName('board-form');
// Get the add boardform
var taskForm =document.getElementsByClassName('task-form');
// Get the modal overlay
var overlay = document.getElementById('overlay');
// Get the add task btn
var addTaskBtn  = document.getElementsByClassName("addtaskBtn");

// if(hr.length !=0)
// {
//     showTasks('todo');
// }



addBoardBtn.addEventListener('click', ()=>{
    handleModal(boardForm);
});
addTaskBtn[0].addEventListener('click', ()=>{
    handleModal(taskForm); 
});

overlay.addEventListener('click', ()=>{
    dModal.style.display ="none";
    taskForm[0].style.display ="none";
    boardForm[0].style.display ="none";
    console.log('ss');
});

function handleModal(targetFrom)
{
    menu.classList.remove('d-open')
    dModal.style.display ="block";
    targetFrom[0].style.display ="block";
}

// btn.forEach(el => {
//     el.addEventListener('click', (e)=> {
//         e.preventDefault();
//         // getAttr
//         triggerHandler = e.target.getAttribute('data-trigger');
//         // Get the modal
//         showTasks(triggerHandler);
//     })  
// });

// function showTasks(val)
// {
//     changeActive(val);
//     handleToggleClass(val);
// }

// function changeActive(val)
// {
//     hr.forEach(el =>{
//         if(el.classList.contains('my-hr'))
//         {
//             el.classList.remove('my-hr');
//         }
//     });
//     hr[activeBar[val]].classList.add('my-hr');   
// }

// function handleToggleClass(val)
// {
//     modalContainer.forEach(el=>{
//         if(el.classList.contains('show-task'))
//         {
//             el.classList.remove('show-task');
//         }
//     });
    
//     addClass(val,'show-task');
// }
// function removeClass(targetId,targetClass)
// {
//     document.getElementById(targetId).classList.remove(targetClass);
// }
// function addClass(targetId,targetClass)
// {
//     if(document.getElementById(targetId))
//     {
//         document.getElementById(targetId).classList.add(targetClass);
//     }
    
// }
