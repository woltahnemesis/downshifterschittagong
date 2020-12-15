function confirmation(){
    let bool = confirm('Are you sure you want to delete this record?');
    if(!bool){
        return false;
    }
}