/* Load the products of the roject. */
function loadProducts(project)
{
    link = createLink('project', 'ajaxGetProducts', 'projectID=' + project);
    $('#productBox').load(link, function(){$('#productBox').find('select').chosen(defaultChosenOptions)});
}

/* Set doc type. */
function setType(type)
{
    if(type == 'url')
    {
        $('#urlBox').show();
        $('#fileBox').hide();
        $('#contentBox').hide();
    }
    else if(type == 'text')
    {
        $('#urlBox').hide();
        $('#fileBox').hide();
        $('#contentBox').show();
    }
    else
    {
        $('#urlBox').hide();
        $('#fileBox').show();
        $('#contentBox').hide();
    }
}

$(document).ready(function()
{
    $("#submenucreate").modalTrigger({type: 'iframe', width: 500});
    $("#submenuedit").modalTrigger({type: 'iframe', width: 500});
});


/**
 * Convert a date string like 2011-11-11 to date object in js.
 * 
 * @param  string $date 
 * @access public
 * @return date
 */
function convertStringToDate(dateString)
{
    dateString = dateString.split('-');
    return new Date(dateString[0], dateString[1] - 1, dateString[2]);
}

/**
 * Compute delta of two days.
 * 
 * @param  string $date1 
 * @param  string $date1 
 * @access public
 * @return int
 */
function computeDaysDelta(date1, date2)
{
    date1 = convertStringToDate(date1);
    date2 = convertStringToDate(date2);
    delta = (date2 - date1) / (1000 * 60 * 60 * 24) + 1;

    weekEnds = 0;
    for(i = 0; i < delta; i++)
    {
        if(date1.getDay() == 0 || date1.getDay() == 6) weekEnds ++;
        date1 = date1.valueOf();
        date1 += 1000 * 60 * 60 * 24;
        date1 = new Date(date1);
    }
    return delta - weekEnds; 
}

/**
 * Compute work days.
 * 
 * @access public
 * @return void
 */
function computeWorkDays(currentID)
{
    isBactchEdit = false;
    if(currentID)
    {
        index = currentID.replace('begins[', '');
        index = index.replace('ends[', '');
        index = index.replace(']', '');
        if(!isNaN(index)) isBactchEdit = true;
    }

    if(isBactchEdit)
    {
        beginDate = $('#begins\\[' + index + '\\]').val();
        endDate   = $('#ends\\[' + index + '\\]').val();
    }
    else
    {
        beginDate = $('#begin').val();
        endDate   = $('#end').val();
    }

    if(beginDate && endDate) 
    {
        if(isBactchEdit)  $('#dayses\\[' + index + '\\]').val(computeDaysDelta(beginDate, endDate));
        if(!isBactchEdit) $('#days').val(computeDaysDelta(beginDate, endDate));
    }
    else if($('input[checked="true"]').val()) 
    {
        computeEndDate();
    }
}

/**
 * Compute the end date for project.
 * 
 * @param  int    $delta 
 * @access public
 * @return void
 */
function computeEndDate(delta)
{
    beginDate = $('#begin').val();
    if(!beginDate) return;

    endDate = convertStringToDate(beginDate).addDays(parseInt(delta));
    endDate = endDate.toString('yyyy-M-dd');
    $('#end').val(endDate);
    computeWorkDays();
}

/* Auto compute the work days. */
$(function() 
{
    if(typeof(replaceID) != 'undefined') setModal4List('iframe', replaceID);
    $(".date").bind('dateSelected', function()
    {
        computeWorkDays(this.id);
    })
});