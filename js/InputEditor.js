function InputEditor(inputClass)
{
	this.inputList;

	//setters
	this.startAjaxSubmit = startAjaxSubmit;
	this.inputClass = inputClass;

	//getters
	this.getInputs = getInputs;
	
	this.sendAjax = sendAjax;
	this.init = init;
}

function init()
{
	this.inputList = this.getInputs();
	this.startAjaxSubmit();
}

function getInputs()
{
	var inputElements = document.querySelectorAll(this.inputClass);
	if(inputElements.length == 0)
	{
		alert('Input "'+this.inputClass+'" return 0 results!');
		return false;
	}

	return inputElements;
}

function startAjaxSubmit()
{
	var that = this;

	for(var i=0; i< this.inputList.length; i++)
	{
		this.inputList[i].onkeypress = function (e)
		{
			var key = window.event ? e.keyCode : e.which;
	        if (key == '13')
	        {
	        	that.sendAjax(this.id, this.value);
	        } 
		}

		this.inputList[i].onblur = function ()
		{
			that.sendAjax(this.id, this.value);
		}
	}
}

function sendAjax(id, message)
{
	if(!$.isNumeric(id))
		return false;
	//alert(message);
	$.ajax({
		url:"tools/ajax/AjaxMessagesController.php?id_sale="+id+"&message="+message,
		type:"GET",
		async: false,
		success:function(result)
		{
			$('#'+id).effect("highlight", {color: '#67c58f'}, 1000);
			//$('#'+id).fadeTo('slow', 0.5).fadeTo('slow', 1.0);
		},
		error:function()
		{
			$('#'+id).effect("highlight", {color: '#e84c3d'}, 1000);
		}
	});
}