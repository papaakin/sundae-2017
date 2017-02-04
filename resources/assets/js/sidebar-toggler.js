    var container = document.querySelector('.container-fluid');
    var main = document.querySelector('.main');

    function eventListenAll(selector, listenTo, action) {
        var elements = document.querySelectorAll(selector);
        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener(listenTo, action);
        }
    }

    function showSidebarL() {
        container.classList.add('show-side-left');
        container.classList.remove('show-side-right');
    }
    function showSidebarR() {
        container.classList.remove('show-side-left');
        container.classList.add('show-side-right');
    }

    function hideSidebar() {
        container.classList.remove('show-side-left');
        container.classList.remove('show-side-right');
    }

    function isShowingSidebar() {
        return container.classList.contains('show-side-left') || container.classList.contains('show-side-right');
    }

    eventListenAll('.show-side-left', 'click', showSidebarL);
    eventListenAll('.show-side-right', 'click', showSidebarR);
    eventListenAll('.hide-side-left', 'click', hideSidebar);
    eventListenAll('.hide-side-right', 'click', hideSidebar);

    container.addEventListener('click', function(e) {
        if (isShowingSidebar() && main.contains(e.target)) {
            e.preventDefault();
            hideSidebar();
        }
    }, true);
