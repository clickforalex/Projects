function increase(id){
    var a = 1;
    var textBox = document.getElementById(id);
    textBox.value++;
    
}    
function decrease(id){
  var textBox = document.getElementById(id);
  if (textBox.value > 0)
    textBox.value--;
  else{
    alert ("Minimum quantity must not go below zero")
  }
}    