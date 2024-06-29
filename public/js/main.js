
//Loader
window.addEventListener("DOMContentLoaded", function() {
    const loaderContainer = document.getElementById("loader-container");
    loaderContainer.classList.add("show");
});

window.addEventListener("load", function() {
    const loaderContainer = document.getElementById("loader-container");
    setTimeout(function() {
        loaderContainer.classList.remove("show");
        loaderContainer.style.display = "none";
    }, 1500); // Jeda 1.5 detik (1500 milidetik)
});

document.addEventListener("DOMContentLoaded", function() {
    const clientsCount = document.getElementById('clientsCount');
    const satisfactionCount = document.getElementById('satisfactionCount');
    const projectsCount = document.getElementById('projectsCount');

    let clients = 2000;
    let satisfaction = 2000;
    let projects = 0;

    const interval = setInterval(() => {
        clients++;
        clientsCount.textContent = clients;
        if (clients >= 4350) {
            clearInterval(interval);
        }
    }, 1); 

    const interval2 = setInterval(() => {
        satisfaction++;
        satisfactionCount.textContent = satisfaction;
        if (satisfaction >= 2899) {
            clearInterval(interval2);
        }
    }, 1); 

    const interval3 = setInterval(() => {
        projects++;
        projectsCount.textContent = projects;
        if (projects >= 63) {
            clearInterval(interval3);
        }
    }, 5); 
});

(function() {
    //===== Prealoder
        // ===== pricing-style-4 slider
        tns({
            container: '.pricing-active',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: false,
            controls: true,
            controlsText: [
              '<i class="lni lni-chevron-left prev"></i>',
              '<i class="lni lni-chevron-right prev"></i>',
            ],
            responsive: {
              0: {
                items: 1,
              },
              768: {
                items: 2,
              },
              992: {
                items: 1.2,
              },
              1200: {
                items: 2,
              }
            }
          });
    
    
        
        
    
        /*=====================================
        Sticky
        ======================================= */
        window.onscroll = function () {
            var header_navbar = document.querySelector(".navbar-area");
            var sticky = header_navbar.offsetTop;
    
            if (window.pageYOffset > sticky) {
                header_navbar.classList.add("sticky");
            } else {
                header_navbar.classList.remove("sticky");
            }
    
    
    
            // show or hide the back-top-top button
            var backToTo = document.querySelector(".scroll-top");
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                backToTo.style.display = "flex";
            } else {
                backToTo.style.display = "none";
            }
        };
    
        // for menu scroll 
        var pageLink = document.querySelectorAll('.page-scroll');
        
        pageLink.forEach(elem => {
            elem.addEventListener('click', e => {
                e.preventDefault();
                document.querySelector(elem.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth',
                    offsetTop: 1 - 60,
                });
            });
        });
    
        // section menu active
        function onScroll(event) {
            var sections = document.querySelectorAll('.page-scroll');
            var scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
    
            for (var i = 0; i < sections.length; i++) {
                var currLink = sections[i];
                var val = currLink.getAttribute('href');
                var refElement = document.querySelector(val);
                var scrollTopMinus = scrollPos + 73;
                if (refElement.offsetTop <= scrollTopMinus && (refElement.offsetTop + refElement.offsetHeight > scrollTopMinus)) {
                    document.querySelector('.page-scroll').classList.remove('active');
                    currLink.classList.add('active');
                } else {
                    currLink.classList.remove('active');
                }
            }
        };
    
        window.document.addEventListener('scroll', onScroll);
    
        //===== close navbar-collapse when a  clicked
        let navbarToggler = document.querySelector(".navbar-toggler");    
        var navbarCollapse = document.querySelector(".navbar-collapse");
    
        document.querySelectorAll(".page-scroll").forEach(e =>
            e.addEventListener("click", () => {
                navbarToggler.classList.remove("active");
                navbarCollapse.classList.remove('show')
            })
        );
        navbarToggler.addEventListener('click', function() {
            navbarToggler.classList.toggle("active");
        }) 
    
    
        // WOW active
        new WOW().init();
    
        
        //====== counter up 
        var cu = new counterUp({
            start: 0,
            duration: 2000,
            intvalues: true,
            interval: 100,
            append: " ",
        });
        cu.start();
    
})();

    
    // ====== scroll top js
    function scrollTo(element, to = 0, duration= 1000) {
    
        const start = element.scrollTop;
        const change = to - start;
        const increment = 20;
        let currentTime = 0;
    
        const animateScroll = (() => {
    
            currentTime += increment;
    
            const val = Math.easeInOutQuad(currentTime, start, change, duration);
    
            element.scrollTop = val;
    
            if (currentTime < duration) {
                setTimeout(animateScroll, increment);
            }
        });
    
        animateScroll();
    };
    
    Math.easeInOutQuad = function (t, b, c, d) {
    
        t /= d/2;
        if (t < 1) return c/2*t*t + b;
        t--;
        return -c/2 * (t*(t-2) - 1) + b;
    };
    
    document.querySelector('.scroll-top').onclick = function () {
        scrollTo(document.documentElement); 
    }
    
    