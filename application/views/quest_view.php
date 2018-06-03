			<div class="quest_detail">
				<span class="quest_detail-title"><?= $data['name']; ?></span>
				<span class="slicer_line"></span>
				<?php if(!empty($data['slider_image'])){ ?>
				<section class="lazy slider" data-sizes="50vw">
					<?php foreach ($data['slider_image'] as $key) { ?>
					<div>
						<img data-lazy="./images/<?=$key['link']?>" data-srcset="./images/<?=$key['link']?>" data-sizes="100vw">
					</div>
					<?php } ?>
				</section>
				<?php } ?>
				<div class="quest_detail-text"><?=$data['description'];?>
				</div>
			</div>
			<span class="slicer_line"></span>
			<div class="quest_description">
				<?php if(!empty($data['timing'])){ ?>
				<div class="quest_description-label">
					<span>Время:</span>
					<text><?=$data['timing'];?></text>
				</div>
				<?php } ?>
				<?php if(!empty($data['distance'])){ ?>
				<div class="quest_description-label">
					<span>Расстояние:</span>
					<text><?=$data['distance'];?></text>
				</div>
				<?php } ?>
				<?php if(!empty($data['schedule'])){ ?>
				<div class="quest_description-label">
					<span>График:</span>
					<text><?=$data['schedule'];?></text>
				</div>
				<?php } ?>
				<?php if(!empty($data['qs_number'])){ ?>
				<div class="quest_description-label">
					<span>Вопросов:</span>
					<text><?=$data['qs_number'];?></text>
				</div>
				<?php } ?>
				<div class="quest_description-label quest_description-start">
					<span>Старт:</span>
					<text><?=$data['start'];?></text>
				</div>
			</div>
			<span class="slicer_line"></span>
			<a href="./play?id=<?=$data['ID'];?>" class="btn start_quest-btn">
					Старт
			</a>

		<?php 
			if(!empty($data['slider_image'])){
				include './js/slider.js';
			}
		?>