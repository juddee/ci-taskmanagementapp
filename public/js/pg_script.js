
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
addBoardBtn.addEventListener('click', ()=>{
    handleModal(boardForm);
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