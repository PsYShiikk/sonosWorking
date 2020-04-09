




let fillBar = document.getElementById("fill");
let currentTime = document.getElementById("currentTime")
let totalTime = document.getElementById("totalTime");
let volume = document.getElementById('volume');
let icosound = document.getElementById('soundicon');
let icolike = document.getElementById('btn_like');

let icoclose = document.getElementById('croix_ferme')

let song = new Audio();

$(document).ready(function () {

    $('.txtb input').ready( function () {
        if ($(this).val() !== "")
            console.log('clique');
            $(this).addClass('focus');
    });

    $('body').on('focus','.txtb input', function () {
        $(this).addClass('focus');
        console.log('clique');
    });

    $('body').on('blur','.txtb input', function () {
        if ($(this).val() == "")
            $(this).removeClass('focus error');
        console.log('clique');

    });


    $('body').on("click", ".playlist_box", function () {
        $('.popup_playlist').hide()
    });

    $('body').on("click", ".playlist_box_add", function () {
        $('.popup_playlist').hide()
    });

    $('body').on("click",".btn_like", function(e){
        console.log('clique salut');

        e.preventDefault();
        $.get($(this).attr('href'));

        console.log(icolike.src);
        if (icolike.src == "http://127.0.0.1:8000/images/icones/like_on.png" ){
            icolike.src = "/images/icones/like.png";
            console.log('to non like');
        }else if(icolike.src == "http://127.0.0.1:8000/images/icones/like.png"){
            icolike.src = "/images/icones/like_on.png";
            console.log('to like');
        }
    });

    $('body').on("click",".playlist_box", function(e){

        e.preventDefault();
        $.get($(this).attr('href'));


    });

    $('body').on("click",".follow", function(e){
        e.preventDefault();
        $.get($(this).attr('href'));

        $("#info_user").load(location.href + " #info_user>*", "");

    });






    $('.button_player').hide();
    $('.cover_music').hide();
    $('.sound_player').hide();
    $('body').on('click','.chanson', function(e) {
        $('.sound_player').show();
        $('.button_player').show();
        $(".cover_music").show();
        e.preventDefault();
        let url = $(this).attr('data-file');

        let img = $(this).attr('data-img');
        let author = $(this).attr('data-author');
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        let liked = $(this).attr('data-liked');
        console.log(url, author, id, name, liked);




        playSong(url, id, author, name, img, liked);


    });

});


function playSong(url, id,author, name, img, liked){
    $('.btn_like').attr('href', "/like/"+id)
    song.src = url;  //set the source of 0th song
    document.getElementById('name_song_player').innerHTML = name;
    document.getElementById('name_singer_player').innerHTML = author;
    document.getElementById('image_player').src = img;
    document.querySelector('.btn_play_img').src = "/images/icones/pause.png";
    if (liked == "true"){
        document.querySelector('.btn_like_img').src = "/images/icones/like_on.png";

    }
    else{
        document.querySelector('.btn_like_img').src = "/images/icones/like.png";

    }
    let href = Array.from(document.querySelectorAll('.playlist_box'));
    href.map(lien => {

       let splitted = lien.href.split('/');
       if (splitted.length >6){
           console.log('faut changé la')
           let splitted = lien.href.split('/');
           splitted.pop();
           let goodhref = splitted.join('/');
           lien.href = goodhref;
       }


    });
    for(let i=0; i<href.length;i++){
        href[i].href = href[i].href + "/" + id;
    }

    let href2 = Array.from(document.querySelectorAll('.playlist_box_add'));
    href2.map(lien2 => {

        let splitted = lien2.href.split('/');
        if (splitted.length >5){
            console.log('faut changé la')
            let splitted2 = lien2.href.split('/');
            splitted2.pop();
            let goodhref2 = splitted2.join('/');
            lien2.href = goodhref2;
        }


    });
    for(let i=0; i<href2.length;i++){
        href2[i].href = href2[i].href + "/" + id;
    }

    song.play();    // play the song


    $('body').on('click','.btn_add_playlist', function(e) {
        console.log('ouvre enculeé');
        $('.popup_playlist').css('display','flex');


    });
}

function playOrPauseSong(){

    if(song.paused){
        song.play();
        document.querySelector('.btn_play_img').src = "/images/icones/pause.png";
    }
    else{
        song.pause();
        document.querySelector('.btn_play_img').src = "/images/icones/play.png"
    }
}

song.addEventListener('timeupdate',function(){

    var position = song.currentTime / song.duration;

    fillBar.style.width = position * 100 +'%';

    convertTime(song.currentTime);
    totalTimeDOM(Math.round(song.duration));
});

function convertTime(seconds){
    let min = Math.floor(seconds/60);
    let sec = Math.round(seconds % 60);

    min = (min<10) ? "0"+min : min;
    sec = (sec<10)?"0"+sec:sec;

    currentTime.textContent = min + ":" +sec;


}

function totalTimeDOM(seconds){
    var min = Math.floor(seconds/60);
    var sec = seconds % 60;

    min = (min<10) ? "0"+min : min;
    sec = (sec<10)?"0"+sec:sec;

    totalTime.textContent = min + ":" +sec;
}



function changementVolume(value) {
    volume.value = value;
    if (value == 0) {
        icosound.src = "/images/icones/nosound.png";
    } else if (value <= 33) {
        icosound.src = "/images/icones/sound1.png";
    } else if (value <= 66) {
        icosound.src = "/images/icones/sound2.png";
    } else {
        icosound.src = "/images/icones/sound3.png";
    }
    song.volume = value / 100;
    volume.style.background =
        "linear-gradient(to right, #fff 0%, #fff " + value + "%, #666666 " + value + "%, #666666 100%)";
}



icosound.addEventListener("click", function() {
    if (volume.value > 0) {
        lastVolume = volume.value;
        changementVolume(0);
    } else {
        changementVolume(lastVolume);
    }
});

volume.addEventListener('change', function(){

    changementVolume(volume.value);

});
volume.addEventListener('input', function(){

    changementVolume(volume.value);

});

//////////////////////
$('body').on('click','.croix_ferme', function(e) {
    console.log('fermeeeee enculeé');
    $('.popup_playlist').hide();

});



document.querySelector("html").classList.add('js');

let fileInput  = document.querySelector( ".input-file" ),
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");

button.addEventListener( "keydown", function( event ) {
    if ( event.keyCode == 13 || event.keyCode == 32 ) {
        fileInput.focus();
    }
});
button.addEventListener( "click", function( event ) {
    fileInput.focus();
    return false;
});
fileInput.addEventListener( "change", function( event ) {
    the_return.innerHTML = this.value;
});

let fileInput2  = document.querySelector( ".input-file2" ),
    button2    = document.querySelector( ".input-file-trigger2" ),
    the_return2 = document.querySelector(".file-return2");

button2.addEventListener( "keydown", function( event ) {
    if ( event.keyCode == 13 || event.keyCode == 32 ) {
        fileInput2.focus();
    }
});
button2.addEventListener( "click", function( event ) {
    fileInput.focus();
    return false;
});
fileInput2.addEventListener( "change", function( event ) {
    the_return2.innerHTML = this.value;
});









