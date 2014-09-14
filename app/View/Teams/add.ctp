<div class="row">
    <div class="col-xs-12">
        <h1>Ajout d'une équipe </h1>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 well">
        <?php echo $this->Form->create('Team',array(
                            'role' => 'form')); ?>
        	<?php
        		echo $this->Form->input('name', array(
                                        'label' => 'Nom de l\'équipe',
                                        'div' => 'form-groupe',
                                        'class' => 'form-control',
                                        'placeholder' => 'Entrez le nom de l\'équipe'));
        		echo $this->Form->input('points', array(
                                        'label' => 'Points initiaux',
                                        'div' => 'form-groupe',
                                        'class' => 'form-control',
                                        'placeholder' => 'Points'));
        	?>
        <?php echo $this->Form->end(array(
                            'label' => 'Envoyer',
                            'class' => 'btn btn-success'));
        ?>
    </div>
</div>
