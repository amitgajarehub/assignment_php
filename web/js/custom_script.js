
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