function Validator(options){
    //Hàm validate để in lỗi
    function validate(inputElement, rule){
        var errorMessage = rule.test(inputElement.value);
        var errorElement = inputElement.parentElement.parentElement.querySelector(options.errorSelector);
        if(errorMessage){
            errorElement.innerText = errorMessage;
        } else {
            errorElement.innerText = '';
        }
    }
    // Lấy Element của form cần validate
    var formElement = document.querySelector(options.form);
    if(formElement){
        options.rules.forEach(function(rule){
            var inputElement = formElement.querySelector(rule.selector);
            if(inputElement){
                // xử lí khi blur khỏi input
                inputElement.onblur = function(){
                    validate(inputElement, rule);
                }
                // xử lí khi người dùng nhập input
                inputElement.oninput = function(){
                var errorElement = inputElement.parentElement.parentElement.querySelector(options.errorSelector);
                    errorElement.innerText = '';
                }
            }
        });
    }
}

Validator.isRequired = function(selector){
    return {
        selector : selector,
        test: function(value){
            return value.trim() ? undefined : "Vui lòng điền vào tên đăng nhập";
        }
    };
}
Validator.isEmail = function(selector){
    return {
        selector : selector,
        test: function(value){
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : "Trường này phải là email"
        }
    };
}
Validator.minLength = function(selector, min){
    return {
        selector : selector,
        test: function(value){
            return value.length >= min ? undefined : "Mật khẩu ít nhất 6 kí tự";
        }
    };
}
Validator.isConfirm = function(selector, getConfirmValue){
    return {
        selector : selector,
        test: function(value){
            return value === getConfirmValue() ? undefined : "Mật khẩu nhập lại không đúng";
        }
    }
}