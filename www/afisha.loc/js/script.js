async function addArtist() {
    let response = await fetch('addartist.php', {
        method: 'POST',
        body: new FormData(artistForm)
    });
    let result = await response.text();
}

//загружает список после добавления
function showArtist() {
    let getartist;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        getartist = new XMLHttpRequest();
    } else { // code for IE6, IE5
        getartist = new ActiveXObject("Microsoft.XMLHTTP");
    }
    getartist.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("artist").innerHTML = this.responseText;
        }
    };
    getartist.open("GET", "getartist.php", true);
    getartist.send();
}

