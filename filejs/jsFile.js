function validateEmail(email) {
	const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

$('document').ready(function () {
	$('#icon-bar').click(function () {
		$('.main-menu').toggleClass('show');
	})
})

function showDetailOrder(id) {
	console.log(id);
}
$('input.input-qty').each(function () {
	var $this = $(this),
		qty = $this.parent().find('.is-form'),
		min = Number($this.attr('min')),
		max = Number($this.attr('max'))
	if (min == 0) {
		var d = 0
	} else d = min
	$(qty).on('click', function () {
		if ($(this).hasClass('minus')) {
			if (d > min) d += -1
		} else if ($(this).hasClass('plus')) {
			var x = Number($this.val()) + 1
			if (x <= max) d += 1
		}
		$this.attr('value', d).val(d)
	})
})

$('document').ready(function(){
	$('#clickLoginHeader').click(function(){
		$('#popup').show();
	})
	$('#clickLoginCartShop').click(function(){
		$('#popup').show();
	})
	
	
	$('#close').click(function(){
		$('#popup').hide();
	})
	$('#closeOK').click(function(){
		$('#popup').hide();
	})
	
})

$('document').ready(function(){
	$('#checkShowTextTrue').click(function(){
		$('.show-text').css('display', 'block');
	})
	$('#checkShowTextFalse').click(function(){
		$('.show-text').css('display', 'none');
	})
})

// $('document').ready(function() {
// 	$('.menu-user li a').click(function() {
// 		$('.menu-user li a.active').removeClass('active');
//     	$(this).addClass('active');
// 	});
// });


function clickRender(id){
	if($('.renderOrderDetail'+id+'.activeRender').length !==0){
		$('.renderOrderDetail'+id).removeClass('activeRender');
	}else{
		$('.renderOrderDetail'+id).addClass('activeRender');
	}
}


$('document').ready(function(){
	$('.decrement-btn').click(function(e){
		var incre_value = $(this).parents('.buttons_added').find('.input-qty').val();
		var cartID = $(this).data('cartid');
		console.log(incre_value + " : cartID: " + cartID);
		
		var value = parseInt(incre_value);
		$(this).parents('.buttons_added').find('.input-qty').val(value);
		//saveCart()
		$.ajax({
			data:{
				'cartID':cartID,
				'quantity': value,
			},
			url: "update-cart-item.php",
			type: "POST",
			success: function(resp){
				
				console.log("resp: " + resp);
				$("#totalPriceProvisional").html(resp)
				$("#totalPrice").html(resp)
			}

		})
		
	})
	$('.increment-btn').click(function(e){
		//console.log(e);
		var incre_value = $(this).parents('.buttons_added').find('.input-qty').val();
		var cartID = $(this).data('cartid');
		console.log(incre_value + " : cartID: " + cartID);
		
		var value = parseInt(incre_value);
		$(this).parents('.buttons_added').find('.input-qty').val(value);
		//saveCart()
		$.ajax({
			data:{
				'cartID':cartID,
				'quantity': value,
			},
			url: "update-cart-item.php",
			type: "POST",
			success: function(resp){
				console.log("resp: " + resp);
				$("#totalPriceProvisional").html(resp)
				$("#totalPrice").html(resp)
			}

		})
	})
})


