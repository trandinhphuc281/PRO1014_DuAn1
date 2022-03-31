/*--------check fullName----------*/
function is_fullName(is_fullName) {
    var nameregex = /^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$/;
    if (is_fullName.match(nameregex)) {
        return true;
    } else {
        return false;
    }
}
function checkName() {
    var name = document.querySelector("#username").value;
    name = name.trim()
    if (name == '' || name == null) {
        document.getElementById('errorName').innerHTML = "Họ và tên không được để trống";
        document.getElementById("username").style.border = "1px solid red";
        document.getElementById('submit').disabled = true;
    }
    else if (is_fullName(name) == false && is_fullName(name) == "") {
        document.getElementById('errorName').innerHTML = "Họ và tên không đúng định dạng";
        document.getElementById("username").style.border = "1px solid red";
        document.getElementById('submit').disabled = true;
    }
    else {
        document.getElementById('errorName').innerHTML = "";
        document.getElementById("username").style.border = "1px solid green";
        document.getElementById('submit').disabled = false;
    }
}
/*----------check Email----------*/
function is_mail(email) {
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email.match(mailformat)) {
        return true;
    }
    else {
        return false;
    }
}
function checkEmail() {
    var email = document.querySelector('#email').value;
    email = email.trim()
    if (email == '' || email == null) {
        document.getElementById("errorEmail").innerHTML = "Email không được để trống";
        document.getElementById("email").style.border = '1px solid red';
        document.getElementById("submit").disabled = true;
    }
    else if (is_mail(email) == false) {
        document.getElementById("errorEmail").innerHTML = "Email không đúng định dạng";
        document.getElementById("email").style.border = '1px solid red';
        document.getElementById("submit").disabled = true;
    }
    else {
        document.getElementById("errorEmail").innerHTML = "";
        document.getElementById("email").style.border = '1px solid green';
        document.getElementById('submit').disabled = false;
    }
}
/*---------check Password---------*/
function checkPassword() {
    var password = document.getElementById("password").value;
    if (password == '' || password == null) {
        document.getElementById('errorPassword').innerHTML = "Mật khẩu không được để trống";
        document.getElementById("password").style.border = "1px solid red";
        document.getElementById("submit").disabled = true;
    }
    else if (password.length < 6) {
        document.getElementById('errorPassword').innerHTML = "Mật khẩu phải lớn hơn 6 kí tự";
        document.getElementById("password").style.border = "1px solid red";
        document.getElementById("submit").disabled = true;
    }
    else {
        document.getElementById('errorPassword').innerHTML = "";
        document.getElementById("password").style.border = "1px solid green";
        document.getElementById("submit").disabled = false;
    }
}
/*----------check Phone----------*/
function is_phoneNumber(phone) {
    var phoneregex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if (phone.match(phoneregex)) {
        return true;
    } else {
        return false;
    }
}
function checkPhone() {
    var phone = document.querySelector('#phone').value;
    phone = phone.trim()
    if (phone == '' || phone == null) {
        document.getElementById('errorPhone').innerHTML = "Số điện thoại không được để trống";
        document.getElementById("phone").style.border = "1px solid red";
        document.getElementById('submit').disabled = true;
    }
    else if (is_phoneNumber(phone) == false) {
        document.getElementById('errorPhone').innerHTML = "Số điện thoại không đúng định dạng";
        document.getElementById("phone").style.border = "1px solid red";
        document.getElementById('submit').disabled = true;
    }
    else {
        document.getElementById('errorPhone').innerHTML = "";
        document.getElementById("phone").style.border = "1px solid green";
        document.getElementById('submit').disabled = false;
    }
}
/*----------check Address----------*/
function chekAddress() {
    var address = document.querySelector('#address').value;
    if (address == '' || address == null) {
        document.getElementById('errorAddress').innerHTML = "Địa chỉ không được để trống";
        document.getElementById('address').style.border = "1px solid red";
        document.getElementById('submit').disabled = true;
    }
    else {
        document.getElementById('errorAddress').innerHTML = "";
        document.getElementById('address').style.border = "1px solid green";
        document.getElementById('submit').disabled = falses;
    }
}
/*----------check Content----------*/
function checkContent() {
    var content = document.getElementById("contents").value;
    if (content == "" || content == null) {
        document.getElementById('errorContents').innerHTML = "Nội dung không được để trống";
        document.getElementById('contents').style.border = "1px solid red";
        document.getElementById('submit').disabled = true;
    }
    else {
        document.getElementById('errorContents').innerHTML = "";
        document.getElementById('contents').style.border = "1px solid green";
        document.getElementById('submit').disabled = falses;
    }
}