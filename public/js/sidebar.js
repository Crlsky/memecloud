document.getElementById('dismiss').addEventListener('click', (e) => {
    e.preventDefault();
    document.getElementById("sidebar").style.marginLeft = "-250px";
    document.getElementById('overlay').classList.remove('active');
});

document.getElementById('sidebarExpandBtn').addEventListener('click', (e) => {
    e.preventDefault();
    document.getElementById("sidebar").style.marginLeft = "0";
    document.getElementById('overlay').classList.add('active');
});

document.getElementById('overlay').addEventListener('click', (e) => {
    e.preventDefault();
    document.getElementById("sidebar").style.marginLeft = "-250px";
    document.getElementById('overlay').classList.remove('active');
});