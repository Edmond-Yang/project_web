
window.addEventListener("DOMContentLoaded", () => {
  add_template_event();
  tool = new Tool();
  tool.set_item_to_int("block_id");

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
      // blocks_end.ondragstart = (ev) =>{
      //   ev.preventDefault();
      // };
      blocks_end.draggable = "true";
      blocks_end.ondragstart = (ev) =>{
        blocks_end.classList.add("block_move");
      }
      blocks_end.ondragend = (ev) =>{
        blocks_end.classList.remove("block_move");
      }
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
      if (!current){
        current = document.getElementsByClassName("block_move")[0];
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
      else if (i != current) {
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

      if(ev.dataTransfer.getData("type")=="text-only") {
        
        current.id = tool.get_item("block_id")+"_textonly";
        current.contentEditable = "true";
        initial_btn_function_textonly();
      }
      else if(ev.dataTransfer.getData("type")=="image-only"){
        let input = document.createElement("input");
        input.type = "file";
        input.accept = "image/*";
        input.name = "img";
        current.appendChild(input);
        var num = tool.get_item("block_id")
        current.id = num +"_blockonly";

        input.addEventListener("change", function() {

          const reader = new FileReader()
        
          reader.addEventListener("load", () => {
            //document.querySelector("#image").src = reader.result
            let parent = input.parentElement;
            parent.removeChild(input);
            let image = document.createElement("img");
            image.ondragstart = (ev) =>{
              ev.preventDefault();
            }
            let image_parent = document.createElement("div");
            let image_child_l = document.createElement("div");
            

            image_parent.classList.add("block_image");
            image_child_l.classList.add("image_block");
        
            image.width = "200";

            image.class = "input_img";
            image.id="img_" + num + '_blockonly';
            image.src = reader.result;
            image_child_l.appendChild(image);
            image_parent.appendChild(image_child_l);
            parent.appendChild(image_parent);

            initial_btn_function_imgonly(num+'_blockonly');

            // add_image_event(image_parent);
          })
        
          reader.readAsDataURL(this.files[0])
          initial_btn_function_imgonly(num+'_blockonly');

        
        })

        initial_btn_function_imgonly(num+'_blockonly');
        
      }

      current.addEventListener('click', function(){
        if(this.id.includes('textonly')){
          initial_btn_function_textonly();
        }
        else if(this.id.includes('blockonly')){
          initial_btn_function_imgonly(this.id);
        }
      })
    }
  }
}
// function add_image_event(node){

//   let current = node.getElementsByClassName("image_block")[0];
//   current.draggable = "true";
//   current.ondragstart = (ev) =>{

//     let image_child_l = document.createElement("div");
//     let image_child_r = document.createElement("div");
//     image_child_l.classList.add("filling_block");
//     image_child_r.classList.add("filling_block");
//     image_child_l.classList.add("hint");
//     image_child_r.classList.add("hint");
//     node.insertBefore(image_child_l,current);
//     node.insertBefore(image_child_r,current.nextSibling);

//     // add_image_event_2(node,current);
//   };
// }

// function add_image_event_2(node,current){
//   let children = node.children;
  
//   for(var i=0;i<children.length;i++){
//     children[i].ondragenter = (ev) =>{
//       ev.target.classList.add("active");
//     };
//     children[i].ondragleave = (ev) =>{
//       ev.target.classList.remove("active");
//     };
//     children[i].ondragover = (ev) =>{
//       ev.preventDefault();
//     };
//     children[i].ondragend = () =>{
//       for(var j=0;j<children.length;j++){
//         children[j].classList.remove("hint");
//         children[j].classList.remove("active");
//         if(children[j].className.includes("filling_block")){
//           children[j].remove();
//         }
//       }
//     };
//     children[i].ondrop = (ev) =>{
//       ev.preventDefault();

//       if(children[i]!=current){
//         let currentpos=0,droppedpos=0;
//         for(let it=0;it<children.length;it++){
//           if(current == children[it]) currentpos = it;
//           if(children[i] == children[it]) droppedpos = it;
//         }
//         console.log(currentpos);
//         console.log(droppedpos);
//         if(currentpos < droppedpos){
//          node.insertBefore(current,children[i].nextSibling);
//         }
//         else{
//           node.insertBefore(current,children[i]);
//         }
        
//       }
//     };
//   }
// }


  