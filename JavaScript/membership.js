let modal_div = document.querySelector('.modal-div');
let close_btn = document.querySelector('.close-btn');
let privacy_p = document.getElementById('privacy_p');

privacy_p.onclick = function (e){
    e.preventDefault();
    modal_div.style.display = "block";
}

close_btn.onclick = function (){
    modal_div.style.display = "none";
}