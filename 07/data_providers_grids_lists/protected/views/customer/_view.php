<li>
	<h2>
		<?php
		$title = CHtml::encode($data->first_name.' '.$data->last_name);
		echo CHtml::link($title, array('view', 'id'=>$data->customer_id));
		?>
	</h2>

	<ul>
		<li>
			<strong><?php echo CHtml::encode($data->getAttributeLabel('store_id')); ?>:</strong>
			<?php echo CHtml::encode($data->store->address->address.', '.$data->store->address->city->city.', '.$data->store->address->district); ?>
		</li>
		<li>
			<strong><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</strong>
			<?php echo CHtml::encode($data->email); ?>
		</li>
		<li>
			<strong><?php echo CHtml::encode($data->getAttributeLabel('address_id')); ?>:</strong>
			<?php echo CHtml::encode($data->address->address.', '.$data->address->city->city.', '.$data->address->district); ?>
		</li>
		<li>
			<strong><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</strong>
			<?php echo $data->active ? 'Yes' : 'No'; ?>
		</li>
	</ul>
</li>