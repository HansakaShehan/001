document.addEventListener("DOMContentLoaded", function () {
  const addTaskBtn = document.getElementById("add-task-btn");
  if (addTaskBtn) {
    addTaskBtn.addEventListener("click", function () {
      addTask();
    });
  }
});

function addTask() {
  const title = document.getElementById("title");
  const description = document.getElementById("description");
  const category = document.getElementById("category");
  const dueDate = document.getElementById("due_date");
  const dueTime = document.getElementById("due_time");

  const today = new Date();
  today.setHours(0, 0, 0, 0);

  const selectedDate = new Date(dueDate.value);
  let hasError = false;

  if (title.value.trim() === "") {
    title.classList.add("is-invalid");
    hasError = true;
  } else {
    title.classList.remove("is-invalid");
  }

  if (description.value.trim() === "") {
    description.classList.add("is-invalid");
    hasError = true;
  } else {
    description.classList.remove("is-invalid");
  }

  if (category.value === "" || category.value === null) {
    category.classList.add("is-invalid");
    hasError = true;
  } else {
    category.classList.remove("is-invalid");
  }

  if (dueDate.value.trim() === "" || selectedDate < today) {
    dueDate.classList.add("is-invalid");
    hasError = true;
  } else {
    dueDate.classList.remove("is-invalid");
  }

  if (dueTime.value.trim() === "") {
    dueTime.classList.add("is-invalid");
    hasError = true;
  } else {
    dueTime.classList.remove("is-invalid");
  }

  if (hasError) {
    return;
  }

  store({
    title: title.value,
    description: description.value,
    category: category.value,
    due_date: dueDate.value,
    due_time: dueTime.value,
    status: "pending",
  });

  title.value = "";
  description.value = "";
  category.value = "";
  dueDate.value = "";
  dueTime.value = "";
}

function store(task) {
  let lastTaskId = localStorage.getItem("last-task-id");
  if (lastTaskId === null) {
    lastTaskId = 0;
  }

  task.id = lastTaskId++;

  localStorage.setItem("task-id-" + lastTaskId, JSON.stringify(task));
  localStorage.setItem("last-task-id", lastTaskId);

  window.location.href = "/practise/001/";
}

function viewTaks(status = "all") {
  const emptyView = document.getElementById("emptyView");

  let tasks = getTasks(status);

  if (tasks.length == 0) {
    emptyView.classList.remove("d-none");
  } else {
    emptyView.classList.add("d-none");
  }

  const taskContainer = document.getElementById("taskContainer");
  taskContainer.innerHTML = "";

  tasks.forEach((task) => {
    const taskCard = createTaskCard(task);

    taskContainer.appendChild(taskCard);
  });
}

function createTaskCard({
  id,
  title,
  category,
  description,
  due_date,
  due_time,
  status,
}) {
  const card = document.createElement("div");
  card.className = "card todo-card shadow-sm mb-3 mt-3";

  card.innerHTML = `
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" value="" id="${id}">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5 class="card-title mb-1">${title}</h5>
                    <p class="text-muted mb-2">
                        <i class="bi bi-tags-fill me-1"></i> Category: <strong>${category}</strong>
                    </p>
                    <p class="card-text">${description}</p>
                    <div class="d-flex gap-3 text-muted">
                        <div><i class="bi bi-calendar-event me-1"></i> <strong>${due_date}</strong></div>
                        <div><i class="bi bi-clock me-1"></i> <strong>${due_time}</strong></div>
                    </div>
                </div>
                <span class="badge bg-warning text-dark ms-3 mt-1">${status}</span>
            </div>
        </div>
    `;

  return card;
}

function getTasks(status) {
  let tasks = [];
  let lastTaskId = localStorage.getItem("last-task-id");

  if (lastTaskId === null) {
    return tasks;
  } else {
    for (let i = 1; i <= lastTaskId; i++) {
      let task = JSON.parse(localStorage.getItem("task-id-" + i));

      if (task) {
        if (status == "all") {
          tasks.push(task);
        } else {
          if (task.status == status) {
            tasks.push(task);
          }
        }
      }
    }

    return tasks;
  }
}
