<!-- <?php 
    session_start();

    if(!isset($_SESSION['login_id']))
    {

    header('Location:http://localhost/Fairway/login.php');
    exit();

    }

 ?> -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reports -> Fairway Pharmaceuticals | The Right choice </title>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="css/reports.css">
</head>

<body style="background: linear-gradient(to right, #9796f0, #fbc7d4);">
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">Fairway</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
          <a class="mdl-navigation__link" href="admin.php"><i class="zmdi zmdi-home zmdi-hc-lg"></i> Dashboard</a>
          <a class="mdl-navigation__link" href="addOffer.php"><i class="zmdi zmdi-cake zmdi-hc-lg"></i> Add Offer </a>
          <a class="mdl-navigation__link" href="createEmployee.php" id="cemp"><i class="zmdi zmdi-account-add zmdi-hc-lg"></i>
            Create Employee</a>
          <a class="mdl-navigation__link" href="reports.php"><i class="zmdi zmdi-chart zmdi-hc-lg"></i> Reports</a>
          <a class="mdl-navigation__link" href="backend/logout.php"><i class="zmdi zmdi-lock-open zmdi-hc-lg"></i> Logout</a>
        </nav>
      </div>
    </header>
    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">Fairway</span>
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="admin.php"><i class="zmdi zmdi-home zmdi-hc-lg"></i>&nbsp;Dashboard</a>
        <a class="mdl-navigation__link" href="addOffer.php"><i class="zmdi zmdi-cake zmdi-hc-lg"></i>&nbsp;Add Offer </a>
        <a class="mdl-navigation__link" href="createEmployee.php" id="cemp"><i class="zmdi zmdi-account-add zmdi-hc-lg"></i>&nbsp;Create
          Employee
        </a>
        <a class="mdl-navigation__link" href="reports.php"><i class="zmdi zmdi-chart zmdi-hc-lg"></i>&nbsp;Reports</a>
        <hr/>
        <a class="mdl-navigation__link" href="backend/logout.php"><i class="zmdi zmdi-lock-open zmdi-hc-lg"></i>&nbsp;&nbsp;Logout</a>
      </nav>
    </div>
    <main class="mdl-layout__content">

      <div class="page-content">
        <!-- Your content goes here -->
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
          <div class="mdl-tabs__tab-bar">
            <a href="#sales" class="mdl-tabs__tab is-active">SALES & Stock</a>
            <a href="#expense" class="mdl-tabs__tab">Expense</a>
          </div>

          <div class="mdl-tabs__panel is-active" id="sales">
            <center>
              <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--3-col-phone">
                  <span class="mdl-chip mdl-chip--contact">
                    <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><i class="zmdi zmdi-face"></i></span>
                    <span class="mdl-chip__text"> <input type="text" id="S-Name-sales" placeholder="Search by Stockiest Name">
                    </span>
                  </span>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--1-col-phone">
                  <span class="mdl-chip mdl-chip--contact">
                    <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><i class="zmdi zmdi-calendar-alt"></i></span>
                    <span class="mdl-chip__text"> <input type="month" placeholder="Month/Year" />
                    </span>
                  </span>
                </div>

              </div>
              <div style="position:relative;margin: 0 auto; overflow-x:scroll; overflow-y: hidden;">

                <table id="salesTable" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                  <thead>
                    <tr>
                      <th class="mdl-data-table__cell--non-numeric">Product Name</th>
                      <th>Packing</th>
                      <th>Op. Qty</th>
                      <th>Opening Bal &#8377;</th>
                      <th>Receipt Qty</th>
                      <th>Receipt Val &#8377;</th>
                      <th>Total Qty</th>
                      <th>Issue Qty</th>
                      <th>Issue/Sales Val &#8377;</th>
                      <th>Closing Qty</th>
                      <th>Closing Bal &#8377;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th class="mdl-data-table__cell--non-numeric">Fairway cold</th>
                      <th>1*10</th>
                      <th>35</th>
                      <th>2560 </th>
                      <th>250</th>
                      <th>2254</th>
                      <th>262</th>
                      <th>150</th>
                      <th>1256</th>
                      <th>140</th>
                      <th>1849</th>
                    </tr>
                    <tr>
                      <th class="mdl-data-table__cell--non-numeric">Fairway cold</th>
                      <th>1*10</th>
                      <th>35</th>
                      <th>2560 </th>
                      <th>250</th>
                      <th>2254</th>
                      <th>262</th>
                      <th>150</th>
                      <th>1256</th>
                      <th>140</th>
                      <th>1849</th>
                    </tr>
                    <tr>
                      <th class="mdl-data-table__cell--non-numeric">Fairway cold</th>
                      <th>1*10</th>
                      <th>35</th>
                      <th>2560 </th>
                      <th>250</th>
                      <th>2254</th>
                      <th>262</th>
                      <th>150</th>
                      <th>1256</th>
                      <th>140</th>
                      <th>1849</th>
                    </tr>
                  </tbody>
                </table>
                <br>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" onclick="printSaleVoucher()"><i
                    class="zmdi zmdi-print zmdi-hc-lg"></i>&nbsp;Print</button>
                <br>
              </div>
            </center>
          </div>

          <div class="mdl-tabs__panel" id="expense">
            <center>
              <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--3-col-phone">
                  <span class="mdl-chip mdl-chip--contact">
                    <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><i class="zmdi zmdi-face"></i></span>
                    <span class="mdl-chip__text"> <input id="mrName" type="text" placeholder="Search by MR Name">
                    </span>
                  </span>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--1-col-phone">
                  <span class="mdl-chip mdl-chip--contact">
                    <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><i class="zmdi zmdi-calendar-alt"></i></span>
                    <span class="mdl-chip__text"> <input type="month" id="E-month" placeholder="Month/Year" />
                    </span>
                  </span>
                </div>

              </div>

              <div style="position:relative;margin: 0 auto; overflow-x:scroll; overflow-y: hidden;">

                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th class="mdl-data-table__cell--non-numeric">From</th>
                      <th class="mdl-data-table__cell--non-numeric">To</th>
                      <th>Distance</th>
                      <th>Fare &#8377;</th>
                      <th>TA &#8377;</th>
                      <th>Origin</th>
                      <th>D.A. &#8377;</th>
                      <th>Total &#8377;</th>
                      <th class="mdl-data-table__cell--non-numeric">Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>25/08/2018</td>
                      <td class="mdl-data-table__cell--non-numeric">Kolkata</td>
                      <td class="mdl-data-table__cell--non-numeric">Hawdara</td>
                      <td>50</td>
                      <td>2</td>
                      <td>100</td>
                      <td>HQ</td>
                      <td>250</td>
                      <td>350</td>
                      <td class="mdl-data-table__cell--non-numeric">Just testing</td>
                    </tr>
                    <tr>
                      <td>26/08/2018</td>
                      <td class="mdl-data-table__cell--non-numeric">Mumbai</td>
                      <td class="mdl-data-table__cell--non-numeric">Pune</td>
                      <td>80</td>
                      <td>2.5</td>
                      <td>155</td>
                      <td>EX-HQ</td>
                      <td>210</td>
                      <td>365</td>
                      <td class="mdl-data-table__cell--non-numeric">Sync data like this</td>
                    </tr>
                    <tr>
                      <td>30/08/2018</td>
                      <td class="mdl-data-table__cell--non-numeric">Delhi</td>
                      <td class="mdl-data-table__cell--non-numeric">NCR </td>
                      <td>151 </td>
                      <td>3.5</td>
                      <td>528.5</td>
                      <td>Other</td>
                      <td>200</td>
                      <td>728.5</td>
                      <td class="mdl-data-table__cell--non-numeric">Just testing</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td class="mdl-data-table__cell--non-numeric"></td>
                      <td class="mdl-data-table__cell--non-numeric"></td>
                      <td><b>Total = 151 </b> </td>
                      <td></td>
                      <td><b>528.5 </b></td>
                      <td></td>
                      <td><b>200 </b></td>
                      <td><b>728.5 </b></td>
                      <td class="mdl-data-table__cell--non-numeric"></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" onclick="printExpense()"><i
                    class="zmdi zmdi-print zmdi-hc-lg"></i>&nbsp;Print</button>
                <br>
              </div>
            </center>
          </div>

        </div>




      </div>
      <section id="printSaleVoucher">
        <h4 id="stockiestName" style="line-height:0"></h4>
        <p id="address">R. B. Lane, Forbesganj, Araria</p>
        <h6 style="line-height:0; text-decoration: underline;">Sales & Stock Statement (From 01/08/2018 Upto 21/08/2018)</h6>
        <h4 style="text-align: left;line-height: 0;">FAIRWAY</h4>
        <div id="table"></div>
        <hr>
      </section>

      <section id="printExpenseVoucher">
        <span id="printHeader"><h4>EXPENSE STATEMENT</h4>
          <hr>
          <h2>FAIRWAY</h2>
          <h6>PARMACEUTICALS PVT. LTD.</h6>
          <hr>
          <ul>
            <li id="printName" style="padding:150px">Name : </li>
            <li id="printDes" style="padding:150px">Designation : M.R.</li>
            <li id="printHQ" style="padding:150px">H.QR :</li>
          </ul>
          <ul>
            <li id="printMonth" style="padding:150px">Month : </li>
            <li id="printDate" style="padding:150px">Date : </li>
            <li id="printENo" style="padding:150px">Expense No.: </li>
          </ul>
          <hr>
        </span>

      </section>





    </main>
  </div>

  <script src="js/chart.min.js"></script>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>

  <!-- <script src="js/components.js"></script> -->
  <script type="text/javascript">
    $(document).ready(function () {

      fetch_users();

      function fetch_users() {
        $.ajax({

          url: 'backend/fetch_all_emp.php',
          method: 'POST',
          success: function (data) {

            $('#users').html(data);

          }

        })

      }




      //   setInterval(function(){fetch_users();},30000); 




      // fetch_sales_report();


      // function fetch_sales_report()
      //  {

      //    $.ajax({

      //      url:'backend/fetch_sales.php',
      //      method:'POST',
      //      success:function(data){

      //            $('#sales').html(data);


      //                }



      //          });



      //  }


      // setInterval(function(){fetch_sales_report();},30000);




      // fetch_stock_report();


      // function fetch_stock_report()
      //  {

      //    $.ajax({

      //      url:'backend/fetch_stock.php',
      //      method:'POST',
      //      success:function(data){

      //            $('#stock').html(data);


      //                }



      //          });
      //setInterval(function(){fetch_stock_report();},1000);

    });







    function mySearch() {

      var input, filter, table, tr, td, i;

      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      table = document.getElementById('myTable');
      tr = table.getElementsByTagName('tr');
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";

          }
          else {

            tr[i].style.display = 'none';

          }


        }

      }


    }




    function mySearch1() {

      var input, filter, table, tr, td, i;

      input = document.getElementById('myInput1');
      filter = input.value.toUpperCase();
      table = document.getElementById('myTable1');
      tr = table.getElementsByTagName('tr');
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";

          }
          else {

            tr[i].style.display = 'none';

          }


        }

      }


    }


    function mySearch2() {

      var input, filter, table, tr, td, i;

      input = document.getElementById('myInput2');
      filter = input.value.toUpperCase();
      table = document.getElementById('myTable2');
      tr = table.getElementsByTagName('tr');
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";

          }
          else {

            tr[i].style.display = 'none';

          }


        }

      }


    }

    function searchAllExpense() {
      alert("Search All in Expense Table working fine");
    }
    //Print Sale Voucher code 
    function printSaleVoucher() {
      var year = new Date().getFullYear();
      var myTable = document.getElementById("salesTable");
      cloneTable = myTable.cloneNode(true);

      document.getElementById("stockiestName").innerHTML = document.getElementById("S-Name-sales").value + " " + year + "-" + (year + 1);
      document.getElementById("table").appendChild(cloneTable);
      window.print();
    }
    // Print Expense Voucher code
    function printExpense() {
      // var date = today.getDate() + "-" + (today.getMonth() + 1) + "-" + today.getFullYear();
      document.getElementById("printName").innerHTML = document.getElementById("mrName").value;
      document.getElementById("printMonth").innerHTML = document.getElementById("E-month").value;
      // document.getElementById("printDate").innerHTML = ;
      // document.getElementById("printName").innerHTML = document.getElementById("").value;

      window.print();
    }

  </script>



</body>

</html>