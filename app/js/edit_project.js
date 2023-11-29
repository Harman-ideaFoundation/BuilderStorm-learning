
$("#edit_project_form").validate({
    rules: {
        image: {
            extension: "jpg|jpeg|png"
        }
    },
    messages: {
        image: {
            extension: "Please upload image only"
        }
    },
    submitHandler: function (form, e) {
        
        e.preventDefault();
        var formData = new FormData(form);
        
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "ajax_calling.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response.response);
                // Handle the server response
                if (response.response === "not_uploaded") {
                    alert("Sorry, there was an error uploading your image");
                }
                else if (response.response === "project_updated") {
                    alert("Project Updated!");
                    window.location.href = "all_projects.php";
                }
                else {
                    alert("Project Not Updated");
                }
            }
        });
    }
});
