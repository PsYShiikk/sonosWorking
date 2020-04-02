


$('.txtb input').ready( function () {
    if ($(this).val() !== "")

        $(this).addClass('focus');
});

$('.txtb input').on('focus', function () {
    $(this).addClass('focus');

});

$('.txtb input').on('blur', function () {
    if ($(this).val() == "")
    $(this).removeClass('focus error');


});

console.log('coucou');


let fillBar = document.getElementById("fill");
let currentTime = document.getElementById("currentTime")
let totalTime = document.getElementById("totalTime");
let volume = document.getElementById('volume');
let icosound = document.getElementById('soundicon');
let song = new Audio();


$(document).ready(function () {
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
    if (liked){
        document.querySelector('.btn_like_img').src = "/images/icones/like_on.png"
    }
    else{
        document.querySelector('.btn_like_img').src = "/images/icones/like.png"
    }


    song.play();    // play the song
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
        "linear-gradient(to right, #666666 0%, #666666 " + value + "%, #fff " + value + "%, white 100%)";
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


$(document).pjax('[data-pjax] a, a[data-pjax]', '#pjax-container');




