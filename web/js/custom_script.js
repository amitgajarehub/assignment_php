//product form validation

	//image type validation
	function validateImage() {
		var formData = new FormData();
	    var file = document.getElementById("uploadFile").files[0];
	    formData.append("Filedata", file);
	    var t = file.type.split('/').pop().toLowerCase();
	    if (t != "jpeg" && t != "jpg" && t != "png") {
	        alert('Please select a valid image file');
	        document.getElementById("uploadFile").value = '';
	        return false;
	    }
	    return true;
	}

	// Defining a function to display error message
	function printError(elemId, hintMsg) {
	  $("#" + elemId).html(hintMsg);
	}
		
	// Product name validate
	function validateName () {
		
		var name = $('[name="name"]').val();

		var regex = /^\w+$/;                
        if(regex.test(name) === false) {
            printError("nameErr", "Please enter a valid Name");
            $("#nameErr").addClass("mystyle");
        } else {
            printError("nameErr", "");
            $("#nameErr").removeClass("mystyle");
            nameErr = false;
        }
	}

	// Product price validate
	function validatePrice () {
		
		var price = $('[name="price"]').val();

		var regex = /^\d+(\.\d{1,2})?$/;                
        if(regex.test(price) === false) {
            printError("priceErr", "Price - Compulsory & Decimal ");
            $("#priceErr").addClass("mystyle");
        } else {
            printError("priceErr", "");
            $("#priceErr").removeClass("mystyle");
            priceErr = false;
        }
	}

	//Not fill any field
	function validateForm() {
		
		//get values
		var name = $('[name="name"]').val();
		var price = $('[name="price"]').val();
		var category = $('[name="category"]').val();

		//check values
		if (name == "") {
			alert("Product Name - Compulsory & Alphanumeric");
			return false;
		}

		if (price == "") {
			alert("Price, Compulsory & Decimal ");
			return false;
		}

		if (category == "") {
			alert("Product Category - Compulsory");
			return false;
		}
	}

/*************** Script End ****************/