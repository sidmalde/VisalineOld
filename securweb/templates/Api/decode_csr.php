<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;


$this->disableAutoLayout();

$this->layout = false;


?>
<!DOCTYPE html>
<html>
<head>
    <title>Decode CSR</title>
    <?= $this->Html->css(['core']) ?>
</head>
<body>
    <h1>Decode CSR</h1>

    <div class="row">
        <div class="col-md-6">
            <?= $this->Form->create(null); ?>
            <?= $this->Form->input('csr', ['type' => 'textarea', 'rows' => 15, 'cols' => 75]); ?>
            <br>
            <br>
            <?= $this->Form->submit('Decode CSR', ['class' => 'btn btn-default']); ?>
            <?= $this->Form->end(); ?>
        </div>
        <div class="col-md-6">
            <?php if(!empty($decodedCsr)): ?>
                <div class="decoded-csr-block">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Common name</th>
                                <td><?= @$decodedCsr->CommonName; ?></td>
                            </tr>
                            <tr>
                                <th>Key Algorithm</th>
                                <td><?= @$decodedCsr->KeyAlgorithm; ?></td>
                            </tr>
                            <tr>
                                <th>Key Size</th>
                                <td><?= @$decodedCsr->KeySize; ?></td>
                            </tr>
                            <tr>
                                <th>Organization</th>
                                <td><?= @$decodedCsr->Organization; ?></td>
                            </tr>
                            <tr>
                                <th>OU</th>
                                <td><?= @$decodedCsr->OrganizationUnit; ?></td>
                            </tr>
                            <tr>
                                <th>Locality</th>
                                <td><?= @$decodedCsr->Locality; ?></td>
                            </tr>
                            <tr>
                                <th>State</th>
                                <td><?= @$decodedCsr->State; ?></td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td><?= @$decodedCsr->Country; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
