window.search  = (search) => {
    var search = document.getElementById('busca');

    /*search.addEventListener("keydown", function(event){
        if(event.key === "Enter")
        {
            search();
        }
    });*/

    window.location = '/?search=' + search.value;
}
