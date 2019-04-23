function start()
{
  document.getElementById("byIdButton").addEventListener("click", byId, false);
  document.getElementById("insertButton").addEventListener("click", insert, false);
  document.getElementById("appendButton").addEventListener("click", appendNode, false);
  document.getElementById("replaceButton").addEventListener("click", replaceCurrent, false);
  document.getElementById("removeButton").addEventListener("click", remove, false);
  document.getElementById("parentButton").addEventListener("click", parent, false);
  currentNode = document.getElementById("bigheading")
}
function byId()
{
  var id = document.getElementById("gbi").value;
  var target = document.getElementById(id);
  if(target)
    switchto(target);
}
function switchto(newNode)
{
  currentNode.setAttribute("class", "");
  currentNode = newNode;
  currentNode.setAttribute("class", "highlighted");
  document.getElementById("gbi").value=currentNode.getAttribute("id");
}
function insert()
{

}
function appendNode()
{

}
function replaceCurrent()
{

}
function parent()
{
  var target = currentNode.parentNode;
  if(target != document.body)
    switchto(target);
  else
    window.alert("direct child of 'body' element);
}
window.addEventListener("load", start, false);
