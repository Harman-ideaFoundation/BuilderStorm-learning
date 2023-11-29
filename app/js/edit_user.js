
$("#edit_user_form").validate({
    rules: {
       
        image: {
            extension: "jpg|jpeg|png"
    },
    messages: {
       
        image: {
            extension: "Please upload image only"
        }
    }
   
}});
