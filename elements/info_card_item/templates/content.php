<?php if ($props['image']) : ?>
<img src="<?= $props['image'] ?>" alt="<?= $props['image_alt'] ?>">
<?php endif ?>

<?php if ($props['video']) : ?>
    <?php if ($this->iframeVideo($props['video'], [], false)) : ?>
    <iframe src="<?= $props['video'] ?>"></iframe>
    <?php else : ?>
    <video src="<?= $props['video'] ?>"></video>
    <?php endif ?>
<?php endif ?>

<?php if ($props['hover_image']) : ?>
<img src="<?= $props['hover_image'] ?>" alt>
<?php endif ?>

<?php if ($props['hover_video']) : ?>
    <?php if ($this->iframeVideo($props['hover_video'], [], false)) : ?>
    <iframe src="<?= $props['hover_video'] ?>"></iframe>
    <?php else : ?>
    <video src="<?= $props['hover_video'] ?>"></video>
    <?php endif ?>
<?php endif ?>

<?php if ($props['title'] != '') : ?>
<<?= $element['title_element'] ?>><?= $props['title'] ?></<?= $element['title_element'] ?>>
<?php endif ?>

<?php if ($props['meta'] != '') : ?>
<p><?= $props['meta'] ?></p>
<?php endif ?>

<?php if ($props['content'] != '') : ?>
<div><?= $props['content'] ?></div>
<?php endif ?>

<?php if ($props['info_line_1'] || $props['info_line_2'] || $props['info_line_3'] || $props['info_line_4']) : ?>
<ul>
    <?php if ($props['info_line_1']) : ?><li><?= $props['info_line_1'] ?></li><?php endif ?>
    <?php if ($props['info_line_2']) : ?><li><?= $props['info_line_2'] ?></li><?php endif ?>
    <?php if ($props['info_line_3']) : ?><li><?= $props['info_line_3'] ?></li><?php endif ?>
    <?php if ($props['info_line_4']) : ?><li><?= $props['info_line_4'] ?></li><?php endif ?>
</ul>
<?php endif ?>

<?php if ($props['link']) : ?>
<p><a href="<?= $props['link'] ?>"><?= $props['link_text'] ?: $element['link_text'] ?></a></p>
<?php endif ?>
