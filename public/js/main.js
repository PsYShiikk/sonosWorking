/* =================

author: Karan Mhatre
email: me@karanmhatre.com
website: karanmhatre.com

================= */

// Function to add and remove the page transition screen
function pageTransition() {

    var tl = gsap.timeline();
    tl.to('.logo_loader', { duration: .01, opacity:"1"});
    tl.set('.loading-screen', { transformOrigin: "bottom right"});
    tl.to('.loading-screen', { duration: .5, scaleY: 1});
    tl.to('.logo_loader', { duration: .5, left: "45vw"});
    tl.to('.logo_loader', { duration: .2,});
    tl.to('.logo_loader', { duration: .2, scale:"1.5"});
    tl.to('.logo_loader', { duration: .2, scale:"1"});
    tl.to('.logo_loader', { duration: .2,});
    tl.to('.logo_loader', { duration: .5, left:"110vw"});
    tl.to('.loading-screen', { duration: .5, scaleY: 0, skewX: 0, transformOrigin: "top right", ease: "power1.out"});
    tl.to('.logo_loader', { duration: .01, opacity:"0"});
    tl.to('.logo_loader', { duration: .01, left:"-20vw"});
}

// Function to animate the content of each page
function contentAnimation() {
    var tl = gsap.timeline();
    tl.from('.is-animated', { duration: .5, translateY: 10, opacity: 0, stagger: 0.4 });
    tl.from('.main-navigation', { duration: .5, translateY: -10, opacity: 0});
    $('.green-heading-bg').addClass('show');
}

$(function() {
    barba.init({
        sync: true,
        transitions: [{
            async leave(data) {
                const done = this.async();
                pageTransition();
                await delay(1000);
                done();
            },
            async enter(data) {
                contentAnimation();
            },
            async once(data) {
                contentAnimation();
            }
        }]
    });
});
