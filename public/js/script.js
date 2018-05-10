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

    // Ajax autocomplete for select of boss when create or update new employee
    $('#boss').autocomplete({
        source: function(request, response){
            $.ajax({
                url: document.location.origin + "/employees/selectBoss",
                data:{
                    q: request.term
                },
                success: function(data){
                    console.log(data);

                    response($.map(data, function(item){
                        return {
                            label: item.full_name
                        };
                    }));
                }
            });
        },
        select: function( event, ui ) {
            //  вывод результата на экран
            $('#boss').val(ui.item.full_name);

        },
        minLength: 5 // начинать поиск с трех символов
    });

    // Ajax delete employee
    $('.delete').click(function () {
        var id = $(this).data('employee-id');

        if (confirm('Are you sure you want to delete?')) {
            $.ajax({
                type: "post",
                url: document.location.origin + '/employees/delete',
                data: {id: id, _method: 'delete'},
                success: function (del) {
                    console.log(id + ' удалилось');
                    // window.location.reload(true);
                    $('#'+id).remove();
                },
                error: function () {
                    console.log("ошибка");
                }
            });
        }
    });

    // Ajax sort employee
    $('.sortTable').click(function () {
        var orderBy = $(this).data('order-by');
        var sortOrder = $(this).data('sort-order');

        console.log('/employees/sort/'+ orderBy + '/' + sortOrder);
        $.ajax({
            type: "post",
            url: document.location.origin + '/employees/sort',
            data: {orderBy: orderBy, sortOrder: sortOrder},
            success: function (response) {
                console.log(response.data);
                $("#employeesList").html('');
                $.each(response.data, function() {
                    var elementClassic = '<tr id="' + this.id + '"><td>' + this.photo + '</td><td>' + this.full_name +
                        '</td><td>' + this.position + '</td><td>' + this.parent_id + '</td><td>' + this.start_date +
                        '</td><td>' + this.salary + '</td></tr>';
                    $("#employeesList").append(elementClassic);
                });
            },
            error: function () {
                console.log("ошибка");
            }
        });
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
