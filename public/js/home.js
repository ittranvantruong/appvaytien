var btnContainer = document.getElementById("group_khoanvay");
var btn_khoanvay = btnContainer.getElementsByClassName("btn btn-tim khoanvay");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btn_khoanvay.length; i++) {
    btn_khoanvay[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("khoanvay active");

    // If there's no active class
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    this.className += " active";
  });
}

var btnContainer2 = document.getElementById("group_thoigian");
var btn_thoigianvay = btnContainer2.getElementsByClassName("btn btn-tim thoigianvay");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btn_thoigianvay.length; i++) {
    btn_thoigianvay[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("thoigianvay active");
        
        // If there's no active class
        if (current.length > 0) {
            current[0].className = current[0].className.replace(" active", "");
        }

        // Add the active class to the current/clicked button
        this.className += " active";
    });
}

function thoiGianVay(value, laisuat) {
    document.getElementById('thoi-gian-vay').innerHTML = value+'<input name="loan_period" value="'+value+'" hidden>';
    document.getElementById('text_modal_tgvay').innerHTML = value;
    document.getElementById('laisuat').innerHTML = laisuat+'<input name="interest_rate" value="'+laisuat+'" hidden>';
    document.getElementById('text_lai_suat_vay').innerHTML = laisuat;
}

function changeText(value) {
    document.getElementById('text_modal_khoangvay').innerHTML = value;
    document.getElementById('gia_tien').innerHTML = value+'<input name="loan_amount" value="'+value+'" hidden>';
    // if(value == "10 đến 50 triệu")
    // {
    //     document.getElementById('gia_tien').innerHTML = "10 triệu đến 50 triệu";
    // }
    // else if (value == "50 đến 100 triệu")
    // {
    //     document.getElementById('gia_tien').innerHTML = "50 triệu đến 100 triệu";
    // }
    // else if (value == "100 đến 300 triệu")
    // {
    //     document.getElementById('gia_tien').innerHTML = "100 triệu đến 300 triệu";
    // }
    // else if (value == "300 đến 500 triệu")
    // {
    //     document.getElementById('gia_tien').innerHTML = "300 triệu đến 500 triệu";
    // }
    // else if (value == "500 đến 1 tỷ")
    // {
    //     document.getElementById('gia_tien').innerHTML = "500 triệu đến 1 tỷ";
    // }
    // else if (value == "1 tỷ trở lên")
    // {
    //     document.getElementById('gia_tien').innerHTML = "1 tỷ trở lên";
    // }
}