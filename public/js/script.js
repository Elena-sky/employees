/**
 * Created by MacBook on 07.05.2018.
 */

/* jshint strict: false, -W117 */

function load(item)
{
    item.find('span.hierarchy__item_toggle').toggleClass('hide');
    item.find('i.fa-pulse').toggleClass('hide');
    $.ajax({
        url: document.location.origin + "/next-level",
        type: "POST",
        data: {
            id: item.attr('data-id')
        }
    }).done(function(response)
    {
        item.find('i.fa-pulse').toggleClass('hide');
        item.find('span.hierarchy__item_toggle').toggleClass('hide');

        var appends = '<ul class="hierarchy__sublist">';
        $.each(response, function(index,value)
        {
            var new_element = '<li class="hierarchy__item collapsed" draggable="true" data-id="'+value.id+'" data-load="false">';
            new_element += '<span class="hierarchy__item_content">'+value.full_name+'&nbsp;&ndash;&nbsp;<span class="italic">'+value.position+'</span></span>';


                new_element += '<span class="hierarchy__item_toggle">&#91;&#9654;&#93;</span>';
                new_element += '<i class="fa fa-spinner fa-pulse fa-fw hide"></i>';

            new_element += '</li>';
            appends += new_element;
        });
        appends += '</ul>';

        item.append(appends);
        item.attr('data-load',true);

    }).fail(function()
    {
        item.find('i.fa-pulse').toggleClass('hide');
        item.find('span.hierarchy__item_toggle').toggleClass('hide');
    });
}



$(document).ready(function()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.hierarchy').on('click','li.hierarchy__item .hierarchy__item_toggle',function()
    {

        var item = $(this).closest('.hierarchy__item');

        if( item.hasClass('expanded') )
        {
            $(this).html('&#91;&#9654;&#93;');
            item.children('.hierarchy__sublist').hide();
            item.removeClass('expanded').addClass('collapsed');
        }
        else
        {
            if( item.attr('data-load') === 'false' )
            {
                load(item);
            $(this).html('&#91;&#9660;&#93;');
            item.children('.hierarchy__sublist').show();
            item.removeClass('collapsed').addClass('expanded');
            item.attr('data-load',true);
            }
        }
    });

});
