// Part-1

function italicA(x) {
  x.style.fontStyle = "italic";
}

function regularA(x) {
  x.style.fontStyle = "normal";
}

function italicB(x) {
  x.setAttribute("style", "font-style: italic;");
}

function regularB(x) {
  x.setAttribute("style", "font-style: normal;");
}

function setSmall() {
  document.getElementById("taskOne").style.fontSize = "small";
}

function setLarge() {
  document.getElementById("taskOne").style.fontSize = "large";
}

// Part-2

function addElement() {
  var item = document.createElement("LI");
  item.innerHTML = "List Item";
  var list = document.getElementById("taskTwo");
  list.appendChild(item);
}

function removeElement() {
  var list = document.getElementById("taskTwo");
  var lastItem = list.lastChild;
  list.removeChild;
  if (list.hasChildNodes()) {
    list.removeChild(lastItem);
  }
}

// Part-3

function alternatingElement() {
  var list = document.getElementById("taskThree");
  var item = document.createElement("LI");
  var nodes = list.childNodes.length;
  if (nodes == 1) {
    item.className = "odd";
  } else if (nodes % 2 != 0) {
    list.firstElementChild.className == "odd"
      ? (item.className = "odd")
      : (item.className = "even");
  } else {
    list.firstElementChild.className == "odd"
      ? (item.className = "even")
      : (item.className = "odd");
  }
  item.innerHTML = list.childNodes.length;
  list.appendChild(item);
}

function alternateListColor() {
  var list = document.getElementById("taskThree").childNodes;
  for (var i = 0; i < list.length; i++) {
    if (list[i].className == "odd") {
      list[i].className = "even";
    } else if (list[i].className == "even") {
      list[i].className = "odd";
    }
  }
}

// Part-4

function addCourse() {
  var form = document.getElementById("taskFour");
  var div = document.createElement("DIV");
  //
  var input = document.createElement("INPUT");
  input.setAttribute("type", "text");
  input.setAttribute("placeholder", "Course Title");
  input.setAttribute("size", "35");
  div.appendChild(input);
  //
  var input = document.createElement("INPUT");
  input.setAttribute("type", "text");
  input.setAttribute("placeholder", "Course Instructor");
  input.setAttribute("size", "25");
  div.appendChild(input);
  //
  var input = document.createElement("INPUT");
  input.setAttribute("type", "text");
  input.setAttribute("placeholder", "Credits");
  input.setAttribute("size", "5");
  div.appendChild(input);
  //
  form.appendChild(div);
}
