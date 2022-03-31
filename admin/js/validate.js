function checkParent() {
    var parentId = document.querySelector("#parent_id").value;
    if (parentId == "" || parentId == null) {
        document.getElementById('errorParent').innerHTML = "Không được để trống Parent Id";
        document.getElementById('parent_id').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else {
        document.getElementById('errorParent').innerHTML = "";
        document.getElementById('parent_id').style.border = "2px solid green";
        document.getElementById('submit').disable = false;
    }
}

function checkCate() {
    var cate = document.querySelector('#categorie').value;
    if (cate == "" || cate == null) {
        document.getElementById('errorCate').innerHTML = "Không được để trống tên loại hàng";
        document.getElementById('categorie').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else {
        document.getElementById('errorCate').innerHTML = "";
        document.getElementById('categorie').style.border = "2px solid green";
        document.getElementById('submit').disable = false;
    }
}

function checkTitle() {
    var title = document.querySelector('#title').value;
    if (title == "" || title == null) {
        document.getElementById('errorTitle').innerHTML = "Không được để trống tiêu đề";
        document.getElementById('title').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    } else if (title.length > 100) {
        document.getElementById('errorTitle').innerHTML = "Tiêu đề không được vượt quá 100 kí tự";
        document.getElementById('title').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else {
        document.getElementById('errorTitle').innerHTML = "";
        document.getElementById('title').style.border = "2px solid green";
        document.getElementById('submit').disable = false;
    }
}

function checkDiscription() {
    var discription = document.querySelector('#dicription').value;
    if (discription == "" || discription == null) {
        document.getElementById('errorDiscription').innerHTML = "Không được để trống mô tả";
        document.getElementById('dicription').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else if (discription.length > 200) {
        document.getElementById('errorDiscription').innerHTML = "Mô tả không được vượt quá 200 kí tự";
        document.getElementById('dicription').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else {
        document.getElementById('errorDiscription').innerHTML = "";
        document.getElementById('dicription').style.border = "2px solid green";
        document.getElementById('submit').disable = false;
    }
}

function checkImg() {
    var img = document.querySelector('#image').value;
    if (img == "" || img == null) {
        document.getElementById('errorImg').innerHTML = "Không được để trống hình ảnh";
        document.getElementById('image').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else {
        document.getElementById('errorImg').innerHTML = "";
        document.getElementById('image').style.border = "2px solid green";
        document.getElementById('submit').disable = false;
    }
}

function checkDate() {
    var date = document.querySelector('#date').value;
    if (date == "" || date == null) {
        document.getElementById('errorDate').innerHTML = "Không được để trống ngày";
        document.getElementById('date').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else {
        document.getElementById('errorDate').innerHTML = "";
        document.getElementById('date').style.border = "2px solid green";
        document.getElementById('submit').disable = false;
    }
}

function checkContent() {
    var content = document.querySelector('#content').value;
    if (content == "" || content == null) {
        document.getElementById('errorContent').innerHTML = "Không được để trống nội dung";
        document.getElementById('content').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else {
        document.getElementById('errorContent').innerHTML = "";
        document.getElementById('content').style.border = "2px solid green";
        document.getElementById('submit').disable = false;
    }
}

function checkTensp() {
    var tensp = document.querySelector('#tensp').value;
    if (tensp == "" || tensp == null) {
        document.getElementById('errorTensp').innerHTML = "Không được để trống tên sản phẩm";
        document.getElementById('tensp').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    } else {
        document.getElementById('errorTensp').innerHTML = "";
        document.getElementById('tensp').style.border = "2px solid green";
        document.getElementById('submit').disable = false;
    }
}

function checkPrice() {
    var price = document.querySelector('#price').value;
    if (price == "" || price == null) {
        document.getElementById('errorPrice').innerHTML = "Không được để trống giá";
        document.getElementById('price').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else if (price <= 0) {
        document.getElementById('errorPrice').innerHTML = "Gía phải lớn hơn 0";
        document.getElementById('price').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else {
        document.getElementById('errorPrice').innerHTML = "";
        document.getElementById('price').style.border = "2px solid green";
        document.getElementById('submit').disable = false;
    }
}

function checkPrices() {
    var prices = document.querySelector('#prices').value;
    if (prices == "" || prices == null) {
        document.getElementById('errorPrices').innerHTML = "Không được để trống giá";
        document.getElementById('prices').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else if (prices <= 0) {
        document.getElementById('errorPrices').innerHTML = "Gía phải lớn hơn 0";
        document.getElementById('prices').style.border = "1px solid red";
        document.getElementById('submit').disable = true;
    }
    else {
        document.getElementById('errorPrices').innerHTML = "";
        document.getElementById('prices').style.border = "2px solid green";
        document.getElementById('submit').disable = false;
    }
}