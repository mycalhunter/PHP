$(document).ready(function() {
  $("p").animate({
    paddingLeft: "+=20px",
    paddingTop: "+=20px"
  }, 200);
});


const list = [
  "Harry Potter #1",
  "Harry Potter #50",
  "Hermoine Granger #43"
];

/*
item = individual item of array
index = index of individual items in array
array = entire array
*/
list.forEach(function(item, index, array) {
  if (item.indexOf("Harry") !== -1) { //if item contains "Harry", set to UpperCase
    item = item.toUpperCase();
  } else {
    item = item.toLowerCase();
  }
  console.log(index, item); // logs the index # and value of each array item
});