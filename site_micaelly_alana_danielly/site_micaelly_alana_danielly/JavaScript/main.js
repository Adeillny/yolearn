const elemsBnts = document.querySelectorAll(".fixed-action-bnt");
const floatingBnt = M.FloatingActionButton.init(elemsBnts, {
    direction: "left",
    hoverEnabled: false
});

const elemsDropdown = document.querySelectorAll(".dropdown-trigger");
const instanceDropdown = M.Dropdown.init(elemsDropdown, {
    coverTrigger: false
});

elemsSidenav = document.querySelectorAll(".sidenav");

const instanceSidenav = M.Sidenav.init(elemsSidenav, {
    edge: "left"
});

