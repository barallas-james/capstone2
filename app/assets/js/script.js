$(document).ready(function(){

	// Materialize Scripts
    $('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown();
    $('.modal').modal();
    $('.tabs').tabs();

  });

// Registration
$("#userRegister").click( () => {

	let fName = $('#fName').val();
	let lName = $('#lName').val();
	let address = $('#address').val();
	let telephone = $('#telephone').val();
	let cellphone = $('#cellphone').val();
	let email = $('#email').val();
	let uName = $('#uName').val();
	let password = $('#password').val();
	let confirmPass = $('#confirmPass').val();

	$.ajax({
		url : '../controllers/userRegister.php',
		method : "POST",
		data : {
			fName : fName,
			lName : lName,
			address : address,
			telephone : telephone,
			cellphone : cellphone,
			email : email,
			uName : uName,
			password : password
		},
		success:(data) => {
			if(data == "user_exists") {
				$("#uName").next().html("Username already exists");
			} else {
				alert("user created successfully");
				//redirect broswer
				window.location.replace("../../index.php");
			}
		}
	});
});

$("#userLogin").click( () => {

	let loginUser = $("#loginUser").val();
	let loginPass = $("#loginPass").val();

	$.ajax({
		url : "../controllers/userLogin.php",
		method : "POST",
		data: {
			loginUser : loginUser,
			loginPass : loginPass
		},
		success:(data) => {
			alert(data);
			window.location.replace("../../index.php");
		}
	});
});

//prep for add to cart
$(".add-to-cart").click( (e) => {
	//to prevent default behavior and to override it with our own
	e.preventDefault();
	//prevent parent elements to be triggered
	e.stopPropagation();

	// target is the one who triggered event
	let item_id = $(e.target).attr("data-id");
	let item_quantity = parseInt($(e.target).prev().val());

	$.ajax({
		url : "../controllers/updateCart.php",
		method : "POST",
		data : {
			item_id:item_id,
			item_quantity:item_quantity,
			update_from_cart_page: 0
		},
		success : (data) => {
			$("#cart-count").html(data);
		}
	});
});

function getTotal() {
	let total = 0;
	$(".item_subtotal").each(function(e) {
		total += parseFloat($(this).html());
	});
	$("#total_price").html(total.toFixed(2));
}

//edit cart NOTE: NEEDS TO REFRESH BEFORE SUBTOTAL AND TOTAL TO APPEAR
$(".item_quantity>input").on("input", (e) =>{
	e.preventDefault();
	e.stopPropagation();

	let item_id = $(e.target).attr('data-id');
	let quantity = parseInt($(e.target).val());
	let price = parseFloat($(e.target).parents('tr').find(".item_price").html());

	subTotal = quantity * price;
	$(e.target).parents('tr').find('.item_subtotal').html(subTotal.toFixed(2));

	getTotal();

	$.ajax({
		method: "POST",
		url : "../controllers/updateCart.php",
		data : {
			item_id : item_id,
			item_quantity : quantity,
			update_from_cart_page : 1
		},
		success: (data) => {
			// alert(data);
			$("#cart-count").html(data);
			getTotal();
		}
	});
});

//delete button
$(document).on("click", '.item-remove', (e) => {
	e.preventDefault();
	e.stopPropagation();

	let item_id = $(e.target).attr('data-id');

	$.ajax({
		method : "POST",
		url : "../controllers/updateCart.php",
		data: {
			item_id : item_id,
			item_quantity : 0
		},
		"beforeSend": () => {
			return confirm("Are you sure you want to delete?");
		},
		"success": (data) => {
			$(e.target).parents('tr').remove();
			$("#cart-count").html(data);
			getTotal();
			window.location.replace("../views/mycart.php");
		}
	});
});