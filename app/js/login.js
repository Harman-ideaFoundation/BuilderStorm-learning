
    $("#myForm").validate({
        rules: {
                email: {
                required: true,
            email: true,
                    },
            password: {
                required: true
                    }
        },
    messages: {
                email: {
                required: "Email address is required",
            email: "Please enter a valid email address"
                    },
            password: {
                required: "Password is required"
                    }
        },
    submitHandler: function (form, e) {
                event.preventDefault();
            $.ajax({
                type: "POST",
            dataType: "JSON",
            url: "",
            data: $(form).serialize(),
            success: function (response) {
                console.log(response.response);
            // Handle the server response
            if (response.response === "valid") {
                alert("login successfull!");
            window.location.href = "admin/overview.php";
                            } else if (response.response === "invalid") {
                alert("Invalid email or password");
                            }
            else {
                alert("You are blocked!");
                            }
                        }
                    });
                }
    });
