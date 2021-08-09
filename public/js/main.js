
// function loadFile(event){
//     var output = document.getElementById('output');
//     output.src = URL.createObjectURL(event.target.files[0])
//     output.onload = function (){
//         URL.revokeObjectURL(output.src) 
// }}


function addImage(input){
    var file=$("input[type=file]").get(0).files[0];
    if(file){
      var reader = new FileReader();
      reader.onload = function(){
        $('#platImage').attr("src",reader.result);
        $('#image').attr("value",reader.result);
      }
      reader.readAsDataURL(file);
    }
}
