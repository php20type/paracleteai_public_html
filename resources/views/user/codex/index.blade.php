@extends('layouts.app')
@section('css')
	<!-- Sweet Alert CSS -->
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

<form id="openai-form" action="" method="post" enctype="multipart/form-data" class="mt-24">		
	@csrf
	<div class="row">	
		<div class="col-lg-4 col-md-12 col-sm-12">
			<div class="card border-0" id="template-input">
				<div class="card-body p-5 pb-0">

					<div class="row">
						<div class="template-view">
							<div class="template-icon mb-2 d-flex">
								<div>
									<i class="fa-solid fa-square-code blog-icon"></i>
								</div>
								<div>
									<h6 class="mt-1 ml-3 fs-16 number-font">{{ __('AI Code Generator') }}</h6>
								</div>									
							</div>								
							<div class="template-info">
								<p class="fs-12 text-muted mb-4">{{ __('Create a various code by using only text commands') }}</p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="text-left mb-4" id="balance-status">
								<span class="fs-11 text-muted pl-3"><i class="fa-sharp fa-solid fa-bolt-lightning mr-2 text-primary"></i>{{ __('Your Balance is') }} <span class="font-weight-semibold" id="balance-number">{{ number_format(auth()->user()->available_words + auth()->user()->available_words_prepaid) }}</span> {{ __('Words') }}</span>
							</div>							
						</div>	
						<div class="col-sm-12">								
							<div class="input-box">	
								<h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Provide Instructions') }}  <span class="text-required"><i class="fa-solid fa-asterisk"></i></span></h6>									
								<div class="form-group">						    
									<textarea rows="15" cols="50" type="text" class="form-control @error('instructions') is-danger @enderror" id="instructions" name="instructions" placeholder="{{ __('e.g. Create a JavaScript dictionary of 5 countries and capitals') }}" required></textarea>
									@error('instructions')
										<p class="text-danger">{{ $errors->first('instructions') }}</p>
									@enderror
								</div> 
							</div> 
						</div>
					</div>						

					<div class="card-footer border-0 text-center p-0">
						<div class="w-100 pt-2 pb-2">
							<div class="text-center">
								<span id="processing" class="processing-image"><img src="{{ URL::asset('/img/svgs/upgrade.svg') }}" alt=""></span>
								<button type="submit" name="submit" class="btn btn-primary  pl-7 pr-7 fs-11 pt-2 pb-2" id="generate">{{ __('Generate Code') }}</button>
							</div>
						</div>							
					</div>	
			
				</div>
			</div>			
		</div>

		<div class="col-lg-8 col-md-12 col-sm-12">
			<div class="card border-0" id="template-output">
				<div class="card-body">
					<div class="row">						
						<div class="col-lg-4 col-md-12 col-sm-12">								
							<div class="input-box mb-2">								
								<div class="form-group">							    
									<input type="text" class="form-control @error('document') is-danger @enderror" id="document" name="document" value="{{ __('New Code') }}">
									@error('document')
										<p class="text-danger">{{ $errors->first('document') }}</p>
									@enderror
								</div> 
							</div> 
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="d-flex" id="template-buttons-group">	
								<div>
									<a id="export-txt" class="template-button mr-2" onclick="exportTXT();" href="#"><i class="fa-solid fa-file-lines table-action-buttons table-action-buttons-big view-action-button" data-tippy-content="{{ __('Download as Text File') }}"></i></a>
								</div>	
								<div>
									<a id="copy-button" class="template-button mr-2" onclick="copyText();" href="#"><i class="fa-solid fa-copy table-action-buttons table-action-buttons-big edit-action-button" data-tippy-content="{{ __('Copy Code') }}"></i></a>
								</div>
								<div>
									<a id="save-button" class="template-button" onclick="return saveText(this);" href="#"><i class="fa-solid fa-floppy-disk-pen table-action-buttons table-action-buttons-big delete-action-button" data-tippy-content="{{ __('Save Code') }}"></i></a>
								</div>					
							</div>
						</div>

					</div>
					<div>						
						<div id="code-textarea">
							<pre>
								<code id="codetext"></code>
							</pre>						
						</div>									
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection

@section('js')
<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
<script type="text/javascript">
	$(function () {

		"use strict";

		
		// SUBMIT FORM
		$('#openai-form').on('submit', function(e) {

			e.preventDefault();

			let form = $(this);

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'POST',
				url: 'code/process',
				data: form.serialize(),
				beforeSend: function() {
					$('#generate').html('');
					$('#generate').prop('disabled', true);
					$('#processing').show().clone().appendTo('#generate'); 
					$('#processing').hide();          
				},
				complete: function() {
					$('#generate').prop('disabled', false);
					$('#processing', '#generate').empty().remove();
					$('#processing').hide();
					$('#generate').html('Generate Code');            
				},
				success: function (data) {		

					if (data['status'] == 'success') {
						let formatted_text=nl2br(data['text']);
						let editor = document.getElementById('codetext');
				
						editor.innerHTML += formatted_text;
						editor.innerHTML += '<br><br><br>';

						let save = document.getElementById('save-button');
						save.setAttribute('target', data['id']);

						animateValue("available-words", data['old'], data['current'], 4000);
						animateValue("balance-number", data['old'], data['current'], 4000);
					
						toastr.success('{{ __('Code was successfully generated') }}');
						
					} else {						
						Swal.fire('{{ __('Text Generation Error') }}', data['message'], 'warning');
					}

				},
				error: function(data) {
					$('#generate').prop('disabled', false);
            		$('#generate').html('Generate Code'); 
					console.log(data)
				}
			});
		});
	});

	function nl2br (str, is_xhtml) {
     	var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
     	return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
  	} 

	function copyText() {
		var r = document.createRange();
		r.selectNode(document.getElementById('codetext'));
		window.getSelection().removeAllRanges();
		window.getSelection().addRange(r);
		document.execCommand('copy');
		window.getSelection().removeAllRanges();

		toastr.success('{{ __('Code has been copied successfully') }}');
	}

	function exportTXT() {
		var elHtml = document.getElementById('codetext').innerText;
		var link = document.createElement('a');
		var mimeType = 'text/plain';

		link.setAttribute('download', 'document.txt');
		link.setAttribute('href', 'data:' + mimeType  +  ';charset=utf-8,' + encodeURIComponent(elHtml));
		link.click(); 
	}

	function animateValue(id, start, end, duration) {
		if (start === end) return;
		var range = end - start;
		var current = start;
		var increment = end > start? 1 : -1;
		var stepTime = Math.abs(Math.floor(duration / range));
		var obj = document.getElementById(id);
		var timer = setInterval(function() {
			current += increment;
			obj.innerHTML = current;
			if (current == end) {
				clearInterval(timer);
			}
		}, stepTime);
	}

	function saveText(event) {

		//let textarea = document.querySelector('.richText-editor').textContent;
		let textarea = document.getElementById('codetext').innerHTML;
		let title = document.getElementById('document').value;


		if (!event.target) {
			toastr.warning('{{ __('You will need to generate AI code first before saving') }}');
		} else {
			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'POST',
				url: '/user/code/save',
				data: { 'id': event.target, 'text': textarea, 'title': title},
				success: function (data) {					
					if (data['status'] == 'success') {
						toastr.success('{{ __('Code has been successfully saved') }}');
					} else {						
						toastr.warning('{{ __('There was an issue while saving your code') }}');
					}
				},
				error: function(data) {
					toastr.warning('{{ __('There was an issue while saving your code') }}');
				}
			});

			return false;
		}

	}
</script>
@endsection