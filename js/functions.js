  function imagePreview(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#" + $(input).data("target")).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }