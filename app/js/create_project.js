
$("#create_project_form").validate({
    rules: {
        project_name: {
            required: true
        },
        image: {
            required: true,
            extension: "jpg|jpeg|png"
        },
        address: {
            required: true
        },
        start_date: {
            required:true
        },
        end_date: {
            required:true
        }
    },
    messages: {
        project_name: {
            required: "Project Name is required"
        },
        image: {
            required: "Project Image is required",
            extension: "Please upload image only"
        },
        address: {
            required: "Address is required"
        },
        start_date:{
            required: "Start date is required"
        },
        end_date:{
            required: "End date is required"
        }
    },
    submitHandler: function (form, e) {
        e.preventDefault();
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "../admin/create_project.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response.response);
                // Handle the server response
                if (response.response === "not_uploaded") {
                    alert("Sorry, there was an error uploading your image");
                }
                else if (response.response === "project_created") {
                    alert("Project Created!");
                    window.location.href = "all_projects.php";
                }
                else {
                    alert("Project not created");
                }
            }
        });
    }
});
