const titreSpans = document.querySelectorAll('h1 span');
window.addEventListener('load', () => {

    const TL = gsap.timeline({ paused: true });

    TL
        .staggerFrom(titreSpans, 1, { top: -50, opacity: 0, ease: "power2.out" }, 0.3)

    TL.play();
})

function descendre() {
    var icOn = document.getElementById('icOn');
    var x = 900;
    window.scrollBy({
        top: x,
        behavior: "smooth"
    })
}
