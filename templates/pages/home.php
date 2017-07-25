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
		<div class='container-new-field'>
			<span>New Fields</span>
			<div class='options-new-field'>
				<div id='newFieldVideo' class='video'>Video</div>
				<div id='newFieldAudio' class='audio'>Audio</div>
				<div id='newFieldSubtitle' class='subtitle'>Subtitles</div>
			</div>
		</div>
		<div id='container-fields' class='container-fields'>
			<div class='field-header'>
				<span></span>
				<span>Track Name</span>
				<span>Default</span>
				<span>Language</span>
				<span>Forced</span>
			</div>
			<div class='field video'>
				<span class='field-title'>Video Track 1</span>
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
				<span class='remove'>X</span>
			</div>
			<div class='field audio'>
				<span class='field-title'>Audio Track 1</span>
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
				<span class='remove'>X</span>
			</div>
			<div class='field subtitle'>
				<span class='field-title'>Subtitle Track 1</span>
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
				<select class='track-default'>
					<option value="yes">Yes</option>
					<option value="no">No</option>
				</select>
				<span class='remove'>X</span>
			</div>
		</div>
	</div>

	<div class='output-fields'>
		<textarea class='output-text'></textarea>
		<div class='button save'>SAVE</div>
		<div class='button copy'>COPY TO CLIPBOARD</div>
	</div>
</div>


<script>
	


</script>
