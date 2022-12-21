window.addEventListener("DOMContentLoaded", () => {
  add_template_event();
});
function add_template_event(){

  let items = document.getElementsByClassName("template"), current = null;

  for(let i of items){
    i.draggable = true;

    i.ondragstart = (ev) => {
      if(i.id=="text-only")
        ev.dataTransfer.setData("type","text-only");
      else if(i.id=="image-only")
        ev.dataTransfer.setData("type","image-only");

      var blocks_end = document.createElement("div");

      blocks_end.className = "block" ;
      current = blocks_end;
      blocks_end.classList.add("block_end");
      document.getElementById("sortlist").appendChild(blocks_end);

      add_block_event();

      let blocks = document.getElementsByClassName("block");
      for(let j of blocks){
        j.classList.add("hint");
      }
    }

    i.ondragend = (ev) =>{
      let blocks = document.getElementsByClassName("block");
      for(let j of blocks){
        j.classList.remove("hint");
      }
      let block_end = document.getElementsByClassName("block_end")[0];
      if(block_end){
        document.getElementById("sortlist").removeChild(block_end);
      }
    }
  }
}
function add_block_event(){
  let blocks = document.getElementsByClassName("block");

  for(let i of blocks){

    i.ondragenter = (ev) =>{
      i.classList.add("active");
    }
    i.ondragleave = (ev) =>{
      i.classList.remove("active");
    }
    i.ondragover = (ev) =>{
      ev.preventDefault();
    }
    i.ondrop = (ev) =>{
      ev.preventDefault();
      let current = document.getElementsByClassName("block_end")[0];
      let items = document.getElementsByClassName("block");

      if (i != current) {
        let currentpos = -1, droppedpos = -1;
        for (let it=0; it<items.length; it++) {
          if (current == items[it]) { currentpos = it; }
          if (i == items[it]) { droppedpos = it; }
        }

        if (currentpos < droppedpos) {
          i.parentNode.insertBefore(current, i.nextSibling);
        } else {
          i.parentNode.insertBefore(current, i);
        }
      }
      current.classList.remove("block_end");
      i.classList.remove("active");

      if(ev.dataTransfer.getData("type")=="text-only") current.contentEditable = "true";
      else if(ev.dataTransfer.getData("type")=="image-only"){
        let input = document.createElement("input");
        input.type = "file";
        input.accept = "image/*";
        input.name = "img";
        input.addEventListener("change", function() {

          const reader = new FileReader()
        
          reader.addEventListener("load", () => {
            //document.querySelector("#image").src = reader.result
            let parent = input.parentElement;
            parent.removeChild(input);
            let image = document.createElement("img");
            image.width = "200";
            image.src = reader.result;
            parent.appendChild(image);
          })
        
          reader.readAsDataURL(this.files[0])
        
        })
        current.appendChild(input);
      }
    }
  }
}


  