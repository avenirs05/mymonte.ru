export function vh() {
    let el = document.getElementById('main-img');

    if (screen.width >= 960 && el !== null) {
        document.getElementById('main-img').style.height = '94vh';
    }  
}
