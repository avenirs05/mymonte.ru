export function vh() {
    let mainImgDesk = document.getElementById('main-img');
//    let mainImgMob = document.getElementById('main-img-mob'); 
//    mainImgMob.style.height = '100vh';  
           
    if (screen.width >= 960) {
        mainImgDesk.style.height = '94vh';
    } 
}
