let collapseElements = document.querySelectorAll('.flex-collapse')
for (var i = 0, n = collapseElements.length; i < n; ++i) {
    collapseElements[i].addEventListener('click', function(e) {
        e.preventDefault()
        let expanded = this.getAttribute('aria-expanded').toLowerCase() === 'true' ? true : false
        this.setAttribute('aria-expanded',  !expanded)
    });
}

let toggleMobileNav = document.querySelectorAll('.toggle-mobile-nav')
let headerNavigation = document.getElementById('mobile-head')
for (var i = 0, n = toggleMobileNav.length; i < n; ++i) {
    toggleMobileNav[i].addEventListener('click', function(e) {
        e.preventDefault()
        let expanded = headerNavigation.getAttribute('aria-expanded').toLowerCase() === 'true' ? true : false
        headerNavigation.setAttribute('aria-expanded',  !expanded)
    });
}
