document.getElementById("inv-form")



function createInvoiceRow () {


}

xhttp.open("POST","engine/invoice.php")

function calculatePrice() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) { // 4: request finished and response is ready
                                                        // 200: "OK"

        document.getElementById("invoice-row").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "engine/invoice.php", true);
    xhttp.send();
  }