
$.validator.addMethod("passwordPattern", function (value, element) {
    // Customize your password pattern here
    return /^(?=.*[a-z])(?=.*[A-Z]).{6,}$/.test(value);
});


$("#create_user_form").validate({
    rules: {
        email: {
            required: true,
            email: true,
        },
        first_name: {
            required: true
        },
        user_type:{
            required:true
        },
        last_name:{
            required: true
        },
        dob:{
            required:true
        },
        file:{
            required: true,
            extension: "jpg|jpeg|png"
        },
        password:{
            required: true, 
            passwordPattern: true
        },
        address:{
            required:true
        }
    },
    messages: {
        email: {
            required: "Email address is required",
            email: "Please enter a valid email address"
        },
        first_name: {
            required: "First Name is required"
        },
        user_type: {
            required: "User Type is required"
        },
        last_name: {
            required: "Last Name is required"
        },
        dob:{
            required: "D.O.B is required"
        },
        file:{
            required: "Profile Image is required",
            extension: "Please upload image only"
        },
        password:{
            required:"Password is required",
            passwordPattern: "Password must contain at least one uppercase letter, one lowercase letter, and at least 8 characters."
        },
        address:{
            required: "Address is required"
        }
    },
    submitHandler: function (form, e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "../admin/create_user.php",
            data: $(form).serialize(),
            success: function (response) {
                console.log(response.response);
                // Handle the server response
                if (response.response === "Sorry, there was an error uploading your file") {
                    alert("Sorry, there was an error uploading your image");
                }
                else if (response.response === "user created") {
                    alert("User Created!");
                }
                else {
                    alert("user not created");
                }
            }
        });
    }
});
