var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = day + "-" + month + "-" + year;
document.getElementById("issueDate").value = today;

// JS to add new Line using jquary
$(document).ready(function() {
  var max_fields = 25;
  var add_button = $("#addButton");
  var remove_button = $("#delete");

  var x = 1;
  $(add_button).click(function(e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $("#danamic")
        .clone()
        .appendTo(".sale-form");
      // $(wrapper).append(addingdata); //add input box
    } else {
      alert("You Reached the limits");
    }
  });

  $(remove_button).click(function(e) {
    e.preventDefault();
    $("#danamic:last").remove();
  });
});

// // Travel Data submit funtion
// function travelDataSubmit(){
//     var dialog = document.querySelector('dialog');
//     dialog.showModal();
//     if (! dialog.showModal) {
//         dialogPolyfill.registerDialog(dialog);
//       };
//     dialog.querySelector('.close').addEventListener('click', function() {
//         dialog.close()});

//     document.getElementById('showTravelDate').innerHTML = document.getElementById("issueDate").value;
//     document.getElementById('showFrom').innerHTML = document.getElementById("from").value;
//     document.getElementById('showTo').innerHTML = document.getElementById("to").value;
//     document.getElementById('showDistance').innerHTML = document.getElementById("distance").value;
//     document.getElementById('showOffice').innerHTML = document.querySelector('input[name="office"]:checked').value;
//     var total = document.getElementById('TA').value + document.getElementById('DA').value;
//     document.getElementById('showTotal').innerHTML = total;
//     document.getElementById('showRemarks').innerHTML = document.getElementById("remarks").value;

// };

function travelDataSubmit() {
  var dialog = document.querySelector("dialog");
  dialog.showModal();
  if (!dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
  }
  dialog.querySelector(".close").addEventListener("click", function() {
    dialog.close();
  });

  var distance = document.getElementById("distance").value;
  var fare = document.getElementById("fare").value;
  var TA = fare * distance;
  var DA = document.getElementById("DA").value;
  var total = TA + DA;

  document.getElementById("showTravelDate").innerHTML = document.getElementById(
    "issueDate"
  ).value;
  document.getElementById("showFrom").innerHTML = document.getElementById(
    "from"
  ).value;
  document.getElementById("showTo").innerHTML = document.getElementById(
    "to"
  ).value;
  document.getElementById("showOffice").innerHTML = document.querySelector(
    'input[name="office"]:checked'
  ).value;
  document.getElementById("showDistance").innerHTML = document.getElementById(
    "distance"
  ).value;
  document.getElementById("showTotal").innerHTML = "<p>" + total + "</p>";
  document.getElementById("showRemarks").innerHTML = document.getElementById(
    "remarks"
  ).value;
  // console.log("TA is : "+ TA);
  // console.log("DA is : "+ DA);
  // console.log ("Total is : " + total);
}

// code for verification of SALE Data

function saleSubmit() {
  var dialog = document.querySelector("dialog");
  dialog.showModal();
  if (!dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
  }
  dialog.querySelector(".close").addEventListener("click", function() {
    dialog.close();
  });

  document.getElementById("date-D").innerHTML = document.getElementById(
    "issueDate"
  ).value;

  // myTable = document.getElementsByTagName("table")[0];
  // myClone = myTable.cloneNode(true);
  // // document.body.appendChild(myClone);
  // document.getElementById('table-clone').appendChild(myClone);
}

var Tawk_API = Tawk_API || {},
  Tawk_LoadStart = new Date();
(function() {
  var s1 = document.createElement("script"),
    s0 = document.getElementsByTagName("script")[0];
  s1.async = true;
  s1.src = "https://embed.tawk.to/5b7cf754f31d0f771d840655/default";
  s1.charset = "UTF-8";
  s1.setAttribute("crossorigin", "*");
  s0.parentNode.insertBefore(s1, s0);
})();
