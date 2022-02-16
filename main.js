let toogler = document.querySelector(".toogle");
let nav = document.querySelector("nav");
let close = document.querySelector(".close");


toogler.onclick =function() {
    nav.classList.add("open");
};
close.onclick = function() {
    nav.classList.remove("open");
};
document.onkeyup = function (e) {/*ki tenzel aal echape ynahi el menu*/ 
    if(e.key === "Escape"){
        nav.classList.remove("open");  
    }
}
function na7i() {
    nav.classList.remove("open");
};

/************************************  javascript mte3 el count mte3 la3ded********************/ 
let section =document.querySelector(".three");
let nums =document.querySelectorAll(".nums .num");
let start = false ;//function started? hell no 
    // num.dataset.goal=['100','700','500'];
function startcount(el){
    let goal =el.dataset.goal;
    let count = setInterval( () => {
        el.textContent++;
        if(el.textContent == goal){
            clearInterval(count);
        }
    },4400/goal);//akal 100 hehdika heya el wa9et el bech yzid fih mithel mel 0 hata 10 fi 0.1s
                //akel  2000/goal bech ness el kol takhlet lel lekher fard wa9et 
}
window.onscroll = function () {
    if(window.scrollY >= section.offsetTop-400) {  //akel -200 hedhika bech tkhalih yebda yzid fel bara 9abal mayousel el ekher el section3
        if (!start){           //el fonction bech tekhdem awel mara
            nums.forEach( (num) => startcount(num) );
        }
        start=true;
    }
}
/**************************************************apper mel imin w mel isar *******************/ 
function changechat(e){
    document.getElementById("bg").src=e;
    document.getElementById("chat").src="images/btn11.png";
    document.getElementById("chien").src="images/btn20.png";
    document.getElementById("poisson").src="images/btn30.png";
}
function changechien(e){
    document.getElementById("bg").src=e;
    document.getElementById("chat").src="images/btn10.png";
    document.getElementById("chien").src="images/btn21.png";
    document.getElementById("poisson").src="images/btn30.png";
} 
function changepoisson(e){
    document.getElementById("bg").src=e;
    document.getElementById("chat").src="images/btn10.png";
    document.getElementById("chien").src="images/btn20.png";
    document.getElementById("poisson").src="images/btn31.png";
} 
/*********************preload page **********************************************************/
var loader= document.getElementById("preloder");
window.addEventListener("load",function(){
    loader.style.display="none";
})