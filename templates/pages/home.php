<div class='home-page'>
	<div class='instructions'>
		<span>
			Works best with a program that can see what tracks are included in a video file (MKVMerge, MediaInfo).
			Find out how many tracks are in the video file, and add fields equal to that amount. You can set the names, language, and default/forced tags.

			<br/><br/>

			Once all fields are set, just save the .bat file and run within a folder containing the videos you wish to tag. The script will run
			and when it's done you will have new tagged files.
		</span>
	</div>

	<div class='entry-fields'>
		<div class='container-new-field no-select'>
			<span>New Fields</span>
			<div class='options-new-field'>
				<div id='newFieldVideo' class='video'>Video</div>
				<div id='newFieldAudio' class='audio'>Audio</div>
				<div id='newFieldSubtitle' class='subtitle'>Subtitles</div>
			</div>
		</div>
		<div class='file-information'>
			<label for='fileTitle'>File Title</label>
			<input id='fileTitle' name='fileTitle' type='text' />
		</div>
		<div id='containerFields' class='container-fields'>
			<div class='field-header'>
				<span></span>
				<span>Track Name</span>
				<span>Default</span>
				<span>Language</span>
				<span>Forced</span>
			</div>

		</div>
		<div id='fieldNumbers' class='field-numbers'>

		</div>
	</div>

	<div class='output-fields'>
		<textarea id='outputText' class='output-text' spellcheck='false'></textarea>
		<div id='buttonSave' class='button save'>SAVE</div>
		<div id='buttonCopy' class='button copy'>COPY TO CLIPBOARD</div>
	</div>
</div>

<script id='templateVideo' type='text/x-handlebars-template'>
	<div class='field video' data-guid='{{guid}}'>
		<span class='field-title'>Video Track {{track_number}}</span>
		<input class='track-name' type='text' placeholder="Track Name"></input>
		<select class='track-default'>
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select>
		<select class='track-language'>
			<option value="und">Undefined</option>
			<option value="eng">English</option>
			<option value="jpn">Japanese</option>
			<option value="spa">Spanish</option>
			<option value="fra">French</option>
		</select>
		<span class='remove' data-guidDelete='{{guid}}'>X</span>
	</div>
</script>
<script id='templateAudio' type='text/x-handlebars-template'>
	<div class='field audio' data-guid='{{guid}}'>
		<span class='field-title'>Audio Track {{track_number}}</span>
		<input class='track-name' type='text' placeholder="Track Name"></input>
		<select class='track-default'>
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select>
		<select class='track-language'>
			<option value="und">Undefined</option>
			<option value="eng">English</option>
			<option value="jpn">Japanese</option>
			<option value="spa">Spanish</option>
			<option value="fra">French</option>
		</select>
		<span class='remove' data-guidDelete='{{guid}}'>X</span>
	</div>
</script>
<script id='templateSubtitle' type='text/x-handlebars-template'>
	<div class='field subtitle' data-guid='{{guid}}'>
		<span class='field-title'>Subtitle Track {{track_number}}</span>
		<input class='track-name' type='text' placeholder="Track Name"></input>
		<select class='track-default'>
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select>
		<select class='track-language'>
			<option value="und">Undefined</option>
			<option value="eng">English</option>
			<option value="jpn">Japanese</option>
			<option value="spa">Spanish</option>
			<option value="fra">French</option>
		</select>
		<select class='track-forced'>
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select>
		<span class='remove' data-guidDelete='{{guid}}'>X</span>
	</div>
</script>
<script id='templateNumber' type='text/x-handlebars-template'>
		<div class='number no-select' data-trackNumber='{{trackNumber}}'>{{number}}</div>
</script>


<script>
	Sortable.create(fieldNumbers, {
		onEnd: function() {
			createOutput()
		}
	});
	var existingFields = [];

	var counterVideo = 1;
	var counterAudio = 1;
	var counterSubtitle = 1;
	var counterNumbers = 1;



	$('#newFieldVideo').click(function() {
		createField_Video();
	});
	$('#newFieldAudio').click(function() {
		createField_Audio();
	});
	$('#newFieldSubtitle').click(function() {
		createField_Subtitle();
	});
	$('#buttonSave').click(function() {
		var blob = new Blob([$('#outputText').val()], {type: "text/plain;charset=utf-8"});
		saveAs(blob, "batgen.bat");
	});
	$('#buttonCopy').click(function() {
		$('#outputText').select();
		document.execCommand('copy');
	});
	$('#fileTitle').keyup(function() {
		createOutput();
	})


	function createField_Video() {
		var templateVideo = $('#templateVideo').html();
		var templateVideo_Script = Handlebars.compile(templateVideo);
		var uid = guid();
		existingFields.push(uid);
		var data = {'track_number':counterVideo, 'guid':uid};
		var html = templateVideo_Script(data);
		$('#containerFields').append(html);

		createNumbers();
		createHandlers();
		createOutput();
		counterVideo++;
	}
	function createField_Audio() {
		var templateAudio = $('#templateAudio').html();
		var templateAudio_Script = Handlebars.compile(templateAudio);
		var uid = guid();
		existingFields.push(uid);
		var data = {'track_number':counterAudio, 'guid':uid};
		var html = templateAudio_Script(data);
		$('#containerFields').append(html);

		createNumbers();
		createHandlers();
		createOutput();
		counterAudio++;
	}
	function createField_Subtitle() {
		var templateSubtitle = $('#templateSubtitle').html();
		var templateSubtitle_Script = Handlebars.compile(templateSubtitle);
		var uid = guid();
		existingFields.push(uid);
		var data = {'track_number':counterSubtitle, 'guid':uid};
		var html = templateSubtitle_Script(data);
		$('#containerFields').append(html);

		createNumbers();
		createHandlers();
		createOutput();
		counterSubtitle++;
	}

	function createNumbers() {
		var templateNumber = $('#templateNumber').html();
		var templateNumber_Script = Handlebars.compile(templateNumber);
		var data = {'number':counterNumbers,'trackNumber':counterNumbers-1};
		var html = templateNumber_Script(data);
		$('#fieldNumbers').append(html);
		counterNumbers++;
	}
	function removeNumbers() {

		counterNumbers--;
	}
	function createHandlers() {
		$('.track-name').keyup(function() {
			createOutput();
		});
		$('.track-default').change(function() {
			createOutput();
		})
		$('.track-language').change(function() {
			createOutput();
		})
		$('.track-forced').change(function() {
			createOutput();
		})
		$('.remove').click(function() {
			removeField(this);
		});
	}

	function removeField(clickedField) {
		fieldGuid = clickedField.dataset.guiddelete;
		field = $(document.body).find('[data-guid="' + fieldGuid + '"]');
		$(field).remove();
		existingFields.splice($.inArray(fieldGuid, existingFields), 1);
		createOutput();
	}

	function createOutput() {
		var tTrackTitle = $('#fileTitle').val();
		var bat = 	'setlocal DisableDelayedExpansion\n' +
						'set mkvmerge="C:/Program Files/MKVToolNix/mkvmerge.exe"\n' +
						'set output_folder=%cd%\\Muxing\\\n' +
						'for /r %%a in (*.mkv) do (\n' +
 						'	set fi=%%a\n' +
						'	set ep=%%~na\n' +
						'	call :merge\n' +
						')\n' +
						'goto :eof;\n\n' +
						':merge\n' +
						'set ep_name=%ep:~9%\n' +
						'set ep_num=%ep:~4,2%\n' +
						'set ep_seas=%ep:~2,1%\n' +
						'call %mkvmerge% -o "%output_folder%\\%ep%.mkv"';


		$.each(existingFields, function(index, value) {
			var field = $(document.body).find('[data-guid="' + value + '"]');
			var tTitle = $(field).find('.track-name').val();
			var tLanguage = $(field).find('.track-language').val();
			var tDefault = $(field).find('.track-default').val();

			bat += ' --track-name "' + index + ':' + tTitle + '" --language ' + index + ':' + tLanguage + ' --default-track ' + index + ':' +  tDefault;
			if ($(field).hasClass('subtitle')) {
				var tForced = $(field).find('.track-forced').val();
				bat += ' --forced-track ' + index + ':' + tForced;
			}
		});
		bat += ' "%fi%" --track-order ';
		$('div.number').each(function() {
			bat += '0:' + this.dataset.tracknumber + ',';
		});
		bat = bat.slice(0,-1);
		bat += ' --title "' + tTrackTitle + '"\n';

		bat += 'goto :eof';
		$('#outputText').text(bat);
	}

	function guid() {
		function s4() {
			return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
		}
		return s4() + s4();
	}
</script>
