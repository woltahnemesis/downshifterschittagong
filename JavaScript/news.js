let btn = document.querySelectorAll('.option-btn');
let drop_div = document.querySelectorAll('.dropdown-div');

for(let i = 0; i < btn.length; i++){
    
    btn[i].onclick = function (){
        
        if(drop_div[i].style.display== 'block'){
            drop_div[i].style.display = 'none';
        } else {
            drop_div[i].style.display = 'block';
        }
    }
}

