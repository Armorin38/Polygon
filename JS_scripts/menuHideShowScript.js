function hide(){
    document.getElementById('Sidebar').style.display='none';
    document.getElementById('menu-hide-button').style.display='none';
    let menuShowBtn = document.getElementById('menu-show-button');
    menuShowBtn.style.display='block';
    
    let contentDiv = document.getElementById('content-div');
    contentDiv.style.width='90%';
    contentDiv.style.margin='2vh 0 0 10%';
}
function show(){
    document.getElementById('Sidebar').style.display='block';
    document.getElementById('menu-hide-button').style.display='block';
    let menuShowBtn = document.getElementById('menu-show-button');
    menuShowBtn.style.display='none';
    let contentDiv = document.getElementById('content-div');
    contentDiv.style.width='78%';
    contentDiv.style.margin='2vh 0 0 22%';
}