divlist = document.getElementsByClassName('player');

function mediagenarate(div) {
    divlenght = div.length;

    for (let index = 0; index < divlenght; index++) {
        mediasize = divlist[index].id.length;
        console.log(mediasize);
        
        if (mediasize == 11) {
            console.log('YT video');
            src = "https://www.youtube.com/embed/" + divlist[index].id;

            media = document.createElement('iframe');
            media.setAttribute('id', 'player');
            media.setAttribute('frameborder', '0');
            media.setAttribute('allowfullscreen', '1');
            media.setAttribute('title', 'Entremondemedia');
            media.setAttribute('width', "640");
            media.setAttribute('height', "360");
    
        } else {
            console.log('Local IMG');

            let x = document.cookie;
            x = x.split(';');
            x = x[0].split('=');
            x = x[1];
            x = (decodeURIComponent(x));
            console.log(x);

            src = x + '/' + divlist[index].id + ".jpg";

            media = document.createElement('img');
            media.setAttribute('id', 'player');
            media.setAttribute('title', 'Entremondemedia');
            media.setAttribute('width', "640");
            media.setAttribute('height', "360");
        }

        media.setAttribute('src', src);
        div[index].appendChild(media);
    }
}

mediagenarate(divlist);