const titreSpans = document.querySelectorAll('h1 span');
const btns = document.querySelectorAll('.btn-first');
const btns1 = document.querySelectorAll('.btn-first:nth-child(1)');
const btns2 = document.querySelectorAll('.btn-first:nth-child(2)');


window.addEventListener('load', () => {

    const TL = gsap.timeline({paused: true});
    //(objet, duree de lobject {}, temps entre chaque objet)
    TL

    //.staggerFrom(titreSpans, 1, {top: -100, opacity: 2}, 0.2)
    //.staggerFrom(btns1, 1, {opacity: 2, ease: "power2.out"}, 0.2, '-=1')
   $("titreSpans").fadeIn();
   
    //.from(btns1, 1, {width: -50}, '-=2')   ;
    //.from(btns2, 1, {right: -50, width: 10}, '-=2')
    

    //.staggerFrom(btns, 1, {opacity: 0}, 0.3, '-=1')
    //.staggerFrom(btns2, 1, {top: -100, opacity: 0});

    

    TL.play();
})