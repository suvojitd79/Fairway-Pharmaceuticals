var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = day + "-" + month + "-" + year;
document.getElementById("issueDate").value = today;

// code for issue Medicine submition
function issuemedicine() {
  var dialog = document.querySelector("dialog");
  dialog.showModal();
  if (!dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
  }
  dialog.querySelector(".close").addEventListener("click", function() {
    dialog.close();
  });

  document.getElementById("showIssueDate").innerHTML = document.getElementById(
    "issueDate"
  ).value;
  document.getElementById(
    "displayMedicineName"
  ).innerHTML = document.getElementById("medicineName").value;
  document.getElementById(
    "displaySupplierName"
  ).innerHTML = document.getElementById("supplierName").value;
  document.getElementById("showQuantity").innerHTML = document.getElementById(
    "quantity"
  ).value;
  document.getElementById("showUnit").innerHTML = document.getElementById(
    "unit"
  ).value;
  document.getElementById("showRemarks").innerHTML = document.getElementById(
    "remarks"
  ).value;
}

// code to create new user/Employee with varification
function newUser() {
  var dialog = document.querySelector("dialog");
  dialog.showModal();
  if (!dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
  }
  dialog.querySelector(".close").addEventListener("click", function() {
    dialog.close();
  });

  document.getElementById(
    "showEmployeeName"
  ).innerHTML = document.getElementById("eName").value;
  document.getElementById(
    "showDesignation"
  ).innerHTML = document.getElementById("designation").value;
  document.getElementById("showMobileNo").innerHTML = document.getElementById(
    "mobileNo"
  ).value;
  document.getElementById("showEmail").innerHTML = document.getElementById(
    "email"
  ).value;
  document.getElementById("showPassword").innerHTML = document.getElementById(
    "password"
  ).value;
  document.getElementById("showAddress").innerHTML = document.getElementById(
    "address"
  ).value;
  document.getElementById("showDistrict").innerHTML = document.getElementById(
    "district"
  ).value;
  document.getElementById("showAadhar").innerHTML = document.getElementById(
    "aadhar"
  ).value;
  document.getElementById("showID").innerHTML = document.getElementById(
    "idImage"
  ).value;
  document.getElementById("showRemarks").innerHTML = document.getElementById(
    "remarks"
  ).value;
}
