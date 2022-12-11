//https://htmldom.dev/drag-and-drop-element-in-a-list/
let draggingEle;
let placeholder;
let isDraggingStarted = false;
let x = 0;
let y = 0;
let H = 0;
let W = 0;

$(document).ready(function(){
    const list = $("#list");
    let childrens = list.children();
    for(var i=0;i<childrens.length;i++)
        childrens[i].addEventListener("mousedown",mouseDownHandler);
});
$(document).ready(function(){
    $(document).mousemove(function (e) { 
        // values: e.clientX, e.clientY, e.pageX, e.pageY
        // console.log(draggingEle.style.height);
        // console.log(draggingEle.style.width);
        if(draggingEle){
            //console.log(draggingEle.style.height+"//"+draggingEle.style.width);
        }
            
    });
});

const mouseDownHandler = function (e) {
    draggingEle = e.target;
    // Calculate the mouse position
    const rect = draggingEle.getBoundingClientRect();
    H = rect.height;
    W = rect.width;
    x = e.pageX - rect.left;
    y = e.pageY - rect.top;
    
    // Attach the listeners to `document`
    document.addEventListener('mousemove', mouseMoveHandler);
    document.addEventListener('mouseup', mouseUpHandler);
};

const mouseUpHandler = function () {

    // Remove the placeholder
    placeholder && placeholder.parentNode.removeChild(placeholder);
    // Reset the flag
    isDraggingStarted = false;

    // Remove the position styles
    draggingEle.style.removeProperty('top');
    draggingEle.style.removeProperty('left');
    draggingEle.style.removeProperty('position');

    x = null;
    y = null;
    draggingEle = null;

    // Remove the handlers of `mousemove` and `mouseup`
    document.removeEventListener('mousemove', mouseMoveHandler);
    document.removeEventListener('mouseup', mouseUpHandler);
};

const mouseMoveHandler = function(e) {

    let draggingRect = draggingEle.getBoundingClientRect();

    draggingEle.style.position = 'absolute';
    draggingEle.style.top = `${e.pageY - y}px`;
    draggingEle.style.left = `${e.pageX - x}px`;
    draggingEle.style.hieght = H+"px";
    draggingEle.style.width = W+"px";

    if (!isDraggingStarted) {

        isDraggingStarted = true;

        placeholder = document.createElement('div');
        placeholder.classList.add('placeholder');
        // insert placeholder at draggingelement position.
        draggingEle.parentNode.insertBefore(
            placeholder,
            draggingEle.nextSibling
        );

        // Set the placeholder's height
        placeholder.style.height = `${draggingRect.height}px`;
    }

    const prevEle = draggingEle.previousElementSibling;
    const nextEle = placeholder.nextElementSibling;

    if (prevEle && isAbove(draggingEle, prevEle)) {
        swap(placeholder, draggingEle);
        swap(placeholder, prevEle);
        return;
    }

    if (nextEle && isAbove(nextEle, draggingEle)) {
        swap(nextEle, placeholder);
        swap(nextEle, draggingEle);
    }

}
const isAbove = function (nodeA, nodeB) {
    // Get the bounding rectangle of nodes
    const rectA = nodeA.getBoundingClientRect();
    const rectB = nodeB.getBoundingClientRect();

    return rectA.top + rectA.height / 2 < rectB.top + rectB.height / 2;
};
const swap = function (nodeA, nodeB) {
    const parentA = nodeA.parentNode;
    const siblingA = nodeA.nextSibling === nodeB ? nodeA : nodeA.nextSibling;
    //node A
    //node B
    // Move `nodeA` to before the `nodeB`
    nodeB.parentNode.insertBefore(nodeA, nodeB);

    // Move `nodeB` to before the sibling of `nodeA`
    parentA.insertBefore(nodeB, siblingA);
};