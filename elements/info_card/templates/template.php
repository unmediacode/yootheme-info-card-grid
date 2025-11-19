<?php

// Container
$el = $this->el('div');

// Grid
$grid = $this->el('div', [

    'class' => [
        'uk-child-width-1-1',
        'uk-grid-{grid_column_gap}',
        'uk-grid-row-{grid_row_gap}' => $props['grid_row_gap'] != $props['grid_column_gap'],
        'uk-child-width-{grid_default}[@{grid_breakpoint}]' => $props['grid_default'],
        'uk-child-width-{grid_small}@s' => $props['grid_small'],
        'uk-child-width-{grid_medium}@m' => $props['grid_medium'],
        'uk-child-width-{grid_large}@l' => $props['grid_large'],
        'uk-child-width-{grid_xlarge}@xl' => $props['grid_xlarge'],
        'uk-flex-middle {@grid_row_align}',
    ],

    'uk-grid' => true,
]);

?>

<?= $el($props, $attrs) ?>

    <?= $grid($props) ?>
        <?php foreach ($children as $child) : ?>
        <div>
            <?= $builder->render($child, ['element' => $props]) ?>
        </div>
        <?php endforeach ?>
    </div>

</<?= $el ?>>
