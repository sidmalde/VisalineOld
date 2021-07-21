<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$this->layout = false;

?>
<body>
    <h1>Decode CSR</h1>

    <div class="form-convert-certificate">
	    <?= $this->Form->create(null, ['enctype' => 'multipart/form-data']); ?>
    		<div class="form-input-from-format">
			    <?= $this->Form->select('from', $fromFormats); ?>
			</div>
    		<div class="form-input-to-format">
			    <?= $this->Form->select('to', $toFormats); ?>
			</div>
    		<div class="form-input-certificate-file">
		    	<?= $this->Form->file('certificate'); ?>
			</div>
    		<div class="form-submit">
		    	<?= $this->Form->submit('Decode CSR'); ?>
			</div>
	    <?= $this->Form->end(); ?>
    </div>
</body>
