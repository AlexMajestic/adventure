			<div class="quest_detail">
				<?php if($data['step_type']=="Q") { ?>
					<span class="quest_detail-title">Задание <?=$data['step_number']?> <b>из <?=$data['steps']['qs_number']?></b></span>
				<?php }else if($data['step_type']=="I") { ?>
					<span class="quest_detail-title">Верно!</span>
				<?php }else if($data['step_type']=="END") { ?>
					<span class="quest_detail-title">Квест пройден!</span>
				<?php } ?>
				<span class="slicer_line"></span>
				<?php if(!empty($data['description'])) { ?>
					<?=$data['description'];?>
					<span class="slicer_line"></span>
				<?php } ?>
				<?php if(!empty($data['question'])) { ?>
					<div class="quest_detail-text quest_detail-question">
						<?=$data['question'];?>
					</div>
					<?php if(!empty($data['question_description'])) { ?>
						<p align="justify" class="quest_detail-question_description"><?=$data['question_description']?></p>
					 <?php } ?>
					 <span class="slicer_line"></span>
				<?php } ?>
			</div>
			<?php if($data['step_type']=='Q') {
				if($data['question_type']=='write') { ?>
				<div class="quest_question">
					<span class="quest_detail-title">Введите ответ</span>
					<form method="POST" class="quest_question-form" action="/play?id=<?=$_GET['id']?>" name="step_<?=$data['step_number']?>">
						<input type="text" name="answer" placeholder="Поле для ответа" required>
						<label class="btn submit_btn">Применить<input class="hidden"type="submit" name="" value="Применить"></label>
						<?php if(!empty($_SESSION['variants'])) { ?>
							<span class="quest_question-error"><?=$_SESSION['variants'];?></span>
						<?php } ?>
					</form>
				</div>
				<?php } ?>
			<?php } ?>
			<?php if($data['step_type']=='END') { ?>
				<a href="/" class="btn">
					На главную
				</a>
			<?php } ?>
<?php if($data['hint_number']>0) { ?>
<span class="slicer_line"></span>
<div class="hint_container">
	<?php for($i=1;$i<=$data['hint_number'];$i++) { 
		$j = 'hint_'.$i;
	?>
		<?php if($i>1) { ?>
		<div class="quest_help hidden" id="hint_<?=$i?>">
		<?php }else{ ?>
		<div class="quest_help" id="hint_<?=$i?>">
		<?php } ?>
			<span class="quest_help-icon"></span>
			<?php if($i==1) { ?>
			<text class="quest_help-label">Нажми, чтобы получить подсказку</text>
			<?php }else{ ?>
			<text class="quest_help-label">Еще подсказку?</text>
			<?php } ?>
		</div>
		<div class="quest_help quest_help-hint hidden" id="hint_show_<?=$i?>">
			<text class="quest_help-text"><?=$data[$j]?></text>
		</div>
	<?php } ?>
</div>
	<?php for($i=1;$i<=$data['hint_number'];$i++) { ?>
		<script type="text/javascript">
			var hint<?=$i?> = document.getElementById('hint_<?=$i?>');
			function show_hint(){
				document.getElementById('hint_show_<?=$i?>').classList.remove('hidden');
				document.getElementById('hint_<?=$i?>').classList.add('hidden');
				<?php if($data['hint_number']>1 && $i!=$data['hint_number']) { ?>
				document.getElementById('hint_<?=$i+1;?>').classList.remove('hidden');
				<?php } ?>
			}
			hint<?=$i?>.addEventListener("click", show_hint, false);
		</script>
		<?php } ?>
<?php } ?>
<span class="hidden_answer"><?=$data['correct'];?></span>