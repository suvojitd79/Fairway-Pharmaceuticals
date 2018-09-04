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
    var max_fields      = 25;
    var add_button      = $("#addButton"); 
    var remove_button   = $("#delete");

    var x = 1; 
    $(add_button).click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $("#danamic").clone().appendTo(".sale-form");
            // $(wrapper).append(addingdata); //add input box
    
        }
        else
        {
        alert('You Reached the limits')
        }
    });

    $(remove_button).click(function(e){ 
        e.preventDefault();
        $("#danamic:last").remove();
    });

    });




// Travel Data submit funtion
function travelDataSubmit(){
    var dialog = document.querySelector('dialog');
    dialog.showModal();
    if (! dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
      };
    dialog.querySelector('.close').addEventListener('click', function() {
        dialog.close()});
    
    document.getElementById('showTravelDate').innerHTML = document.getElementById("issueDate").value;
    document.getElementById('showFrom').innerHTML = document.getElementById("from").value;     
    document.getElementById('showTo').innerHTML = document.getElementById("to").value;     
    document.getElementById('showDistance').innerHTML = document.getElementById("distance").value;     
    document.getElementById('showRemarks').innerHTML = document.getElementById("remarks").value;     

};
    
// code for verification of SALE Data 

function saleSubmit(){
    var dialog = document.querySelector('dialog');
    dialog.showModal();
    if (! dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
      };
    dialog.querySelector('.close').addEventListener('click', function() {
        dialog.close()});

    document.getElementById('date-D').innerHTML = document.getElementById("issueDate").value;
   
   
   
    // myTable = document.getElementsByTagName("table")[0];
    // myClone = myTable.cloneNode(true);
    // // document.body.appendChild(myClone);
    // document.getElementById('table-clone').appendChild(myClone);
}