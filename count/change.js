/*window.setInterval(function(){
    
   window.setTimeout(function(){
       $('div').css('background-image','url(http://us.cdn291.fansshare.com/photo/backgroundhd/fd-288004178.jpg)');
   },1000);
    $('div').css('background-image','url(http://us.cdn200.fansshare.com/photo/backgroundhd/background-hd-836761420.jpg)');
},3000);*/

$(function() {
var body = $(‘body’);
var backgrounds = new Array(
‘url(image1.jpg)’,
‘url(image2.jpg)’
);
var current = 0;

function nextBackground() {
body.css(
‘background’,
backgrounds[current = ++current % backgrounds.length]
);

setTimeout(nextBackground, 10000);
}
setTimeout(nextBackground, 10000);
body.css(‘background’, backgrounds[0]);
});