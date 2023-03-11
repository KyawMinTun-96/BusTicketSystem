var sidebar = document.querySelector(".page_group .navigation");
var page_body = document.querySelector(".page_group .page_body");








function drawer() {

    if(sidebar.style.left == "" | sidebar.style.left == "0px" | sidebar.style.left == "-18") {

        sidebar.style.transition = "ease .5s";
        sidebar.style.left = "-18%";
        page_body.style.transition = "ease .5s";
        page_body.style.marginLeft = "0%";

    }else{

        sidebar.style.transition = "ease .5s";
        sidebar.style.left = "0";
        page_body.style.transition = "ease .5s";
        page_body.style.marginLeft = "18%";
    }

}




