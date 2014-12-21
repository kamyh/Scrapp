function divClicked(input)
{
    window.event.stopPropagation();
    location.href = 'http://127.0.0.1:88/scrapp/try.php' + "?parameter=" + input;
}

function checkBoxClicked(input)
{
    window.event.stopPropagation();
}

function reset()
{
    location.href = 'http://127.0.0.1:88/scrapp/try.php';
}