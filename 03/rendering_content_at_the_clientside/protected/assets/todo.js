var todo = {
	taskTemplate: null,
	refs: {},
	options: {},
	reload: function(){
		$.ajax({
			url: todo.options.taskEndpoint,
			type: 'get',
			dataType: 'json',
			success: function(response) {
				$.each(response.data, function(index, value){
					todo.refs.tasks.append(todo.taskTemplate(value));
				});
			},
			error: todo.onFailure
		});
	},
	onFailure: function(xhr){
		var data = $.parseJSON(xhr.responseText);
		todo.refs.status.text('');
		$.each(data.errors, function(index, value){
			todo.refs.status.append('<p>'+value+'</p>');
		});
	},
	onAdd: function(e){
		e.preventDefault();
		var form = this;

		$.ajax({
			url: todo.options.taskEndpoint,
			type: 'put',
			data: $(form).serialize(),
			dataType: 'json',
			success: function(response) {
				todo.refs.tasks.append(todo.taskTemplate(response.data));
				form.reset();
			},
			error: todo.onFailure
		});
	},
	onDelete: function(e) {
		e.preventDefault();

		$.ajax({
			url: todo.options.taskEndpoint,
			type: 'delete',
			data: {
				id: $(this).parents('.task').attr('data-id')
			},
			dataType: 'json',
			success: function(response) {
				$('.task[data-id='+response.data.id+']').remove();
			},
			error: todo.onFailure
		});
	},
	onChange: function(e) {
		e.preventDefault();

		var data = {
			id: $(this).parents('.task').attr('data-id'),
			Task: {}
		};

		if(this.type==='checkbox') {
			data.Task.done = + this.checked;
		}
		else if(this.type==='text') {
			data.Task.title = $(this).val();
		}

		$.ajax({
			url: todo.options.taskEndpoint,
			type: 'post',
			data: data,
			dataType: 'json',
			success: function(response) {
				$('.task[data-id='+response.data.id+']')
					.before(todo.taskTemplate(response.data))
					.remove();
			},
			error: todo.onFailure
		});
	},
	initLoader: function() {
		var loadingText = 'Loading...';
		$(document).ajaxSend(function(){
			todo.refs.status.text(loadingText);
		}).ajaxStop(function(){
			if(todo.refs.status.text()===loadingText) {
				todo.refs.status.fadeOut(500, function(){
					todo.refs.status.text('').show();
				});
			}
		});
	},
	bindEvents: function() {
		todo.refs.taskForm.submit(todo.onAdd);
		todo.refs.tasks.on('click', '.delete', todo.onDelete);
		todo.refs.tasks.on('change', 'input', todo.onChange);
	},
	initRefs: function() {
		todo.refs.page = $('.todo-index');
		todo.refs.tasks = todo.refs.page.find('.tasks');
		todo.refs.status = todo.refs.page.find('.status');
		todo.refs.taskForm = todo.refs.page.find('.new-task form');
	},
	init: function(options){
		todo.options = options;
		todo.taskTemplate = doT.template($('#template-task').html());
		todo.initRefs();
		todo.initLoader();
		todo.bindEvents();
		todo.reload();
	}
};