//mode gelap
var element = document.body;

function ubahWarna() {
    element.classList.toggle("dark");
}



// addEventListener
const section1 = document.querySelector("#s1");
section1.addEventListener("click", function(){
    const detail1 = document.querySelector("#detail1");
    detail1.style.display = "block";
});

const section2 = document.querySelector("#s2");
section2.addEventListener("click", function(){
    const detail2 = document.querySelector("#detail2");
    detail2.style.display = "block";
});

const section3 = document.querySelector("#s3");
section3.addEventListener("click", function(){
    const detail3 = document.querySelector("#detail3");
    detail3.style.display = "block";
});