var minus = document.getElementsByClassName('minus-button');
var plus = document.getElementsByClassName('plus-button');
//console.log(minus);
//console.log(plus);
// let countBox = +document.getElementByClassName('count-box').innerHTML;

for(var i = 0; i<minus.length; i++){
  var button = minus[i];
  button.addEventListener('click', function(event){
  var buttonClicked = event.target;
  console.log(buttonClicked);
  var input = buttonClicked.parentElement.children[0];
  var inputValue = input.value;
  var newValue = parseInt(inputValue) - 1;
  input.value = newValue;
})
}

for(var i = 0; i<plus.length; i++){
  var button = plus[i];
  button.addEventListener('click', function(event){
  var buttonClicked = event.target;
  console.log(buttonClicked);
  var input = buttonClicked.parentElement.children[0];
  var inputValue = input.value;
  var newValue = parseInt(inputValue) + 1;
  input.value = newValue;
})
}
