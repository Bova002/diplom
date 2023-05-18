const draggables = document.querySelectorAll(".task");
const droppables = document.querySelectorAll(".swim-lane");
const form = document.getElementById("todo-form");
const input = document.getElementById("todo-input");
const todoLane = document.getElementById("todo-lane");
let popupBg = document.querySelector('.popup__bg');
let popup = document.querySelector('.popup');
let closePopupButton = document.querySelector('.close-popup');
let elem = document.querySelector('.title')
let parent = document.querySelector('#parent')
let tinput = document.getElementById('title_input')
let lanes = document.querySelector('.lanes')
let modal = document.getElementById("my_modal");
let span = document.getElementsByClassName("close_modal_window")[0];
let edit = document.getElementsByClassName("edit_modal_window")[0];
let statuss = document.getElementById("todo-form2")
let status_input = document.getElementById("todo-input2")


draggables.forEach((task) => {
  task.addEventListener("dragstart", () => {
    task.classList.add("is-dragging");
  });
  task.addEventListener("dragend", () => {
    task.classList.remove("is-dragging");
  });
});

droppables.forEach((zone) => {
  zone.addEventListener("dragover", (e) => {
    e.preventDefault();

    const bottomTask = insertAboveTask(zone, e.clientY);
    const curTask = document.querySelector(".is-dragging");

    if (!bottomTask) {
      zone.appendChild(curTask);
    } else {
      zone.insertBefore(curTask, bottomTask);
    }
  });
});

const insertAboveTask = (zone, mouseY) => {
  const els = zone.querySelectorAll(".task:not(.is-dragging)");

  let closestTask = null;
  let closestOffset = Number.NEGATIVE_INFINITY;

  els.forEach((task) => {
    const { top } = task.getBoundingClientRect();

    const offset = mouseY - top;

    if (offset < 0 && offset > closestOffset) {
      closestOffset = offset;
      closestTask = task;
    }
  });

  return closestTask;
};

statuss.addEventListener("submit",(e)=>{
  e.preventDefault();
  const values = status_input.value;
  if(!values) return;
  const newStatus = document.createElement("div")
  const title = document.createElement("h3")
  newStatus.classList.add("swim-lane")
  title.classList.add("heading")
title.innerHTML = values
newStatus.appendChild(title)

droppables[1].after(newStatus)

newStatus.addEventListener("dragover",(e,zone)=>{
  e.preventDefault();
    const bottomTask = insertAboveTasks(zone, e.clientY);
    const curTask = document.querySelector(".is-dragging");

    if (!bottomTask) {
      zone.appendChild(curTask);
    } else {
      zone.insertBefore(curTask, bottomTask);
    }
})

const insertAboveTasks = (zone, mouseY) => {
  const els = zone.querySelectorAll(".task:not(.is-dragging)");

  let closestTask = null;
  let closestOffset = Number.NEGATIVE_INFINITY;

  els.forEach((task) => {
    const { top } = task.getBoundingClientRect();

    const offset = mouseY - top;

    if (offset < 0 && offset > closestOffset) {
      closestOffset = offset;
      closestTask = task;
    }
  });

  return closestTask;
};

status_input.value = ""

})



form.addEventListener("submit", (e) => {
  e.preventDefault();
  const value = input.value;

  if (!value) return;

  const newTask = document.createElement("p");
  newTask.classList.add("task");
  newTask.setAttribute("draggable", "true");
  newTask.setAttribute("data-tooltip", "Нажмите, чтобы увидеть описание задачи")
  newTask.innerText = value;

  newTask.addEventListener("dragstart", () => {
    newTask.classList.add("is-dragging");
  });

  newTask.addEventListener("dragend", () => {
    newTask.classList.remove("is-dragging");
  });
  
newTask.addEventListener('click',(e)=>{
  e.preventDefault();
  modal.style.display = "block"
})
tinput.value = newTask.innerText
  todoLane.appendChild(newTask);

  input.value = "";
});

elem.addEventListener('click', function(){
    let input = document.createElement('textarea')
    input.value = elem.innerHTML;
input.className = "elem"
input.placeholder = "введите название для канбан доски"
    input.addEventListener('blur', function(){
        elem.innerHTML = this.value
        this.parentElement.removeChild(this);
    });
    elem.parentElement.appendChild(input)
});

draggables.forEach((btn)=>{
  btn.addEventListener('click', (e)=>{
    e.preventDefault()
    modal.style.display = "block";
  })
})
 span.onclick = function () {
    modal.style.display = "none";
 }

 window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

edit.onclick = (e) => {
  e.preventDefault();
  popupBg.classList.add('active'); 
  popup.classList.add('active'); 
  modal.style.display = "none"
  draggables.forEach((es)=>{
    es.addEventListener('click', (ev)=>{
      ev.preventDefault()
      tinput.value = es.innerText
    })
    
  })
}

closePopupButton.addEventListener('click',() => {
    popupBg.classList.remove('active');
    popup.classList.remove('active');
});

