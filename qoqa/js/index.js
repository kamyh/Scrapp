function priceToggle(e)
{
    e.preventDefault();
    $(this).parent().next().toggleClass('opened');
}

$( document ).ready(function()
{
    $('span.price-block__trigger').on('click', priceToggle);
    $('span.price-block__trigger').on('touchstart', priceToggle);
});