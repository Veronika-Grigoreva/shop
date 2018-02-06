$(document).ready(function(){
    addActiveClassToMenuItem();
});

function addActiveClassToMenuItem() {
    $('#' + activeMenuItem).addClass('active');
}