console.log("BookPunk theme loaded");
const hero = document.querySelector(".hero");
const bg = document.querySelector(".hero-bg");

hero.addEventListener("mousemove",(e)=>{
    const x = (window.innerWidth / 2 - e.pageX) / 40;
    const y = (window.innerHeight / 2 - e.pageY) / 40;
    bg.style.transform = `translate(${x}px, ${y}px) scale(1.05)`;
});

hero.addEventListener("mouseleave",()=>{
    bg.style.transform = "translate(0,0) scale(1)";
});