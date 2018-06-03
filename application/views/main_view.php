<div class="quest_cards">
	<?php 
		foreach ($data as $key) {
	?>
	<div class="quest_card-main" style="background-image: url(./images/<?php 
		if($key['image']==NULL){
			echo 'no-image.png';
		}else{
			echo $key['image'];
		} ?>
	);">
		<span class="quest_card-label quest_card-name"><?=$key['name'] ?></span>
		<span class="quest_card-label quest_card-time"><?=$key['timing'] ?></span>
		<a href="./quest?id=<?=$key['ID']?>" class="quest_card-label quest_cards-link">Подробнее</a>
	</div>
	<?php } ?>
</div>