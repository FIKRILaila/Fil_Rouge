
var role = document.getElementsByName('role');

role.forEach(e=>{
    e.addEventListener('click',()=>{
        for(i = 0; i < role.length; i++) {
            if(role[i].checked){
                if(role[i].value =='normal'){
                    document.querySelector("#app > main > div > div.d-flex.flex-column.justify-content-start.col-md-6.bg-white.login.mt-0 > div:nth-child(2) > form > div:nth-child(9)").style.display="none";
                }else if(role[i].value=='chef'){
                    document.querySelector("#app > main > div > div.d-flex.flex-column.justify-content-start.col-md-6.bg-white.login.mt-0 > div:nth-child(2) > form > div:nth-child(9)").style.display="block";
                }
            }
           
        }
})

})
for(i = 0; i < role.length; i++) {
    if(role[i].checked){
        if(role[i].value =='normal'){
            document.querySelector("#app > main > div > div.d-flex.flex-column.justify-content-start.col-md-6.bg-white.login.mt-0 > div:nth-child(2) > form > div:nth-child(9)").style.display="none";
        }else if(role[i].value=='chef'){
            document.querySelector("#app > main > div > div.d-flex.flex-column.justify-content-start.col-md-6.bg-white.login.mt-0 > div:nth-child(2) > form > div:nth-child(9)").style.display="block";
        }
    }
    
}

