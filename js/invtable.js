$(document).ready(function(){


    var i=1;
    $("#add_row").click(function(){
				b=i-1;
				$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
				//$(".doctype").removeClass("doctype");
				//$(".display").removeClass("display");
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
				
				i++; 
				 
  	});
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
	});
	
	$('#tab_logic tbody ').on('keyup change',function(){
		calc();
	});
	//$('#tax').on('keyup change',function(){
	//	calc_total();
	//});
	

});

function calc() {
	polompPrice = 150000;
	certifyCopyPrice = 10000;
	edditionRate = 0.2;
	stampM = 0;
	stampD = 600000;
	stampKH = 60000;
	stampB = 200000;
	emergancyPrice = 250000;
	scanprice = 10000;
	scanPolompPrice = 25000;

	
	$('#tab_logic tbody tr').each(function() {
		var html = $(this).html();
		
		if(html!='') {
			var docQty = $(this).find("#docqty").val();
			var polompQty = $(this).find('.polompqty').val();
			var paperQty = $(this).find('.paperqty').val();
			var edditionType = $(this).find('.eddition').val();
			var stampType = $(this).find('.stamptype').val();
			var docPrice = $(this).find('.docprice').val();
			var overPlus = $(this).find('.overplus').val();
			//var totalprice = $(this).find('.total').val();

			docQty = docQty || 0;
			//if (isNaN(docQty)) {docQty = 0;}
			if (isNaN(polompQty)) {polompQty = 0;}
			if (isNaN(paperQty)) {paperQty = 0;}
			if (isNaN(docPrice)) {docPrice = 0;}
			if (isNaN(overPlus)) {overPlus = 0;}

			console.log(docQty,polompQty,paperQty,edditionType,stampType,docPrice,overPlus,parseInt(overPlus));

			if (docQty > 100) {
				$.ajax({
					type: "POST",
					url: "../engine/invRowPrice.php",
					data: {
						documentqty : parseInt(docQty), 
						polomp : parseInt(polompQty),
						paper : parseInt(paperQty),
						edditiontype: edditionType,
						stamp: stampType,
						price: parseInt(docPrice),
						overplusprice : parseInt(overPlus)
					},
					success: 
						function(trprice){ 
							//$('.total').each(function() {

							//	$('total').val(trprice);
							//})
						//$('#tab_logic tbody tr').each(function() {
						//$(this).closest("tr").find('.total').val(trprice)
						//})
						//$('.total').last().val(trprice)
				 			totalprice = trprice;

						}
				});  
			}

			if (edditionType = "secondry") {
				docPrice = docPrice * edditionRate;
			}
			if (stampType = "MD") {
				stampPrice = stampD * polompQty;
			} else if (stampType = "MDKH") {
				stampPrice = stampD * polompQty + stampKH * paperQty;	
			} else if (stampType = "MDBKH") {
				stampPrice = stampD * polompQty + stampKH * paperQty + stampB * polompQty;
			} else {
				stampPrice = 0;
			}
			//price = docQty * docPrice + 
			//		polompQty * polompPrice +
			//		paperQty * certifyCopyPrice +
			//		stampPrice + overPlus;
			//if (overPlus == "") {overPlus = 0;}
			price = docQty * docPrice + 
					polompQty * polompPrice + 
					paperQty * certifyCopyPrice + 
					stampPrice + overPlus;


			$(this).find('.total').val(price);
			
			calc_total();
		}
	});
}

function calc_total()
{
	total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total);
	//tax_sum=total/100*$('#tax').val();
	//$('#tax_amount').val(tax_sum.toFixed(2));
	disscount = $('#discount').val();
	//$('#total_amount').val((tax_sum+total).toFixed(2));

	$('#total_amount').val((total - disscount));

}